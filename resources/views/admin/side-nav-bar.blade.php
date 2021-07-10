<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link" href="{{url ('/admin/dashboard')}}">
                <i class="icon-grid menu-icon"></i>
                <span class="menu-title">Dashboard</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                <i class="ti-star menu-icon"></i>
                <span class="menu-title">Category</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.category')}}">Category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.subcategory')}}">Sub category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.brand')}}">Brand</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#form-elements" aria-expanded="false" aria-controls="form-elements">
                <i class="ti-tag menu-icon"></i>
                <span class="menu-title">Product</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="form-elements">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.product')}}">All Product</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.product.add')}}">Add Product</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#charts" aria-expanded="false" aria-controls="charts">
                <i class="ti-shopping-cart menu-icon"></i>
                <span class="menu-title">Order</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="charts">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">New order</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Accept Payment</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Order Cancell</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/charts/chartjs.html">Delivery success</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
                <i class="ti-user menu-icon"></i>
                <span class="menu-title">User role</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="tables">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">Create user</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/tables/basic-table.html">All user</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#icons" aria-expanded="false" aria-controls="icons">
                <i class="ti-align-center menu-icon"></i>
                <span class="menu-title">Blog</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="icons">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Blog category</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">Add post</a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/icons/mdi.html">post list</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#shipping_area" aria-expanded="false" aria-controls="icons">
                <i class="ti-shopping-cart-full menu-icon"></i>
                <span class="menu-title">Shiping Srea</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="shipping_area">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/shipping/division') }}">Division</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/shipping/district') }}">District</a></li>
                    <li class="nav-item"> <a class="nav-link" href="{{ url('admin/shipping/thana') }}">Thana</a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#auth" aria-expanded="false" aria-controls="auth">
                <i class="ti-truck menu-icon"></i>
                <span class="menu-title">Return Order</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="auth">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/login.html"> Return request </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/register.html"> all request </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#error" aria-expanded="false" aria-controls="error">
                <i class="ti-info menu-icon"></i>
                <span class="menu-title">Others</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="error">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"> <a class="nav-link" href="{{ route('admin.newsletter')}}"> Newsletters </a></li>
                    <li class="nav-item"> <a class="nav-link" href="pages/samples/error-500.html"> SEO setting </a></li>
                </ul>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.coupon')}}">
                <i class="ti-ticket menu-icon"></i>
                <span class="menu-title">Coupon</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="ti-server menu-icon"></i>
                <span class="menu-title">Product Stock</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="ti-money menu-icon"></i>
                <span class="menu-title">Payment</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="pages/documentation/documentation.html">
                <i class="icon-paper menu-icon"></i>
                <span class="menu-title">Review</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#siteSetting" aria-expanded="false" aria-controls="form-elements">
                <i class="ti-settings menu-icon"></i>
                <span class="menu-title">Site setting</span>
                <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="siteSetting">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{ route('admin.mystore.logo')}}">Logo setup</a></li>
                </ul>
            </div>
        </li>
    </ul>
</nav>
