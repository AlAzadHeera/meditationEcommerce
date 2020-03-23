@extends('Layouts.Backex.app')

@section('title','Video')

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
                            <form action="{{ route('video.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
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
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Youtube Link</label>
                                            <input id="uLink" type="text" class="form-control" name="link">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <input id="localLink" type="file" name="video">
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

    <script>
        $('#uLink').blur(function(){
            if($(this).val().length != 0){
                $('#localLink').attr('disabled', 'disabled');
            }
        });
    </script>
    <script>
        $('#localLink').blur(function(){
            if($(this).val().length != 0){
                $('#uLink').attr('disabled', 'disabled');
            }
        });
    </script>

@endpush
