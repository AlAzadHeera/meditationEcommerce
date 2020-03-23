@extends('Layouts.Backex.app')

@push('css')
    <style>
        body {
            background-image: url("{{asset('Backend/img/login-background.jpg')}}") !important;
            color: #3C4858;
            font-weight: 300;
            background-position: center center;
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row">
        <div class="offset-2"></div>
        <div class="col-md-5">
            <div class="card" style="margin-top: 30% !important;">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
