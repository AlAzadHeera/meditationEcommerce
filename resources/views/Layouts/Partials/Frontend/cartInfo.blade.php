<div class="noo-minicart">
    @if(Cart::isEmpty())
        <div class="minicart-header">Your shopping bag is empty.</div>
    @else
        <div class="minicart-header">You Have {{$carts->count()}} Item In Your Cart</div>
        <div class="minicart-header"><a style="color: red !important;" href="{{ route('clearCart') }}">Clear Cart</a></div>
    @endif
    <div class="minicart-footer">
        <div class="minicart-actions clearfix">
            <a class="button pull-left btn-primary" href="{{ route('checkOut') }}">
                <span class="text">Checkout</span>
            </a>
        </div>
    </div>
</div>
