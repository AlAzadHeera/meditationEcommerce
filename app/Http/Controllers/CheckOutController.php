<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use Session;

class CheckOutController extends Controller
{
    public function index(){
        $userID = Session::get('customerID');

        if (Cart::isEmpty()){
            return redirect()->route('shop');
        }
        else{
            return view('FrontendPages.checkout');
        }

    }
}
