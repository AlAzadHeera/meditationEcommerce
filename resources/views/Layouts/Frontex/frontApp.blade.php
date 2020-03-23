<!doctype html>
<html lang="en-US">

<!-- Mirrored from tk-themes.net/html-yogi/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Nov 2019 12:16:22 GMT -->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0" />
    <title>@yield('title','')</title>

    <link rel='stylesheet' href='{{ asset('Frontend/css/settings.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('Frontend/css/main.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('Frontend/css/shop.css') }}' type='text/css' media='all' />
    <link rel='stylesheet' href='{{ asset('Frontend/css/font-awesome.min.css') }}' type='text/css' media='all' />
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Quicksand:300,400,700' rel='stylesheet' type='text/css'>
    <link rel='stylesheet' href='http://fonts.googleapis.com/css?family=PT+Sans:100,300,400,500,600,700,900,100italic,300italic,400italic,500italic,600italic,700italic,900italic' type='text/css' media='all' />

    <link rel='stylesheet' href='{{ asset('Frontend/css/style-selector.css') }}' type='text/css' media='all' />
    <link id="style-main-color" rel="stylesheet" href="{{ asset('Frontend/css/colors/default.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/audioplayer.css') }}" />
    <link rel="stylesheet" href="{{ asset('Frontend/css/myStyle.css') }}">
    <link rel="stylesheet" href="{{ asset('Frontend/css/jquery.mCustomScrollbar.min.css') }}">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @stack('css')
</head>



    @yield('content')

    @include('Layouts.Partials.Frontend.footer')

</div>
<!-- End Site Wrapper -->

<a href="#" class="go-to-top"><i class="fa fa-angle-up"></i></a>

<script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery.js') }}'></script>
<script type="text/javascript" src='{{ asset('Frontend/js/libs/jquery.cookie.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery-migrate.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery.themepunch.tools.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery.themepunch.revolution.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/modernizr-2.7.1.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery.touchSwipe.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/bootstrap.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/hoverIntent-r7.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/superfish-1.7.4.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/imagesloaded.pkgd.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/isotope-2.0.0.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/isotope-2.0.0.min.js') }}'></script>
<script type='text/javascript' src='{{ asset('Frontend/js/libs/jquery.carouFredSel-6.2.1.js') }}'></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
@if ($errors->any())
    @foreach ($errors->all() as $error)
        <script>
            toastr.error('{{ $error }}');
        </script>
    @endforeach
@endif

@if(Session::has('successMessage'))
    <script>
        toastr.success("{{ Session::get('successMessage') }}");
    </script>
@endif

@if(Session::has('message'))
    <script>
        toastr.error("{{ Session::get('message') }}");
    </script>
@endif

{!! Toastr::message() !!}


<script src="{{ asset('Frontend/js/audioplayer.js') }}"></script>
<script src="{{ asset('Frontend/js/jquery.mCustomScrollbar.concat.min.js') }}"></script>
@stack('scripts')
<script type='text/javascript' src='{{ asset('Frontend/js/main.js') }}'></script>
</body>

<!-- Mirrored from tk-themes.net/html-yogi/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 08 Nov 2019 12:17:41 GMT -->

</html>
