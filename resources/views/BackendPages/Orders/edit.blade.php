@extends('Layouts.Backex.app')

@section('title','Orders')

@push('css')

@endpush

@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-warning card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">content_copy</i>
                            </div>
                            <p class="card-category">Payment Status</p>
                            <h3 class="card-title">{{ $incompleteOrder->paymentStat }}
                                @if($incompleteOrder->paymentStat == "Paid")
                                    <form method="POST" action="{{ route('changePaymentStat',$incompleteOrder->orderID) }}">
                                        @csrf
                                        <input type="hidden" name="status" value="Pending">
                                        <input class="btn btn-dark" type="submit" value="Mark As Pending">
                                    </form>
                                @elseif($incompleteOrder->paymentStat == "Pending")
                                    <form method="POST" action="{{ route('changePaymentStat',$incompleteOrder->orderID) }}">
                                        @csrf
                                        <input type="hidden" name="status" value="Paid">
                                        <input class="btn btn-dark" type="submit" value="Mark As Paid">
                                    </form>
                                @endif
                            </h3>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons text-success">done</i>
                                <p><b>Payment ID: </b>{{ $incompleteOrder->paymentID }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <p class="card-category">Delivery Status</p>
                            <h3 class="card-title">{{ $incompleteOrder->deliveryStat }}</h3>
                            @if($incompleteOrder->deliveryStat == "Delivered")
                                <form action="{{ route('changeDeliveryStat',$incompleteOrder->orderID) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="Pending" name="status">
                                    <input class="btn btn-dark" type="submit" value="Mark As Pending">
                                </form>
                            @elseif($incompleteOrder->deliveryStat == "Pending")
                                <form action="{{ route('changeDeliveryStat',$incompleteOrder->orderID) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="Delivered" name="status">
                                    <input class="btn btn-dark" type="submit" value="Mark As Delivered">
                                </form>
                            @endif
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">date_range</i> <p><b>Order NO</b> {{ $incompleteOrder->orderID }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-stats">
                        <div class="card-header card-header-info card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">featured_play_list</i>
                            </div>
                            <h4 class="card-category">Product Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title ">Product Info</h4>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead class=" text-primary">
                                                        <th>ID</th>
                                                        <th>Name</th>
                                                        <th>Quantity</th>
                                                        <th>Price</th>
                                                        <th>Sub Total</th>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($incompleteOrderProducts as $key=> $product)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>{{ $product->productName }}</td>
                                                            <td>{{ $product->productQty }}</td>
                                                            <td>{{ $product->productPrice }}</td>
                                                            <td class="text-primary">{{ $product->productTotal }}$</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card card-stats">
                        <div class="card-header card-header-danger card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">payment</i>
                            </div>
                            <h4 class="card-category">Shipping Info</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-header card-header-primary">
                                            <h4 class="card-title ">Shipping Info</h4>
                                        </div>
                                        <div class="card-body text-left">
                                            <table class="table table-responsive table-bordered" style="width: 100%;">
                                                <tr>
                                                    <th>Name:</th>
                                                    <td>{{ $shippingInfo->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Address:</th>
                                                    <td>{{ $shippingInfo->address }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Email:</th>
                                                    <td>{{ $shippingInfo->email }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Mobile:</th>
                                                    <td>{{ $shippingInfo->mobile }}</td>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <h3><b>Total: </b>{{ $incompleteOrder->grandTotal }}$</h3>
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
