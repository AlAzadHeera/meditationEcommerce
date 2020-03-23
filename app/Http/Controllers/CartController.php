<?php

namespace App\Http\Controllers;

use App\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addCart(Request $request){
        $productID = $request->productID;
        $quantity = $request->quantity;
        $product = DB::table('products')
            ->where('id',$productID)
            ->first();

        $data['id'] = $productID;
        $data['name'] = $product->name;
        $data['price']     = $product->price;
        $data['quantity']     = $quantity;
        $data['attributes']['image']     = $product->image;

        Cart::add($data);

        return redirect()->route('cart');
    }

    public function cart(){
        $userID = Session::get('customerID');
        if ($userID = null){
            return redirect()->route('cLogin');
        }elseif(Cart::isEmpty()){
            return redirect()->route('shop');
        }else{
            return view('FrontendPages.cart', compact('product','quantity'));
        }
    }

    public function cartRemove($id){
        Cart::remove($id);
        return redirect()->back();
    }

    public function cartUpdate(Request $request){

        $id = $request->productID;
        $quantity = $request->quantity;

        Cart::update($id, array(
            'quantity' => array(
                'relative' => false,
                'value' => $quantity
            ),
        ));

        return redirect()->route('cart');
    }

    public function clearCart(){
        Cart::clear();
        return redirect()->back();
    }
}
