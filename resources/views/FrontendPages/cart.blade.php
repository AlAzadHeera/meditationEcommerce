@php
    $carts = Cart::getContent();
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Cart')

@push('css')

@endpush

@section('content')
    <body class="">
    <div class="site">
        <!-- Start Header -->
            @include('Layouts.Partials.Frontend.header')
        <!-- End Header -->

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-12">
                    <div class="shop">
                            <table class="shop_table cart" cellspacing="0">
                                <thead>
                                <tr>
                                    <th class="product-remove">&nbsp;</th>
                                    <th class="product-thumbnail">&nbsp;</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity text-center">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($carts as $cart)
                                <tr class="cart_item">
                                    <td class="product-remove">
                                        <a href="{{ route('cartRemove',$cart->id) }}" class="remove" title="Remove this item">&times;</a>
                                    </td>
                                    <td class="product-thumbnail">
                                        <a href="#"><img width="100" height="100" src="{{ asset('uploads/product/'.$cart->attributes->image) }}" alt="product-thumb" /></a>
                                    </td>
                                    <td class="product-name">
                                        <a href="#">{{ $cart->name }}</a>
                                    </td>
                                    <td class="product-price">
                                        <span class="amount">&#36;{{ $cart->price }}</span>
                                    </td>
                                    <td class="product-quantity">
                                        <div class="quantity" style="width: 50%; margin: 0 auto;">
                                            <form action="{{ route('cartUpdate') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="productID" value="{{ $cart->id }}">
                                                <input type="number" step="1" min="0" value="{{ $cart->quantity }}" name="quantity" class="input-text qty text" size="4" />
                                                <input type="submit" class="button" name="update_cart" value="Update Cart" />
                                            </form>
                                        </div>
                                    </td>
                                    <td class="product-subtotal">
                                        <span class="amount">&#36;{{ Cart::get($cart->id)->getPriceSum() }}</span>
                                    </td>
                                </tr>
                                @endforeach
                                <tr>
                                    <td colspan="6">
                                        <div class="col-md-5" style="float: right">
                                            <table class="table table-bordered">
                                                <tbody>
                                                <tr>
                                                    <th>Tax</th>
                                                    <td>&#36;0</td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping</th>
                                                    <td>Free</td>
                                                </tr>
                                                <tr>
                                                    <th>Sub Total</th>
                                                    <td>&#36;{{ Cart::getTotal() }}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="6" class="actions">
                                        <a href="{{ route('checkOut') }}" class="btn btn-primary">Checkout</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

@endpush
