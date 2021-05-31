<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.style')
</head>

<body>
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
@include('admin.nav-bar')
<!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
    @include('admin.to-do')
    <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
    @include('admin.side-nav-bar')
    <!-- partial -->
        <div class="main-panel">
            <div class="body-content-header">
                <div class="page-title">
                    <h3 class="">@yield('title')</h3>
                </div>
            </div>


        @yield('content')


        <!-- content-wrapper ends -->
            <!-- partial:partials/_footer.html -->
        @include('admin.footer')
        <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->


</div>
<!-- container-scroller -->

<!-- plugins:js -->
@include('admin.script')
<!-- End custom js for this page-->
</body>

</html>
