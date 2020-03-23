@extends('Layouts.Frontex.frontApp')

@section('title','Blog-Grid')

@push('css')
    <style>
        #social-links ul li:before {
            color: #800020;
            display: none !important;
        }

        #social-links ul li {
            display: inline;
        }
    </style>
@endpush

@section('content')
    <body class="single single-post">
    <div class="site">
        <!-- Start Header -->
        @include('Layouts.Partials.Frontend.header')
        <!-- End Header -->
        <header class="noo-page-heading">
            <div class="container-boxed max">
                <div class="page-heading-info ">
                    <h1 class="page-title"><span class="nth-word-first">Blog</span> Detail</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="{{ route('welcome') }}">Home</a></li>
                            <li class="active"><span>{{ $post->title }}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="container-boxed max offset">
            <div class="row">
                <div class="noo-main col-md-9">
                    <article class="hentry">
                        <header class="content-header clearfix">
                            <h1 class="content-title">{{ $post->title }}</h1>
                            <p class="content-meta">
                                <span><i class="fa fa-user"></i><a href="#" title="">{{ $post->author }}</a></span>
                                <span>
                                    <time class="entry-date">
                                        <i class="fa fa-calendar"></i>{{ Carbon\Carbon::parse($post->created_at)->format('d-M-Y') }}
                                    </time>
                                </span>
                            </p>
                        </header>
                        <div class="content-featured">
                            <img width="1440" height="900" src="{{ $post->fImage }}" alt="blog_detail"/>
                        </div>
                        <div class="content-wrap">
                            {!! $post->post !!}
                            <div class="entry-tags">
                                <i class="fa fa-tags"></i><a href="#">{{ $post->category->name }}</a>
                            </div>
                            <div class="noo-social">
                                {!!
                                 Share::currentPage()
	                                ->facebook()
                                    ->twitter()
                                    ->linkedin('Extra linkedin summary can be passed here')
                                    ->whatsapp()
                                !!}
                            </div>
                        </div>
                    </article>
                    <div id="comments">
                        <div id="disqus_thread"></div>
                        <script>

                            /**
                             *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
                             *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
                            /*
                            var disqus_config = function () {
                            this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
                            this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
                            };
                            */
                            (function() { // DON'T EDIT BELOW THIS LINE
                                var d = document, s = d.createElement('script');
                                s.src = 'https://EXAMPLE.disqus.com/embed.js';
                                s.setAttribute('data-timestamp', +new Date());
                                (d.head || d.body).appendChild(s);
                            })();
                        </script>
                        <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
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
                                    <li class="cat-item"><a href="#">{{ $category->name }}</a> (2)</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/share.js') }}"></script>

    <script>
        $(function () {
            $('#social-links').remove();
        });
    </script>
@endpush
