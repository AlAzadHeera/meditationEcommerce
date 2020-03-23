@php
    $carts = Cart::getContent();
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Login')

@push('css')

@endpush

@section('content')
    <body>
    <div class="site">
        <!-- Start Header -->
            @include('Layouts.Partials.Frontend.header')
        <!-- End Header -->

        <header class="noo-page-heading heading-bg-image">
            <div class="container-boxed max">
                <div class="page-heading-info ">
                    <h1 class="page-title">Login</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Login</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-12">
                    <div class="login-form">
                        <form class="form-horizontal row" action="{{ route('authenticate') }}" method="POST">
                            @csrf
                            <div class="col-sm-8">
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" placeholder="Email" name="email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" placeholder="Password" name="password" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-9 col-sm-offset-3">
                                        <div class="form-control-flat">
                                            <input type="checkbox" /> Keep me logged in
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-actions col-sm-9 col-sm-offset-3">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4 noo-register-now">
                                <p class="title"><b>I don't have acount</b></p>
                                <a href="{{ route('cRegistraion') }}" class="btn-primary">Register Now</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

@endpush
