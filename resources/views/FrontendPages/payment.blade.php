@php
    $carts = Cart::getContent();
    $customerID = Session::get('customerID');
    $customerName = Session::get('customerName');
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Payment')

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
                    <h1 class="page-title">Payment</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Payment</span></li>
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
                            <div class="col-md-offset-4"></div>
                            <div class="col-md-4">
                                <div class="well" style="height: 370px;">
                                    <div class="well-body">
                                        <img style="height:270px" class="img-responsive" src="{{ asset('Frontend/images/paypal.png') }}" alt="">
                                    </div>
                                    <div class="well-footer" style="padding-top: 5%;">
                                        <form action="{!! URL::to('paypal') !!}" method="POST">
                                            @csrf
                                            <input type="hidden" name="amount" value="{{ Cart::getTotal() }}">
                                            <input style="display:block; width: 100%;" type="submit" class="btn btn-primary" value="Pay With Paypal">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well" style="height: 370px;">
                                    <div class="well-body">
                                        <img class="img-responsive" src="{{ asset('Frontend/images/cash.png') }}" alt="">
                                    </div>
                                    <div class="well-footer" style="padding-top: 5%;">
                                        <form action="{!! URL::to('cash') !!}" method="POST">
                                            @csrf
                                            <level>Cash App ID</level>
                                            <input type="text" name="paymentID">
                                            <input style="display:block; width: 100%;" type="submit" class="btn btn-primary" value="Pay With Cash App">
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="well" style="height: 370px;">
                                    <div class="well-footer" style="padding-top: 5%;">
                                        <h4>Please Pay {{ Cart::getTotal() }}$</h4>
                                        <p>For Cash App, Please Insert The Cash App ID Your Are Using To Pay So That We Can Track Your Payment Status.</p>
                                        <p>After Payment You Will Get A Payment ID. Please Save It Carefully For Further Need.</p>
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
