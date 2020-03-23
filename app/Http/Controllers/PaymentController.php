<?php

namespace App\Http\Controllers;


use App\OrderNO;
use Brian2694\Toastr\Facades\Toastr;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;

 /*All Paypal Details class*/

use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use Redirect;
use Session;
use URL;

class PaymentController extends Controller
{
    private $_api_context;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {

        /*PayPal api context*/

        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
                $paypal_conf['client_id'],
                $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);

    }
    public function index()
    {
        $orderID = Session::get('orderID');
        if(Cart::isEmpty()){
            return redirect()->route('shop');
        }elseif($orderID = null){
            return redirect()->route('checkOut');
        }else{
            return view('FrontendPages.payment');
        }
    }

    public function payWithpaypal(Request $request)
    {

        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        $item_1 = new Item();

        $item_1->setName('Item 1') /** item name **/
        ->setCurrency('USD')
            ->setQuantity(1)
            ->setPrice($request->get('amount')); /** unit price **/

        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->get('amount'));

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description');

        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('status')) /** Specify return URL **/
        ->setCancelUrl(URL::to('status'));

        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        /** dd($payment->create($this->_api_context));exit; **/
        try {

            $payment->create($this->_api_context);

        } catch (\PayPal\Exception\PPConnectionException $ex) {

            if (\Config::get('app.debug')) {

                \Session::put('error', 'Connection timeout');
                return Redirect::to('/');

            } else {
                Toastr::success('danger','Some error occur, sorry for inconvenient',['positionClass'=>'toast-top-right']);
                return Redirect::to('/');

            }

        }

        foreach ($payment->getLinks() as $link) {

            if ($link->getRel() == 'approval_url') {

                $redirect_url = $link->getHref();
                break;

            }

        }

        /** add payment ID to session **/
        Session::put('paypal_payment_id', $payment->getId());

        if (isset($redirect_url)) {

            /** redirect to paypal **/
            return Redirect::away($redirect_url);

        }

        Toastr::success('danger','Unknown error occurred',['positionClass'=>'toast-top-right']);
        return Redirect::to('/');

    }

    public function getPaymentStatus()
    {
        /* Get the payment ID before session clear */
        $payment_id = Session::get('paypal_payment_id');

        /*clear the session payment ID*/
        Session::forget('paypal_payment_id');

        if (empty(Input::get('PayerID')) || empty(Input::get('token'))) {

            Toastr::success('danger','Payment failed',['positionClass'=>'toast-top-right']);
            return Redirect::to('/');

        }


        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId(Input::get('PayerID'));

        /**Execute the payment **/
        $result = $payment->execute($execution, $this->_api_context);

        if ($result->getState() == 'approved') {

            $shipmentDetails = array();
            $shipmentDetails['orderID']    = Session::get('orderID');
            $shipmentDetails['customerID'] = Session::get('customerID');
            $shipmentDetails['name']       = Session::get('shippingName');
            $shipmentDetails['email']      = Session::get('shippingEmail');
            $shipmentDetails['address']    = Session::get('shippingAddress');
            $shipmentDetails['mobile']     = Session::get('shippingMobile');

            $shipmentID = DB::table('shipments')
                ->insertGetId($shipmentDetails);

            $carts = Cart::getContent();

            foreach ($carts as $cart){
                $orderDetails = array();
                $orderDetails['orderID']       = Session::get('orderID');
                $orderDetails['paymentID']     = $payment_id;
                $orderDetails['shippingID']    = $shipmentID;
                $orderDetails['customerID']    = Session::get('customerID');
                $orderDetails['productName']   = $cart->name;
                $orderDetails['productQty']    = $cart->quantity;
                $orderDetails['productPrice']  = $cart->price;
                $orderDetails['productTotal']  = Cart::get($cart->id)->getPriceSum();
                $orderDetails['grandTotal']    =  Cart::getTotal();
                $orderDetails['paymentStat']  = "Paid";
                $orderDetails['deliveryStat'] = "Pending";

                DB::table('orders')
                    ->insert($orderDetails);
            }

            $orderNO = new OrderNO();
            $orderNO->orderID = Session::get('orderID');
            $orderNO->deliveryStat = "Paid";
            $orderNO->save();

            /*clear the cart*/
            Cart::clear();


            /*clear the session payment ID*/
            Session::forget('shippingName');
            Session::forget('shippingAddress');
            Session::forget('shippingEmail');
            Session::forget('shippingMobile');

            $orderID = Session::get('orderID');
            Session::forget('orderID');

            Toastr::success('success','Payment success',['positionClass'=>'toast-top-right']);
            return view('FrontendPages.orderComplete',compact('orderID'));

        }

        Toastr::success('danger','Payment failed',['positionClass'=>'toast-top-right']);
        return Redirect::to('/');
    }

    public function payWithCash(Request $request)
    {
            $this->validate($request,[
               'paymentID' => 'required',
            ]);

            $payment_id = $request->paymentID;

            $shipmentDetails = array();
            $shipmentDetails['orderID']    = Session::get('orderID');
            $shipmentDetails['customerID'] = Session::get('customerID');
            $shipmentDetails['name']       = Session::get('shippingName');
            $shipmentDetails['email']      = Session::get('shippingEmail');
            $shipmentDetails['address']    = Session::get('shippingAddress');
            $shipmentDetails['mobile']     = Session::get('shippingMobile');

            $shipmentID = DB::table('shipments')
                ->insertGetId($shipmentDetails);

            $carts = Cart::getContent();

            foreach ($carts as $cart){
                $orderDetails = array();
                $orderDetails['orderID']       = Session::get('orderID');
                $orderDetails['paymentID']     = $payment_id;
                $orderDetails['shippingID']    = $shipmentID;
                $orderDetails['customerID']    = Session::get('customerID');
                $orderDetails['productName']   = $cart->name;
                $orderDetails['productQty']    = $cart->quantity;
                $orderDetails['productPrice']  = $cart->price;
                $orderDetails['productTotal']  = Cart::get($cart->id)->getPriceSum();
                $orderDetails['grandTotal']    =  Cart::getTotal();
                $orderDetails['paymentStat']  = "Pending";
                $orderDetails['deliveryStat'] = "Pending";

                DB::table('orders')
                    ->insert($orderDetails);
            }

            $orderNO = new OrderNO();
            $orderNO->orderID = Session::get('orderID');
            $orderNO->deliveryStat = "Pending";
            $orderNO->save();


            /*clear the cart*/
            Cart::clear();


            /*clear the session payment ID*/
            Session::forget('shippingName');
            Session::forget('shippingAddress');
            Session::forget('shippingEmail');
            Session::forget('shippingMobile');

            $orderID = Session::get('orderID');
            Session::forget('orderID');

            Toastr::success('success','Payment success',['positionClass'=>'toast-top-right']);
            return view('FrontendPages.orderComplete',compact('orderID'));
    }

    public function paymentSuccess(){
        return view('FrontendPages.orderComplete');
    }
}
