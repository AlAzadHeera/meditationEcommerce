<div class="sidebar" data-color="purple" data-background-color="white" data-image="{{ asset('Backend/img/sidebar-1.jpg') }}">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item {{Request::is('admin/home*')? 'active': ''}} ">
                <a class="nav-link" href="{{route('home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/video*')? 'active': ''}}">
                <a class="nav-link" href="{{ route('video.index') }}">
                    <i class="material-icons">person</i>
                    <p>Videos</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/audio*')? 'active': ''}}">
                <a class="nav-link" href="{{ route('audio.index') }}">
                    <i class="material-icons">content_paste</i>
                    <p>Audios</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/product*')? 'active': ''}}">
                <a class="nav-link" href="{{ route('product.index') }}">
                    <i class="material-icons">library_books</i>
                    <p>Products</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/order*')? 'active': ''}}">
                <a class="nav-link" href="{{ route('order') }}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Orders</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/schedule*')? 'active': ''}}">
                <a class="nav-link" href="{{ route('adminSchedule') }}">
                    <i class="material-icons">date_range</i>
                    <p>Schedules</p>
                </a>
            </li>
            <li class="nav-item {{Request::is('admin/schedule*')? 'active': ''}}">
                <a class="nav-link" href="{{ route('adminSchedule') }}">
                    <i class="material-icons">date_range</i>
                    <p>Blog</p>
                </a>
            </li>
        </ul>
    </div>
</div>
