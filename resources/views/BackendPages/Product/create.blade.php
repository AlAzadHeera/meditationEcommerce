@extends('Layouts.Backex.app')

@section('title','Product')

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
                            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="row">
                                    <div class="col-md-12" style="float: none; margin: 0 auto;">
                                        <div class="form-group">
                                            <label class="bmd-label-floating">Name</label>
                                            <input type="text" id="name" class="form-control" name="name">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Brief Description</label>
                                        <textarea type="text" class="form-control" name="shortDescription"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Long Description</label>
                                        <textarea type="text" class="form-control" name="longDescription"></textarea>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Category</label>
                                        <select type="text" class="form-control" name="category">
                                            <option value="stone">Stone</option>
                                            <option value="candle">Candle</option>
                                            <option value="incense">Incense</option>
                                            <option value="shirt">T-Shirt</option>
                                            <option value="others">Others</option>
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <label class="bmd-label-floating">Price</label>
                                        <input type="text" class="form-control" name="price">
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-4">
                                        <label class="bmd-label-floating">Image</label>
                                        <input type="file" name="image">
                                    </div>
                                </div>
                                <br>
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
