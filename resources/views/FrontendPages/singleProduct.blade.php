@php
    $carts = Cart::getContent();
    $customerID = Session::get('customerID');
    $customerName = Session::get('customerName');
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Product Details')

@push('css')

@endpush

@section('content')
    <body class="shop">
    <div class="site">
        <!-- Start Header -->
            @include('Layouts.Partials.Frontend.header')
        <!-- End Header -->

        <header class="noo-page-heading">
            <div class="container-boxed max">
                <div class="page-heading-info ">
                    <h1 class="page-title">{{ $product->name }}</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>{{ $product->name }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-12">
                    <div class="product">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <div class="images">
                                    <a href="{{ asset('uploads/product/'.$product->image) }}" rel="prettyPhoto[product-gallery]">
                                        <img width="500" height="500" src="{{ asset('uploads/product/'.$product->image) }}" alt="product-detail" />
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6">
                                <div class="summary entry-summary">
                                    <h1 class="product_title">{{ $product->name }}</h1>
                                    <p class="price"><span class="amount">&#36;{{ $product->price }}</span></p>
                                    <p>{{ $product->shortDescription }}</p>
                                    <form class="cart" method="POST" action="{{ route('addCart') }}">
                                        @csrf
                                        <div class="quantity">
                                            <input type="hidden" name="productID" value="{{ $product->id }}">
                                            <input type="number" step="1" min="1" name="quantity" value="1" class="input-text qty text" size="4" />
                                        </div>
                                        <button type="submit" class="single_add_to_cart_button button alt">Add to cart</button>
                                    </form>
                                    <div class="product_meta">
                                        <span>Category: <a>{{ $product->category }}</a></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="noo-tabs shop-tabs" style="padding-top:25px;">
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#tab-description">Description</a>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab-description">
                                    <p>{{ $product->longDescription }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

@endpush
