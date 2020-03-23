@extends('Layouts.Backex.app')

@section('title','Category-Update')

@push('css')
@endpush

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-7" style="float: none;margin: 0 auto;">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Edit A Category</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('category.update',$category->id) }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                @method('put')
                                <div class="row">
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Category</label>
                                            <br>
                                            <input type="text" id="name" class="form-control" name="name" value="{{ $category->name }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4" style="float: none; margin: 0 auto;">
                                        <input type="submit" class="btn btn-primary btn-round" value="Save">
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

@push('script')
@endpush
