<?php

namespace App\Http\Controllers;

use App\Customer;
use Cart;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function cRegistrationPage(){
        return view('FrontendPages.register');
    }

    public function cLogin(){
        $userID = Session::get('customerID');
        if ($userID != null){
            return redirect()->route('welcome');
        }else{
            return view('FrontendPages.login');
        }

    }

    public function cRegistraion(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'email' => 'email | required',
            'mobile' => 'required',
            'password' => 'required',
        ]);

        $customerName = $request->name;

        $customer = new Customer();
        $customer->name     = $request->name;
        $customer->email    = $request->email;
        $customer->mobile   = $request->mobile;
        $customer->password = Hash::make($request->password);
        $customer->save();
        $customerID = $customer->id;

        Session::put('customerID', $customerID);
        Session::put('customerName', $customerName);

        return redirect()->back();
    }

    // Authenticating a User

    public function authenticate(request $request){
        $this->validate($request,[
            'email'           => 'required',
            'password'        => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = Customer::where('email', '=', $email)->first();
        $customerID = $user->id;
        $customerName = $user->name;

        if ($user){
            $hashedPassword = $user->password;
            if (Hash::check($password,$hashedPassword)) {
                Session::put('customerID', $customerID);
                Session::put('customerName', $customerName);

                Session::flash ( 'successMessage', "Welcome! You are logged in." );
                return redirect()->route('welcome');
            }
            else{
                Session::flash ( 'message', "Invalid Password , Please try again." );
                return redirect()->back();
            }
        }
        else{
            Session::flash ( 'message', "Invalid Email , Please try again." );
            return redirect()->back();
        }
    }

    //Logout An User

    public function cLogout(){
        $userID = Session::get('customerID');
        if ($userID != null){
            Session::flush();
            Cart::clear();
            return redirect()->route('welcome');
        }else{
            return view('FrontendPages.login');
        }
    }
}
