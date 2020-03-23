@php
    $carts = Cart::getContent();
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Register')

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
                    <h1 class="page-title">Register</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Register</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-12">
                    <div class="noo-register-form">
                        <form class="form-horizontal" method="POST" action="{{ route('cRegistraion') }}">
                            @csrf
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="Full Name" name="name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" placeholder="Email" name="email" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 control-label">Mobile NO</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="Mobile NO" name="mobile" />
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" placeholder="Password" name="password" />
                                </div>
                            </div>
                            <div class="form-actions row">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                    <small>Already Have An Accoutn! <a style="color: #7c1212">Singin</a></small>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

@endpush
