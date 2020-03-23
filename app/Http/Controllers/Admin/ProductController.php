<?php

namespace App\Http\Controllers\Admin;

use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('BackendPages.Product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('BackendPages.Product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name'             => 'required',
            'shortDescription' => 'required',
            'longDescription'  => 'required',
            'category'         => 'required',
            'price'            => 'required',
            'image'            => 'required | mimes: jpg,jpeg,png'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        if (isset($image)){
            $currentDate =  Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/product')){
                mkdir('uploads/product',007,true);
            }else{
                $image->move('uploads/product',$imagename);
            }

        }else{
            $imagename = 'default.png';
        }

        $product = new Product();
        $product->name             = $request->name;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription  = $request->longDescription;
        $product->category         = $request->category;
        $product->price            = $request->price;
        $product->image            = $imagename;
        $product->save();

        Toastr::success('success','Product Added Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->route('product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        return view('BackendPages.Product.update',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name'             => 'required',
            'shortDescription' => 'required',
            'longDescription'  => 'required',
            'category'         => 'required',
            'price'            => 'required',
            'image'            => 'mimes: jpg,jpeg,png'
        ]);

        $image = $request->file('image');
        $slug = Str::slug($request->name);

        $product = Product::find($id);

        if (isset($image)){
            $currentDate =  Carbon::now()->toDateString();
            $imagename = $slug.'-'.$currentDate.'-'.uniqid().'.'.$image->getClientOriginalExtension();

            if (!file_exists('uploads/product')){
                mkdir('uploads/product',007,true);
            }else{
                $image->move('uploads/product',$imagename);
            }

        }else{
            $imagename = $product->image;
        }


        $product->name             = $request->name;
        $product->shortDescription = $request->shortDescription;
        $product->longDescription  = $request->longDescription;
        $product->category         = $request->category;
        $product->price            = $request->price;
        $product->image            = $imagename;
        $product->save();

        Toastr::success('success','Product Updated Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if (file_exists('uploads/product/'.$product->image)){
            unlink('uploads/product/'.$product->image);
        }
        $product->delete();

        Toastr::success('success','Product Deleted Successfully',['positionClass'=>'toast-top-right']);
        return redirect()->back();
    }
}
