@extends('Layouts.Frontex.frontApp')

@section('title','Blog-Grid')

@push('css')

@endpush

@section('content')
    <body>
    <div class="site">
        <!-- Start Header -->
    @include('Layouts.Partials.Frontend.header')
    <!-- End Header -->
        <header class="noo-page-heading heading-bg-image">
            <div class="container-boxed max">
                <div class="page-heading-info ">
                    <h1 class="page-title">Blog</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="active"><span>Blog</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-9">
                    <div class="posts-loop masonry grid">
                        <div class="posts-loop-title">
                            <h3>We found <span class="text-primary">6</span> available classes for you</h3>
                            <span class="loop-view-mode">
                                <a class="grid-mode active" title="Grid"><i class="fa fa-th"></i></a>
                                <a class="list-mode" title="List" href="{{ route('blogList') }}"><i class="fa fa-th-list"></i></a>
                            </span>
                        </div>
                        <div class="masonry-container">
                            @foreach($posts as $post)
                                <article class="masonry-item col-sm-6 col-md-6">
                                <div class="loop-item-featured">
                                    <a href="{{ route('blogDetails',$post->slug) }}">
                                        <img width="600" height="450" src="{{ $post->fImage }}" alt="class_10"/>
                                    </a>
                                </div>
                                <div class="loop-item-content">
                                    <div class="loop-item-content-summary">
                                        <div class="loop-item-category">
                                            <a href="">{{ $post->category->name }}</a>
                                        </div>
                                        <h2 class="loop-item-title">
                                            <a href="{{ route('blogDetails',$post->slug) }}" title="">{{ $post->title }}</a>
                                        </h2>
                                        <div class="loop-item-excerpt">
                                            {!! \Illuminate\Support\Str::limit($post->post,150) !!}
                                        </div>
                                        <div class="content-meta">
												<span>
													<i class="fa fa-user"></i>
													<a href="#">{{ $post->author }}</a>
												</span>
                                            <span>
													<time><i class="fa fa-calendar"></i> {{ $post->created_at->format('d-M-Y') }}</time>
												</span>
                                        </div>
                                    </div>
                                    <div class="loop-item-action">
                                        <a class="btn btn-default btn-block text-uppercase" href="{{ route('blogDetails',$post->slug) }}">Read More</a>
                                    </div>
                                </div>
                            </article>
                            @endforeach
                        </div>
                        <div class="pagination list-center">
                            <span class='page-numbers current'>1</span>
                            <a class='page-numbers' href='#'>2</a>
                            <a class='page-numbers' href='#'>3</a>
                            <a class="next page-numbers" href="#">Next</a>
                        </div>
                    </div>
                </div>
                <div class="noo-sidebar col-md-3">
                    <div class="noo-sidebar-wrap">
                        <div class="widget widget_categories">
                            <h4 class="widget-title">
                                <span>post</span> categories
                            </h4>
                            <ul>
                                @foreach($categories as $category)
                                    <li class="cat-item"><a href="{{ route('blogByCategory',$category->id) }}">{{ $category->name }}</a> (2)</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')

@endpush
