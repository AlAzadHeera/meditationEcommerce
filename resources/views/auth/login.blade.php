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
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-left">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-12">
                                    <input id="email" type="email" class="form-control form-top-margin @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-left">{{ __('Password') }}</label>

                                <div class="col-md-12">
                                    <input id="password" type="password" class="form-control form-top-margin @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-3">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    {{--@if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif--}}
                                </div>
                                <div class="col-md-9">
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="checkbox checkbox-radios" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
