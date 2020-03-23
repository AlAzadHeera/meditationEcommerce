@extends('Layouts.Backex.app')

@section('title','Orders')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="card-header card-header-tabs card-header-primary">
                            <div class="nav-tabs-navigation">
                                <div class="nav-tabs-wrapper">
                                    <span class="nav-tabs-title">Orders:</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-toggle="tab">
                                                <i class="material-icons">schedule</i> Pending
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons">assignment_turned_in</i> Delivered
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body" style="height: 450px; overflow: scroll; overflow-x:hidden;">
                            <div class="tab-content">
                                <div class="tab-pane active" id="profile">
                                    <table class="table">
                                        <tbody>
                                        @foreach($incompleteOrders as $inComplete)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" value="">
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td>Order NO: {{ $inComplete->orderID }}</td>
                                                <td>Date: {{\Carbon\Carbon::parse($inComplete->created_at)->format('d/m/Y')}}</td>
                                                <td>Order Placed: {{ \Carbon\Carbon::parse($inComplete->created_at)->diffForHumans() }}</td>
                                                <td class="td-actions text-right">
                                                    <a href="{{ route('orderEdit',$inComplete->orderID) }}" title="Edit Task" >
                                                        <i class="material-icons">visibility</i>
                                                    </a>
                                                    <button type="button" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="deleteFunction({{$inComplete->orderID}})">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <form id="deleteForm-{{$inComplete->orderID}}" action="{{route('deleteOrder',$inComplete->orderID)}}" method="POST" style="display: none;">
                                                        @csrf
                                                        @method('POST')
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane" id="messages">
                                    <table class="table">
                                        <tbody>
                                        @foreach($completeOrders as $cOrder)
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="checkbox" value="" checked>
                                                        <span class="form-check-sign">
                                                            <span class="check"></span>
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td>{{ $cOrder->orderID }}</td>
                                            <td>Date: {{\Carbon\Carbon::parse($inComplete->created_at)->format('d/m/Y')}}</td>
                                            <td>Order Placed: {{ \Carbon\Carbon::parse($inComplete->created_at)->diffForHumans() }}</td>
                                            <td class="td-actions text-right">
                                                <a href="{{ route('orderEdit',$cOrder->orderID) }}" title="Edit Task" >
                                                    <i class="material-icons">visibility</i>
                                                </a>
                                                <button type="button" class="btn btn-danger btn-link btn-sm" onclick="deleteFunction({{$cOrder->orderID}})">
                                                    <i class="material-icons">close</i>
                                                </button>
                                                <form id="deleteForm-{{$cOrder->orderID}}" action="{{route('deleteOrder',$cOrder->orderID)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('POST')
                                                </form>
                                            </td>
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
@endsection

@push('scripts')
    <script type="text/javascript">
        function deleteFunction(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
            })

            swalWithBootstrapButtons.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('deleteForm-'+id).submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                        'Cancelled',
                        'Your data is safe :)',
                        'error'
                    )
                }
            })
        }
    </script>
@endpush
