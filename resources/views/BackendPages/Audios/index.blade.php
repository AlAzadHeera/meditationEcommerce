@extends('Layouts.Backex.app')

@section('title','Audio')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 style="display:inline-block; float: left;" class="card-title ">All Audios</h4>
                            <a style="float: right; display: inline-block" class="btn btn-info btn-sm" href="{{ route('audio.create') }}">Add New Audio</a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="table_id">
                                    <thead class=" text-primary">
                                    <th>ID</th>
                                    <th width="30%">Name</th>
                                    <th width="30%">Description</th>
                                    <th>Thumbnail</th>
                                    <th>Date</th>
                                    <th>Action</th>
                                    </thead>
                                    <tbody>
                                    @foreach($files as $key => $file)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $file->title }}</td>
                                            <td>{{ $file->description }}</td>
                                            <td><img class="img-fluid" width="35%" src="{{ asset('uploads/audio/'.$file->image) }}" alt=""></td>
                                            <td>{{\Carbon\Carbon::parse($file->created_at)->format('d/m/Y')}}</td>
                                            <td class="text-primary">
                                                <button class="btn btn-danger btn-sm" onclick="deleteFunction({{ $file->id }})">Delete</button>
                                                <form id="deleteForm-{{$file->id}}" action="{{route('video.destroy',$file->id)}}" method="POST" style="display: none;">
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
