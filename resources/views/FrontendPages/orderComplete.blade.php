@php
    $carts = Cart::getContent();
    $customerID = Session::get('customerID');
    $customerName = Session::get('customerName');
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Order Complete')

@push('css')

@endpush

@section('content')
    <body xmlns="http://www.w3.org/1999/html">
    <div class="site">
        <!-- Start Header -->
            @include('Layouts.Partials.Frontend.header')
        <!-- End Header -->

        <header class="noo-page-heading heading-bg-image">
            <div class="container-boxed max">
                <div class="page-heading-info ">
                    <h1 class="page-title">Order Placed</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Order Placed</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-12">
                    <div class="noo-register-form">
                        <div class="row">
                            <div class="col-md-5" style="float: none; margin: 0 auto;">
                                <div class="well text-center">
                                    <div class="well-body">
                                        <h2>Congratulations</h2>
                                        <h4>Your Order Has Been Successfully Placed</h4>
                                        <h4>Your Order NO: {{ $orderID }}</h4>
                                        <small>Please Store The Number Carefully For Further Information About Your Order</small>
                                        <h4 style="color: #7c1212">Thanks For Shopping. You Will Be Contacted Soon</h4>
                                    </div>
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
