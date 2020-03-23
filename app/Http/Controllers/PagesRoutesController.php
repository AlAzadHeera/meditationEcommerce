<?php

namespace App\Http\Controllers;

use App\Audio;
use App\Product;
use App\Video;
use Illuminate\Http\Request;

class PagesRoutesController extends Controller
{
    public function welcome(){
        $videos = Video::all();
        $audios = Audio::all();
        return view('welcome',compact('videos','audios'));
    }

    public function aboutUs(){
        return view('FrontendPages.aboutUs');
    }

    public function shop(){
        $products = Product::simplePaginate(12);
        return view('FrontendPages.shop',compact('products'));
    }

    public function singleProduct($id){
        $product = Product::find($id);
        return view('FrontendPages.singleProduct',compact('product'));
    }
    
    public function services(){
        return view('FrontendPages.services');
    }
}
