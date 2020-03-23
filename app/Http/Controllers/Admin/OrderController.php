<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use App\OrderNO;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index(){
        $pending = "Pending";
        $delivered = "Delivered";
        $incompleteOrders = DB::table('order_n_o_s')
                            ->where('deliveryStat','=', $pending)
                            ->get();
        $completeOrders = DB::table('order_n_o_s')
            ->where('deliveryStat','=', $delivered)
            ->get();

        return view('BackendPages.Orders.index',compact('incompleteOrders','completeOrders'));
    }

    public function orderEdit($id){
        $incompleteOrderProducts = DB::table('orders')
            ->where('orderID','=', $id)
            ->get();
        $incompleteOrder = DB::table('orders')
            ->where('orderID','=', $id)
            ->get()
            ->first();
        $shippingInfo = DB::table('shipments')
            ->where('orderID','=', $id)
            ->get()
            ->first();
        return view('BackendPages.Orders.edit',compact('incompleteOrder','incompleteOrderProducts','shippingInfo'));
    }

    public function changePaymentStat(Request $request, $id){

        for($i=0;$i<2;$i++){
            DB::table('orders')
                ->where('orderID', $id)
                ->update( ['paymentStat' => $request->status]);
        }
        return redirect()->back();
    }

    public function changeDeliveryStat(Request $request, $id){

        for($i=0;$i<2;$i++){
            DB::table('orders')
                ->where('orderID', $id)
                ->update( ['deliveryStat' => $request->status]);
        }

        $orderNO = OrderNO::where('orderID', '=', $id)->first();
        $orderNO->deliveryStat = $request->status;
        $orderNO->save();

        return redirect()->back();
    }

    public function deleteOrder($id){

        for($i=0;$i<2;$i++){
            DB::table('orders')
                ->where('orderID', $id)
                ->delete();
        }

        $orderNo = OrderNO::find($id);
        $orderNo->delete();

        Toastr::success('success','Order Deleted Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }

}
