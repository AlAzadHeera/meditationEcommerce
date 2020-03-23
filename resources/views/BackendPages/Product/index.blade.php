@extends('Layouts.Backex.app')

@section('title','Product')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 style="display:inline-block; float: left;" class="card-title ">All Products</h4>
                            <a style="float: right; display: inline-block" class="btn btn-info btn-sm" href="{{ route('product.create') }}">Add New Products</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" id="table_id">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th width="20%">Name</th>
                                    <th width="25%">Brief Description</th>
                                    <th width="10%">Category</th>
                                    <th width="10%">Price</th>
                                    <th>Image</th>
                                    <th width="20%">Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $key => $product)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->shortDescription }}</td>
                                            <td>{{ $product->category }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td><img class="img-fluid" width="25%" src="{{ asset('uploads/product/'.$product->image) }}" alt=""></td>
                                            <td class="text-primary">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                                    <i class="fa fa-eye"></i>
                                                </button>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLongTitle">{{ $product->name }}</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <img style="width: 50%; margin: 0 auto; display: block;" class="img-fluid" src="{{ asset('uploads/product/'.$product->image) }}" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="card card-body">
                                                                        <p style="text-align: center">{{ $product->longDescription }}</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="btn btn-primary btn-sm" href="{{ route('product.edit',$product->id) }}"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" onclick="deleteFunction({{ $product->id }})"><i class="fa fa-trash"></i></button>
                                                <form id="deleteForm-{{$product->id}}" action="{{route('product.destroy',$product->id)}}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
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
