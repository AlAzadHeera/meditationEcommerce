@php
    $carts = Cart::getContent();
    $customerID = Session::get('customerID');
    $customerName = Session::get('customerName');
@endphp

<header class="noo-header">
    <div class="navbar-wrapper">
        <div class="navbar navbar-default  fixed-top shrinkable" role="navigation">
            <div class="container-boxed max">
                <div class="navbar-header">
                    <h1 class="sr-only">Kimberly Rose</h1>
                    <a class="navbar-toggle collapsed" data-toggle="collapse" data-target=".noo-navbar-collapse">
                        <span class="sr-only">Navigation</span>
                        <i class="fa fa-bars"></i>
                    </a>
                    <a class="navbar-toggle member-navbar-toggle collapsed" data-toggle="collapse" data-target=".noo-user-navbar-collapse"><i class="fa fa-user"></i></a>
                    <a href="{{ route('welcome') }}" class="navbar-brand" title="Yoga Health Theme">
                        <img class="noo-logo-img noo-logo-normal" src="{{ asset('Frontend/images/logo.jfif') }}" alt="Yoga Health Theme">
                        <img class="noo-logo-retina-img noo-logo-normal" src="{{ asset('Frontend/images/logo-retina.png') }}" alt="Yoga Health Theme">
                    </a>
                </div>
                <nav class="collapse navbar-collapse noo-user-navbar-collapse" role="navigation">
                    <ul class="navbar-nav sf-menu">
                        <li class="fly-right">
                            <a href="{{ route('cart') }}" class="member-cart-link">My Cart</a>
                        </li>
                        @if($customerID != null)
                            <li class="fly-right">
                                <a href="{{ route('cLogout') }}" class="member-login-link">Logout</a>
                            </li>
                        @else
                            <li class="fly-right">
                                <a href="{{ route('cLogin') }}" class="member-login-link">Login</a>
                            </li>
                            <li class="menu-item fly-right">
                                <a href="{{ route('cRegistraion') }}" class="member-register-link">Register</a>
                            </li>
                        @endif
                    </ul>
                </nav>
                <nav>
                    <ul class="navbar-nav sf-menu member-links header-right">
                        <li class="member-info">
                            <a href="#">
                                <span class="user-name"><i class="fa fa-user"></i></span>
                            </a>
                            <ul class="sub-menu">
                                @if($customerID != null)
                                    <li>
                                        <a href="{{ route('cLogout') }}" class="member-login-link">
                                            <i class="fa fa-sign-in"></i> Logout
                                        </a>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{ route('cLogin') }}" class="member-login-link">
                                            <i class="fa fa-sign-in"></i> Login
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('cRegistraion') }}" class="member-register-link"><i class="fa fa-key"></i> Register</a>
                                    </li>
                                @endif
                            </ul>
                        </li>
                        <li class="noo-menu-item-cart minicart">
                            <a title="View cart" class="cart-button" href="#">
                                <span class="cart-item"><i class="fa fa-shopping-cart"></i></span>
                            </a>
                            @include('Layouts.Partials.Frontend.cartInfo')
                        </li>
                    </ul>
                </nav>
                <nav class="collapse navbar-collapse noo-navbar-collapse">
                    <ul class="navbar-nav sf-menu">
                        <li class="{{ Request::is('welcome') ? ' current-menu-item' : '' }}"><a href="{{ route('welcome') }}">Home</a></li>
                        <li class="{{ Request::is('aboutUs') ? ' current-menu-item' : '' }}"><a href="{{ route('aboutUs') }}">About Me</a></li>
                        <li class="{{ Request::is('services') ? ' current-menu-item' : '' }}"><a href="{{ route('services') }}">Services</a></li>
                        <li class="{{ Request::is('shop') ? ' current-menu-item' : '' }}"><a href="{{ route('shop') }}">Shop</a></li>
                        <li class="{{ Request::is('shop') ? ' current-menu-item' : '' }}"><a href="{{ route('shop') }}">Blog</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
