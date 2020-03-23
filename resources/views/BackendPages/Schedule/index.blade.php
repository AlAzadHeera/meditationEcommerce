@extends('Layouts.Backex.app')

@section('title','Schedule')

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
                                    <span class="nav-tabs-title">Schedule</span>
                                    <ul class="nav nav-tabs" data-tabs="tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" href="#profile" data-toggle="tab">
                                                <i class="material-icons">schedule</i> Pending
                                                <div class="ripple-container"></div>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="#messages" data-toggle="tab">
                                                <i class="material-icons">assignment_turned_in</i> Done
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
                                        @foreach($incompleteSchedules as $key=> $schedule)
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
                                                <td># {{ $key + 1 }}</td>
                                                <td>Name: {{ $schedule->name }}</td>
                                                <td>Date: {{ $schedule->time }}</td>
                                                <td>Order Placed: {{ \Carbon\Carbon::parse($schedule->created_at)->diffForHumans() }}</td>
                                                <td class="td-actions text-right">
                                                    <a class="btn btn-link btn-sm btn-primary" href="{{ route('markAsDone',$schedule->id) }}" title="Mark As Done" >
                                                        <i class="material-icons">check_circle_outline</i>
                                                    </a>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-link btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter"><i class="material-icons">visibility</i></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Name: </th>
                                                                            <td>{{ $schedule->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Address: </th>
                                                                            <td>{{ $schedule->address }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Email: </th>
                                                                            <td>{{ $schedule->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Mobile: </th>
                                                                            <td>{{ $schedule->mobile }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Service: </th>
                                                                            <td>{{ $schedule->service }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Assuming Time & Date: </th>
                                                                            <td>{{ $schedule->time }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="deleteFunction({{$schedule->id}})">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <form id="deleteForm-{{$schedule->id}}" action="{{route('deleteOrder',$schedule->id)}}" method="POST" style="display: none;">
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
                                        @foreach($completeSchedules as $key=> $schedule)
                                            <tr>
                                                <td>
                                                    <div class="form-check">
                                                        <label class="form-check-label">
                                                            <input class="form-check-input" type="checkbox" checked>
                                                            <span class="form-check-sign">
                                                                <span class="check"></span>
                                                            </span>
                                                        </label>
                                                    </div>
                                                </td>
                                                <td># {{ $key + 1 }}</td>
                                                <td>Name: {{ $schedule->name }}</td>
                                                <td>Date: {{ $schedule->time }}</td>
                                                <td>Order Placed: {{ \Carbon\Carbon::parse($schedule->created_at)->diffForHumans() }}</td>
                                                <td class="td-actions text-right">
                                                    <a class="btn btn-link btn-sm btn-primary" href="{{ route('markAsUnDone',$schedule->id) }}" title="Mark As Incomplete" >
                                                        <i class="material-icons">schedule</i>
                                                    </a>
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-link btn-sm btn-primary" data-toggle="modal" data-target="#exampleModalCenter1"><i class="material-icons">visibility</i></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <table class="table">
                                                                        <tr>
                                                                            <th>Name: </th>
                                                                            <td>{{ $schedule->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Address: </th>
                                                                            <td>{{ $schedule->address }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Email: </th>
                                                                            <td>{{ $schedule->email }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Mobile: </th>
                                                                            <td>{{ $schedule->mobile }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Service: </th>
                                                                            <td>{{ $schedule->service }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <th>Assuming Time & Date: </th>
                                                                            <td>{{ $schedule->time }}</td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <button type="button" title="Remove" class="btn btn-danger btn-link btn-sm" onclick="deleteFunction({{$schedule->id}})">
                                                        <i class="material-icons">close</i>
                                                    </button>
                                                    <form id="deleteForm-{{$schedule->id}}" action="{{route('deleteSchedule',$schedule->id)}}" method="POST" style="display: none;">
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
