@php
    $carts = Cart::getContent();
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Shop')

@push('css')
    <style>
        .page-item {
            display: inline-block;
            height: 60px;
            width: 110px;
            background: rebeccapurple;
            color: black;
            padding: 10px 10px;
            margin: 10px;
            text-align: center;
        }

        .page-item span{
            cursor: not-allowed;
        }

        .page-item a{
            color: white !important;
            font-weight: bold;
        }
    </style>
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
                    <h1 class="page-title">Shop</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Shop</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-12">
                    <ul class="products products-fullwidth">
                        @foreach($products as $product)
                            <li class="product">
                                <div class="product-container">
                                    <figure>
                                        <div class="product-wrap">
                                            <div class="product-images">
                                                <img class="img-responsive img-thumbnail" style="width: 340px; height:350px;" src="{{ asset('uploads/product/'.$product->image) }}" alt="product_01" />
                                            </div>
                                            <div class="product-overlay text-center">
                                                <h3 class="product_title">
                                                    <a href="#">{{ $product->name }}</a>
                                                </h3>
                                                <span class="price"><span class="amount">&#36;{{ $product->price }}</span></span>
                                                <div class="shop-loop-actions">
                                                    <a href="{{ route('singleProduct',$product->id) }}">Add to cart</a>
                                                    <a href="{{ route('singleProduct',$product->id) }}">View Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </figure>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</body>
@endsection

@push('scripts')

@endpush
