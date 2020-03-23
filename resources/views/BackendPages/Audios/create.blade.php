@extends('Layouts.Backex.app')

@section('title','Audio')

@push('css')

@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" style="float: none;margin: 0 auto;">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Upload Video</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('audio.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Title</label>
                                            <input type="text" id="name" class="form-control" name="title">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Brief Description</label>
                                        <textarea type="text" class="form-control" name="description"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="bmd-label-floating">Thumbnail</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="bmd-label-floating">Audio</label>
                                        <input type="file" name="file">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4" style="float: none; margin: 0 auto;">
                                        <input type="submit" class="btn btn-primary btn-round" value="Upload">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

@endpush
