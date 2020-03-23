@php
    $carts = Cart::getContent();
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','About Us')

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
                    <h1 class="page-title"><span class="nth-word-first">About</span> me</h1>
                </div>
                <div class="noo-page-breadcrumb">
                    <div class="breadcrumb-wrap">
                        <ul class="breadcrumb">
                            <li><a href="#">Home</a></li>
                            <li class="active"><span>About me</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>

        <div class="main-content container-fullwidth">
            <div class="row">
                <div class="noo-main col-md-12">
                    <div class="container-boxed max">
                        <div class="row about-us-section">
                            <div class="col-md-5 col-sm-6">
                                <img class="img-responsive img-thumbnail" src="{{ asset('Frontend/images/about_page_img.jpg') }}" alt="about_page_img" class="noo-image">
                            </div>
                            <div class="col-md-7 col-sm-6">
                                <div class="text-block">
                                    <h3 class="custom-title"><span class="first">My</span> story</h3>
                                </div>
                                <hr class="noo-gap noo-gap-30">
                                <div class="text-block">
                                    <p>
                                        My name is Kimberly Rose. I am an Insurance agent by trade. I specialize in Medicare Health plans for Seniors on Medicare. I also market Life insurance plans and Final Expense policies for people of all ages. I am the Mother of two adult sons. I meditate regularly to bring balance to my mind, body and spirit. I am spiritually connected to the Universe which allows me to be spiritually connected to other beings. These connections allow me to motivate, encourage and inspire people to connect with their higher selves.
                                        <br><br>
                                        I am gifted with a strong spirit of discernment that births a natural ability to teach and lead, which compels me to uplift others. I am a speaker who promotes self-love and champions maximizing one's own potential. My nickname says it all! K.I.M. Keep It Moving. It's more than a catchy slogan. It's a way of Life!!
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
@endsection

@push('scripts')
    <script type='text/javascript' src='{{ asset('Frontend/js/libs/isotope-2.0.0.min.js') }}'></script>
    <script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery.carouFredSel-6.2.1.js') }}'></script>
    <script type="text/javascript">
        jQuery('document').ready(function($) {

            function getCenterThumb() {
                var visible = jQuery('.testimonial-author ul').triggerHandler('currentVisible'),
                    center = Math.floor((visible.length - 1) / 2);

                return center;
            }

            var testimonialOptions = {
                infinite: true,
                circular: true,
                responsive: true,
                debug: false,
                width: '100%',
                height: 'variable',
                scroll: {
                    items: 1,
                    duration: 600,
                    pauseOnHover: "resume",
                    fx: "scroll",
                    onBefore: function(data) {
                        var page = data.items.visible.first().data('page');
                        jQuery('.testimonial-author ul').trigger('slideTo', [jQuery('.testimonial-author ul').find("li[data-source=" + page + "]"), -getCenterThumb()]);
                        jQuery('.testimonial-author ul').find('li').removeClass('selected');
                    },
                    onAfter: function(data) {
                        var page = data.items.visible.first().data('page');
                        jQuery('.testimonial-author ul').find("li[data-source=" + page + "]").addClass('selected');
                    }
                },
                auto: {
                    timeoutDuration: 10000,
                    play: true
                },
                swipe: {
                    onTouch: true,
                    onMouse: true
                },
                items: {
                    visible: {
                        min: 1,
                        max: 1
                    },
                    height: 'variable'
                },
            };
            jQuery('.testimonial-quote ul').carouFredSel(testimonialOptions);

            var testimonialThumbOptions = {
                infinite: true,
                circular: true,
                responsive: true,
                debug: false,
                width: '100%',
                height: 120,
                align: 'center',
                scroll: {
                    items: 2,
                    duration: 600,
                    pauseOnHover: "resume",
                    fx: "scroll"
                },
                auto: false,
                swipe: {
                    onTouch: true,
                    onMouse: true
                },
                items: {
                    visible: 18,
                    width: "variable",
                    height: 100,
                    align: 'center'
                },
                onCreate: function() {
                    var center = 8; //getCenterThumb();
                    jQuery('.testimonial-author ul').trigger('slideTo', [-center, {
                        duration: 0
                    }]);
                    jQuery('.testimonial-author ul').find('li').eq(center).addClass('selected');
                }
            };

            jQuery('.testimonial-author ul').carouFredSel(testimonialThumbOptions);

            jQuery(document).on('click', '.testimonial-author li', function(e) {
                e.stopPropagation();
                e.preventDefault();
                var source = jQuery(this).data('source');
                jQuery('.testimonial-quote ul').trigger('slideTo', jQuery('.testimonial-quote ul').find("li[data-page=" + source + "]"));
            });
        });

    </script>
@endpush
