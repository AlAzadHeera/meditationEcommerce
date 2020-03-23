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
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-12">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-3 offset-md-2">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
