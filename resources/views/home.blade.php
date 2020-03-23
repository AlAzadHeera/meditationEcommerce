@extends('Layouts.Backex.app')
@section('title','Dashboard')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-stats">
                        <div class="card-header card-header-success card-header-icon">
                            <div class="card-icon">
                                <i class="material-icons">store</i>
                            </div>
                            <h3 class="card-category">Welcome</h3>
                            <h1 class="card-title">{{ Auth::user()->name }}</h1>
                        </div>
                        <div class="card-footer">
                            <div class="stats">
                                <i class="material-icons">favorite</i> Good To Get You Back
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
