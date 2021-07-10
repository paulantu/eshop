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
                <div class="tip" id="tip"></div>
            </a></li>
    </ul>
    @php
        $siteLogo = \App\Models\LogoHistory::latest('updated_at')->firstWhere('status', 1);
    @endphp
    <div class="offcanvas__logo">
        <a href="{{ url('/')}}">@if($siteLogo == true)<img src="{{asset($siteLogo->logo)}}" alt="">@else
                <i class="brand-logo">aPaul</i>@endif</a>
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
                    <a href="{{ url('/')}}">@if($siteLogo == true)<img src="{{asset($siteLogo->logo)}}" alt="">@else
                            <i class="brand-logo">aPaul</i>@endif</a>
                </div>
            </div>
            <div class="col-xl-6 col-lg-7">
                <nav class="header__menu">
                    <ul>
                        <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="{{ url('/')}}">Home</a></li>
                        <li><a href="{{ url('/shop') }}">Shop</a></li>
                        <li><a href="{{ url('/blog') }}">Blog</a></li>
                        <li><a href="{{ url('/about') }}">About us</a></li>
                        <li><a href="{{ url('/contact-us') }}">Contact us</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-lg-3">
                <div class="header__right">
                    <div class="header__right__auth">

                        @if(Route::has('login'))
                            @auth
                                @if (Auth::user()->user_type === 'admin' || 's_admin')
                                    {{-- for admin --}}
                                    <li class="current_user_name"><a title="My Account" href="#">My Account ({{ Auth::user()->name }})</a>
                                        <ul class="user_menu_dropdown">
                                            <li><a title="Dashboard" href="#">Dashboard</a></li>
                                            <li><a title="Profile" href="{{ url ('profile') }}">Profile</a></li>
                                            <li><a title="Profile" href="{{ url ('/my-cart') }}">My Cart</a></li>
                                            <li><a title="Logout" href="{{ url ('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                                    Out</a></li>
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
                                            <li><a title="My Cart" href="{{ url ('/my-cart') }}">My Cart</a></li>
                                            <li><a title="Logout" href="{{ url ('logout') }}"
                                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log
                                                    Out</a></li>
                                            <form action="{{ url ('logout') }}" method="POST" id="logout-form">
                                                @csrf
                                            </form>
                                        </ul>
                                    </li>
                                @endif
                            @else
                                <a title="login" href="{{ route('login') }}">Login</a>
                                <a title="register" href="{{ route('register') }}">Register</a>

                            @endauth
                        @endif
                    </div>
                    <ul class="header__right__widget">
                        <li><span class="icon_search search-switch"></span></li>
                        <li><a href="/my-wishlist"><span class="icon_heart_alt"></span>
                                <div class="tip" id="wishItem"></div>
                            </a></li>

                        <li class="mini-cart-dropdown" id="mini-cart-dropdown">
                            <a class="miniCart-dropBtn" id="miniCart-dropBtn"><span class="icon_bag_alt"></span>
                                <div class="tip" id="tip"></div>
                            </a>

                                <div class="cart-dropdown-content" id="cart-dropdown-content">
                                    <div class="miniCartDrop" id="miniCartDrop">

                                    </div>
                                    <div class="sub-total-area"><span class="sub-total">Sub Total : tk </span><span
                                            class="sub-total-price" id="totalPrice">1400</span></div>
                                    <div class="product-checkout"><a href="" class="text-center" type="button">Checkout</a>
                                    </div>
                                </div>


                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <div class="canvas__open">
            <i class="fa fa-bars"></i>
        </div>
    </div>
</header>
<script type="text/javascript">
    // cart list dropdown start
    $(document).ready(function () {
        $('#miniCart-dropBtn').click(function () {
            $('#cart-dropdown-content').toggleClass('active')
        })
    })

    // cart list dropdown end


    //Show Wish List Data Start

    function wishData() {
        $.ajax({
            type : "GET",
            datatype: "json",
            url : "/wishlist/product",
            success:function (data) {
                $('div[id="wishItem"]').text(data.wishItem)

            }
        })
    }
    wishData();



    //Show Wish List Data End



    // add to cart button start

    function addToCart(id) {
        var product_id = id;
        var title = $('#title').text();
        var qty = $('#qty').val();
        var size = $('#size option:selected').text();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });

        $.ajax({
            type : "POST",
            dataType : "json",
            data :{
                title:title,
                size:size,
                qty:qty
            },
            url : "/cart/product/store/"+product_id,
            success:function(data){
                addMiniCart()
                if ($.isEmptyObject(data.error)){
                    swal({
                        title: "Good job!",
                        text: data.success,
                        icon: "success",
                        button: "Ok",
                        timer:3000,
                    });
                }else {
                    swal({
                        title: "Process failed!",
                        text: data.error,
                        icon: "error",
                        button: "Ok",
                        timer:3000,
                    });
                }
            }
        })
    }
    // add to cart button end

    // product mini cart dropdown using ajax

    function addMiniCart() {
        $.ajax({
            type : "GET",
            datatype: "json",
            url : "/cart/mini/product",
            success:function (data) {
                $('div[id="tip"]').text(data.cartQuantity)
                $('span[id="totalPrice"]').text(data.cartTotal)

                var miniCartDrop = ""

                $.each(data.carts, function (key, value) {
                    miniCartDrop += `<div class="cart_drop_product">
                                            <div class="row">
                                                <div class="col-xl-3">
                                                    <img src="/${value.options.image}" alt="" style="width: 100%;">
                                                </div>
                                                <div class="col-xl-7 text-center pro-title">
                                                    ${value.name}<br/>
                                                    <span>${value.price} * ${value.qty} tk</span>
                                                </div>
                                                <div class="col-xl-2">
                                                    <a id="${value.rowId}" onclick="removeFromCart(this.id)" class="" type="" title=""><i class="icon_trash"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>`
                });
                $('#miniCartDrop').html(miniCartDrop);
            }
        })
    }
    addMiniCart();



    // remove from cart area

    function removeFromCart(rowId) {
        $.ajax({
            type : "GET",
            url : "/cart/remove/"+rowId,
            datatype: "json",
            success:function (data) {
                addMiniCart()
                if ($.isEmptyObject(data.error)){
                    swal({
                        title: "Good job!",
                        text: data.success,
                        icon: "success",
                        button: "Ok",
                        timer:3000,
                    });
                }else {
                    swal({
                        title: "Process failed!",
                        text: data.error,
                        icon: "error",
                        button: "Ok",
                        timer:3000,
                    });
                }
            }
        })
    }


</script>
