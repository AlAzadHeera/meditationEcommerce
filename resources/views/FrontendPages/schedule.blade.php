@extends('Layouts.Frontex.frontApp')

@section('title','Schedule')

@push('css')
    <link rel="stylesheet" href="{{ asset('Frontend/css/bootstrap-datetimepicker.min.css') }}">
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
                    <h1 class="page-title">Schedule</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>Schedule</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-8" style="float: none; margin: 0 auto;">
                    <div class="noo-register-form">
                        <form class="form-horizontal" method="POST" action="{{ route('schedule.store') }}">
                            @csrf
                            <h3 style="margin: 0px; padding-bottom: 5%; text-align: center;">Take An Appointment</h3>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Full Name</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="Full Name" name="name" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Address In Details</label>
                                <div class="col-sm-8">
                                    <textarea placeholder="Addrress" rows="3" name="address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" placeholder="Email" name="email" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Mobile NO</label>
                                <div class="col-sm-8">
                                    <input type="text" placeholder="Mobile No" name="mobile" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Service</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="service">
                                        <option value="Speaking Engagements">Speaking Engagements</option>
                                        <option value="One on One Consultations">One on One Consultations</option>
                                        <option value="Insurance Consultations">Insurance Consultations</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 control-label">Time & Date</label>
                                <div class="col-sm-8">
                                    <input type="text" name="time" id="example" />
                                </div>
                            </div>
                            <div class="form-actions row">
                                <div class="col-md-7 col-md-offset-5">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

@endsection

@push('scripts')
            <script src="{{ asset('Frontend/js/bootstrap-datetimepicker.min.js') }}"></script>
@endpush
