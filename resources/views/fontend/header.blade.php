<div id="preloder">
    <div class="loader"></div>
</div>

<!-- Offcanvas Menu Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="offcanvas-menu-wrapper">
    <div class="offcanvas__close">+</div>
    <ul class="offcanvas__widget">
        <li><span class="icon_search search-switch"></span></li>
        <li><a href="#"><span class="icon_heart_alt"></span>
                <div class="tip">2</div>
            </a></li>
        <li><a href="#"><span class="icon_bag_alt"></span>
                <div class="tip">2</div>
            </a></li>
    </ul>
    <div class="offcanvas__logo">
        <a href="{{ url('/')}}"><img src="{{asset('fontend/img/logo.png')}}" alt=""></a>
    </div>
    <div id="mobile-menu-wrap"></div>
    <div class="offcanvas__auth">
        <a href="{{route('login')}}">Login</a>
        <a href="{{route('register')}}">Register</a>
    </div>
</div>
<!-- Offcanvas Menu End -->

<!-- Header Section Begin -->
<header class="header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-3 col-lg-2">
                <div class="header__logo">
                    <a href="{{ url('/')}}"><img src="{{asset('fontend/img/logo.png')}}" alt=""></a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ url('/')}}">Home</a></li>
                        <li class="{{ (request()->is('/shop')) ? 'active' : '' }}"><a href="{{ url('/shop') }}">Shop</a></li>
                        <li class="{{ (request()->is('/blog')) ? 'active' : '' }}"><a href="{{ url('/blog') }}">Blog</a></li>
                        <li class="{{ (request()->is('/about')) ? 'active' : '' }}"><a href="{{ url('/about') }}">About us</a></li>
                        <li class="{{ (request()->is('/contact')) ? 'active' : '' }}"><a href="{{ url('/contact-us') }}">Contact us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">
                        @if(Route::has('login'))
                            @auth
                                @if (Auth::user()->status === 'user')
                                    {{-- for admin --}}
                                    <li><a title="My Account" href="#">My Account ({{ Auth::user()->name }})</a>
                                        <ul class="dropdown">
                                            <li><a title="Dashboard" href="#">Dashboard</a></li>
                                            <li><a title="Profile" href="{{ url ('profile') }}">Profile</a></li>
                                            <li><a title="Logout" href="{{ url ('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                                            <form action="{{ url ('logout') }}" method="POST" id="logout-form">
                                                @csrf
                                            </form>
                                        </ul>

                                    </li>
                                @else
                                    {{-- for user or customer --}}
                                    <li><a title="My Account" href="#">My Account ({{ Auth::user()->name }})</a>
                                        <ul class="dropdown">
                                            <li><a title="Profile" href="{{ url ('profile') }}">Profile</a></li>
                                            <li><a title="Logout" href="{{ url ('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                                            <form action="{{ url ('logout') }}" method="POST" id="logout-form">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endif

                            @else
                                <a title="login" href="{{ route('login') }}">Login</a>
                                <a title="register" href="{{ route('register') }}">Register</a>
                            @endif
                        @endif
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="/my-wishlist"><span class="icon_heart_alt"></span>
                                <div class="tip">{{ $wishdata }}</div>
                            </a></li>
                        <li><a href="#"><span class="icon_bag_alt"></span>
                                <div class="tip">2</div>
                            </a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
