@extends('Layouts.Frontex.frontApp')

@section('title','Services')

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
                    <h1 class="page-title">Services</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Services</span></li>
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
                            <div class="col-md-6">
                                <div class="well">
                                    <div class="text-center card-header">
                                        <h3>Speaking Engagements</h3>
                                    </div>
                                    <div class="card card-body" style="padding: 20px 0px;">
                                        <div class="service-img" style="width: 75%; margin: 0 auto;">
                                            <img class="img-responsive img-thumbnail" src="{{ asset('Frontend/images/services/1.png') }}" alt="">
                                        </div>
                                        <div class="service-des" style="padding: 20px 0px;">
                                            <ul>
                                                <li>Key Note Speaker</li>
                                                <li>Workshop Facilitator</li>
                                                <li>Youth Empowerment Speaker</li>
                                                <li>Self Love/Confidence Coach</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>500$</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="float: right" class="btn btn-primary" href="{{ route('schedule.index') }}">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="well">
                                    <div class="card-header text-center">
                                        <h3>One on One Consultations</h3>
                                    </div>
                                    <div class="card card-body" style="padding: 20px 0px;">
                                        <div class="service-img" style="width: 75%; margin: 0 auto;">
                                            <img class="img-responsive img-thumbnail" src="{{ asset('Frontend/images/services/2.png') }}" alt="">
                                        </div>
                                        <div class="service-des" style="padding: 20px 0px;">
                                            <ul>
                                                <li>Meditation Techniques and Styles</li>
                                                <li>Stones to Assist with Obtaining your True Well-being</li>
                                                <li>Affirmation Coaching and Chakra Cleanse</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Prices and fees may vary</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="float: right" class="btn btn-primary" href="{{ route('schedule.index') }}">Book Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="well">
                                    <div class="text-center card-header">
                                        <h3>Insurance Consultations</h3>
                                    </div>
                                    <div class="card card-body" style="padding: 20px 0px;">
                                        <div class="service-img" style="width: 75%; margin: 0 auto;">
                                            <img class="img-responsive img-thumbnail" src="{{ asset('Frontend/images/services/3.png') }}" alt="">
                                        </div>
                                        <div class="service-des" style="padding: 20px 0px;">
                                            <ul>
                                                <li> Life Insurance and Final Expense Plans (Ages 0-85)</li>
                                                <li>Medicare Health Care</li>
                                                <li>Supplements and Prescription</li>
                                                <li>Drug Plans Available (If desired)</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card card-footer">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <h4>Price $0</h4>
                                            </div>
                                            <div class="col-md-6">
                                                <a style="float: right" class="btn btn-primary" href="{{ route('schedule.index') }}">Book Now</a>
                                            </div>
                                        </div>
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
