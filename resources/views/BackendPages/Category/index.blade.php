@extends('Layouts.Backex.app')

@section('title','Category')

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
                            <a style="float: right; display: inline-block" class="btn btn-info btn-sm" href="{{ route('category.create') }}">New Category</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table text-center" id="table_id">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td class="text-primary">
                                                <a class="btn btn-primary btn-sm" href="{{ route('category.edit',$category->id) }}"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm" onclick="deleteFunction({{ $category->id }})"><i class="fa fa-trash"></i></button>
                                                <form id="deleteForm-{{$category->id}}" action="{{route('category.destroy',$category->id)}}" method="POST" style="display: none;">
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
