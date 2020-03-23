<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ShipmentController extends Controller
{
    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'email' => 'email | required',
            'mobile' => 'required',
        ]);

        $orderID         = uniqid('Order:');
        $shippingName    = $request->name;
        $shippingAddress = $request->address;
        $shippingEmail   = $request->email;
        $shippingMobile  = $request->mobile;

        Session::put('orderID', $orderID);
        Session::put('shippingName', $shippingName);
        Session::put('shippingAddress', $shippingAddress);
        Session::put('shippingEmail', $shippingEmail);
        Session::put('shippingMobile', $shippingMobile);

        return redirect()->route('paymentPage');
    }
}
