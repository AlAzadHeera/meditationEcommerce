@php
    $carts = Cart::getContent();
@endphp

@extends('Layouts.Frontex.frontApp')

@section('title','Home')

@push('css')
    <style>
        .subscribe-section {
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>
@endpush

@section('content')
    <body class="home page-menu-center-vertical">
    <div class="site">
        <!-- Start Header -->
        <!-- Start Header -->
        @include('Layouts.Partials.Frontend.header')
        <!-- End Header -->
        <div class="main-content container-fullwidth">
            <div class="row">
                <div class="col-md-12">
                    <div class="noo-rev-slider">
                        <div id="rev-slider-wrapper" class="rev_slider_wrapper fullscreen-container">
                            <div id="rev-slider" class="rev_slider fullscreenbanner" style="display:none;">
                                <ul>
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                                        <img src="{{ asset('Frontend/images/member-ship-bg.jpg') }}" style='background-color:#ccd8d8' alt="slideshow1" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                        <div class="tp-caption lfl" data-x="0" data-y="-130" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300">
                                            <img src="{{ asset('Frontend/images/slideshow/slideshow1_img.png') }}" alt="">
                                        </div>
                                        <div class="tp-caption lft" data-x="778" data-y="-100" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300">
                                            <img width="300" src="{{ asset('Frontend/images/slideshow/logo-slideshow1.jpg') }}" alt="">
                                        </div>
                                        <div class="tp-caption largeblackcustom sfr stl tp-resizeme" data-x="608" data-y="225" data-speed="300" data-start="1200" data-easing="Power0.easeOut" data-splitin="chars" data-splitout="chars" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300" data-endeasing="Power0.easeOut">
                                            meditation is transformation
                                        </div>
                                        <div class="tp-caption largeblackcustom sfr stl tp-resizeme" data-x="671" data-y="274" data-speed="300" data-start="2500" data-easing="Power1.easeIn" data-splitin="chars" data-splitout="chars" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300" data-endeasing="Power0.easeOut">
                                            awakening to self
                                        </div>
                                    </li>
                                    <li data-transition="random" data-slotamount="7" data-masterspeed="300" data-saveperformance="off">
                                        <img src="{{ asset('Frontend/images/member-ship-bg.jpg') }}" style='background-color:#ccd8d8' alt="slideshow2" data-bgposition="center top" data-bgfit="cover" data-bgrepeat="no-repeat">
                                        <div class="tp-caption lfl" data-x="84" data-y="-130" data-speed="300" data-start="500" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300">
                                            <img src="{{ asset('Frontend/images/slideshow/slideshow1_img_2.png') }}" alt="">
                                        </div>
                                        <div class="tp-caption lft" data-x="710" data-y="-112" data-speed="300" data-start="800" data-easing="Power3.easeInOut" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300">
                                            <img width="300" src="{{ asset('Frontend/images/slideshow/logo-slideshow1.jpg') }}" alt="">
                                        </div>
                                        <div class="tp-caption largeblackcustom sfb stl tp-resizeme" data-x="539" data-y="242" data-speed="300" data-start="1200" data-easing="Power0.easeOut" data-splitin="chars" data-splitout="chars" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300">
                                            MEDITATION DOESN'T TAKE TIME
                                        </div>
                                        <div class="tp-caption largeblackcustom sfb stl tp-resizeme" data-x="661" data-y="299" data-speed="300" data-start="2500" data-easing="Power0.easeOut" data-splitin="chars" data-splitout="chars" data-elementdelay="0.1" data-endelementdelay="0.1" data-end="5700" data-endspeed="300">
                                            IT GIVES TIME
                                        </div>
                                    </li>
                                </ul>
                                <div class="tp-bannertimer"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="container-boxed max">
                            <div class="col-md-8 col-sm-12">
                                <hr class="noo-gap noo-gap-100">
                                <div class="text-block">
                                    <h2 class="custom-title-home">
                                        <span class="first">welcome</span>
                                    </h2>
                                    <p>I am Kimberly Rose. I have passion for meditation and I would love to spread that love to more and more people.</p>
                                    <p>I do not only teach yoga, I seek to create a meditation community where we can share daily matters, stress at work or problems in life. Meditation is the great recipe to communicate and balance your mind and body.</p>
                                </div>
                                <div class="row our-services">
                                    <div class="col-sm-4 col-md-4 col-sm-6">
                                        <span class="noo-icon">
                                            <i class="fa fa-bell"></i>
                                        </span>
                                        <div class="noo-text-block">
                                            <a>BALANCE BODY AND MIND</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-sm-6">
                                        <span class="noo-icon">
                                            <i class="fa fa-suitcase"></i>
                                        </span>
                                        <div class="noo-text-block">
                                            <a>HEALTHY<br />DAILY LIFE</a>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-4 col-sm-6">
                                        <span class="noo-icon">
                                            <i class="fa fa-trophy"></i>
                                        </span>
                                        <div class="noo-text-block">
                                            <a>RELAXED BODY AND MIND</a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="noo-gap noo-gap-100">
                            </div>
                            <div class="col-md-4 col-sm-6">
                                <hr class="noo-gap noo-gap-100">
                                <img src="{{ asset('Frontend/images/girl-1.png') }}" alt="girl-1" class="image">
                                <hr class="noo-gap noo-gap-100">
                            </div>
                        </div>
                    </div>

                    <div class="container-boxed max" style="padding-bottom: 25px;">
                        <div class="row">
                            <div class="col-md-12">
                                <hr class="noo-gap noo-gap-50">
                                <div class="text-block">
                                    <h2 class="custom-title-home"><span class="first">new video </span>topics</h2>
                                </div>
                                <div class="videos posts-loop slider">
                                    <div class="posts-loop-content row">
                                        <div class="col-sm-6">
                                            <div class="loop-thumb customScroll">
                                                <div class="loop-thumb-wrap">
                                                    <div class="loop-thumb-content">
                                                        <div class="carousel slide fade">
                                                            <div class="carousel-inner">
                                                                @foreach($videos as $key=> $video)
                                                                <div class="item active">
                                                                    <a href="#" data-target="#videos-content" data-slide-to="{{ $key }}">
                                                                        <span class="icon"><i class="fa fa-play"></i></span>{{ $video->title }}<span class="thumbnail-content">{{ $video->description }}</span>
                                                                    </a>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="videos-content" class="video carousel slide fade col-md-6 col-sm-6">
                                            <div class="carousel-inner">
                                                @foreach($videos as $video)
                                                    <article class="item {{ $loop->first ?  'active' : '' }}">
                                                        <div class="loop-item-wrap">
                                                            <div class="loop-item-featured" style="background: #000;">
                                                                @if($video->link != null)
                                                                    <iframe width="560" height="450" src="{{$video->link}}" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                                @else
                                                                    <video style="width: 100%; height: 450px;" controls>
                                                                        <source src="{{ asset('uploads/video/'.$video->file) }}" type="video/mp4">
                                                                        Your browser does not support HTML5 video.
                                                                    </video>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="container-boxed max" style="padding-bottom: 25px; ">
                        <div class="row">
                            <div class="col-md-12">
                                <hr class="noo-gap noo-gap-50">
                                <div class="text-block">
                                    <h2 class="custom-title-home"><span class="first">new audio </span>topics</h2>
                                </div>
                                <div class="videos posts-loop slider">
                                    <div class="posts-loop-content row">
                                        <div class="col-sm-6">
                                            <div class="loop-thumb customScroll">
                                                <div class="loop-thumb-wrap">
                                                    <div class="loop-thumb-content">
                                                        <div class="carousel slide fade">
                                                            <div class="carousel-inner">
                                                                @foreach($audios as $key=> $audio)
                                                                <div class="item active">
                                                                    <a href="#" data-target="#audio-content" data-slide-to="{{ $key }}">
                                                                        <span class="icon"><i class="fa fa-play"></i></span>{{ $audio->title }}<span class="thumbnail-content">{{ $audio->description }}</span>
                                                                    </a>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="audio-content" class="video carousel slide fade col-md-6 col-sm-6">
                                            <div class="carousel-inner">
                                                @foreach($audios as $audio)
                                                    <article class="item {{ $loop->first ?  'active' : '' }}">
                                                        <div class="loop-item-wrap">
                                                            <div class="loop-item-featured">
                                                                <img class="img-responsive" style="width: 100%; height: 450px;" src="{{ asset('uploads/audio/'.$audio->image) }}" alt="blog_1" />
                                                                <audio control>
                                                                    <source src="{{ asset('uploads/audio/'.$audio->file) }}" type="audio/mpeg">
                                                                </audio>
                                                            </div>
                                                        </div>
                                                    </article>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row testimonial-section">
                        <div class="col-md-12">
                            <div class="container-boxed max">
                                <div class="row" style="padding-top: 20px; padding-bottom: 20px;">
                                    <div class="col-md-6 col-sm-12">
                                        <img src="{{ asset('Frontend/images/girl-2.png') }}" alt="girl-2" class="noo-image">
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <hr class="noo-gap noo-gap-150">
                                        <div class="text-block">
                                            <div class="testimonial-content">
                                                <p class="text">My name is Kimberly Rose. I am an Insurance agent by trade. I specialize in Medicare Health plans for Seniors on Medicare. I meditate regularly to bring balance to my mind, body and spirit. I am spiritually connected to the Universe which allows me to be spiritually connected to other beings. These connections allow me to motivate, encourage and inspire people to connect with their higher selves.</p>
                                                <p><span class="text-primary"><i>Kimberly Rose</i></span></p>
                                            </div>
                                        </div>
                                        <hr class="noo-gap noo-gap-150">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row bg-image subscribe-section">
                        <div class="text-center col-md-12">
                            <hr class="noo-gap noo-gap-50">
                            <div class="noo-cta-btn text-center">
                                <p class="cta-message">Shop With And Make Meditaion More Enjoyable</p>
                                <a href="{{ route('shop') }}" class="btn square metro btn-default btn-subscribe">
                                    Shop now
                                </a>
                            </div>
                            <hr class="noo-gap noo-gap-50">
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        /******************************************
         -	PREPARE PLACEHOLDER FOR SLIDER	-
         ******************************************/

        var setREVStartSize = function() {
            var tpopt = new Object();
            tpopt.startwidth = 1170;
            tpopt.startheight = 350;
            tpopt.container = jQuery('#rev-slider');
            tpopt.fullScreen = "on";
            tpopt.forceFullWidth = "on";

            tpopt.container.closest(".rev_slider_wrapper").css({
                height: tpopt.container.height()
            });
            tpopt.width = parseInt(tpopt.container.width(), 0);
            tpopt.height = parseInt(tpopt.container.height(), 0);
            tpopt.bw = tpopt.width / tpopt.startwidth;
            tpopt.bh = tpopt.height / tpopt.startheight;
            if (tpopt.bh > tpopt.bw) tpopt.bh = tpopt.bw;
            if (tpopt.bh < tpopt.bw) tpopt.bw = tpopt.bh;
            if (tpopt.bw < tpopt.bh) tpopt.bh = tpopt.bw;
            if (tpopt.bh > 1) {
                tpopt.bw = 1;
                tpopt.bh = 1
            }
            if (tpopt.bw > 1) {
                tpopt.bw = 1;
                tpopt.bh = 1
            }
            tpopt.height = Math.round(tpopt.startheight * (tpopt.width / tpopt.startwidth));
            if (tpopt.height > tpopt.startheight && tpopt.autoHeight != "on") tpopt.height = tpopt.startheight;
            if (tpopt.fullScreen == "on") {
                tpopt.height = tpopt.bw * tpopt.startheight;
                var cow = tpopt.container.parent().width();
                var coh = jQuery(window).height();
                if (tpopt.fullScreenOffsetContainer != undefined) {
                    try {
                        var offcontainers = tpopt.fullScreenOffsetContainer.split(",");
                        jQuery.each(offcontainers, function(e, t) {
                            coh = coh - jQuery(t).outerHeight(true);
                            if (coh < tpopt.minFullScreenHeight) coh = tpopt.minFullScreenHeight
                        })
                    } catch (e) {}
                }
                tpopt.container.parent().height(coh);
                tpopt.container.height(coh);
                tpopt.container.closest(".rev_slider_wrapper").height(coh);
                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(coh);
                tpopt.container.css({
                    height: "100%"
                });
                tpopt.height = coh;
            } else {
                tpopt.container.height(tpopt.height);
                tpopt.container.closest(".rev_slider_wrapper").height(tpopt.height);
                tpopt.container.closest(".forcefullwidth_wrapper_tp_banner").find(".tp-fullwidth-forcer").height(tpopt.height);
            }
        };

        /* CALL PLACEHOLDER */
        setREVStartSize();


        var tpj = jQuery;
        tpj.noConflict();
        var revapi2;

        tpj(document).ready(function() {

            if (tpj('#rev-slider').revolution == undefined) {
                revslider_showDoubleJqueryError('#rev-slider');
            } else {
                revapi2 = tpj('#rev-slider').show().revolution({
                    dottedOverlay: "none",
                    delay: 7000,
                    startwidth: 1170,
                    startheight: 350,
                    hideThumbs: 200,

                    thumbWidth: 100,
                    thumbHeight: 50,
                    thumbAmount: 2,


                    simplifyAll: "off",

                    navigationType: "none",
                    navigationArrows: "none",
                    navigationStyle: "round-old",

                    touchenabled: "on",
                    onHoverStop: "off",
                    nextSlideOnWindowFocus: "off",

                    swipe_threshold: 75,
                    swipe_min_touches: 1,
                    drag_block_vertical: false,



                    keyboardNavigation: "off",

                    navigationHAlign: "center",
                    navigationVAlign: "bottom",
                    navigationHOffset: 0,
                    navigationVOffset: 20,

                    soloArrowLeftHalign: "left",
                    soloArrowLeftValign: "center",
                    soloArrowLeftHOffset: 20,
                    soloArrowLeftVOffset: 0,

                    soloArrowRightHalign: "right",
                    soloArrowRightValign: "center",
                    soloArrowRightHOffset: 20,
                    soloArrowRightVOffset: 0,

                    shadow: 0,
                    fullWidth: "off",
                    fullScreen: "on",

                    spinner: "spinner0",

                    stopLoop: "off",
                    stopAfterLoops: -1,
                    stopAtSlide: -1,

                    shuffle: "off",


                    forceFullWidth: "on",
                    fullScreenAlignForce: "off",
                    minFullScreenHeight: "",

                    hideThumbsOnMobile: "off",
                    hideNavDelayOnMobile: 1500,
                    hideBulletsOnMobile: "off",
                    hideArrowsOnMobile: "off",
                    hideThumbsUnderResolution: 0,

                    fullScreenOffsetContainer: "",
                    fullScreenOffset: "",
                    hideSliderAtLimit: 0,
                    hideCaptionAtLimit: 0,
                    hideAllCaptionAtLilmit: 0,
                    startWithSlide: 0
                });
            }
        }); /*ready*/

    </script>
    <script>
        (function($) {
            $(window).on("load", function() {
                $(".customScroll").mCustomScrollbar({
                    scrollbarPosition: "inside",
                    setHeight: true,
                });
            });
        })(jQuery);

    </script>
@endpush
