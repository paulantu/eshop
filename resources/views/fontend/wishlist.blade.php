@extends('fontend.base')

@section('body_content')

    <!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="{{url('/')}}"><i class="fa fa-home"></i> Home</a>
                    <span>My Wishlist</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row" id="">
            <div id="wishProduct">

            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->




    <script type="text/javascript">

        function wishProducts() {
            $.ajax({
                type : "GET",
                datatype: "json",
                url : "/wishlist/product/show",
                success:function (data) {
                    var wishListProducts = ""

                    $.each(data, function (key, value) {
                        wishListProducts += `<div class="col-lg-12">
                <div class="shop__cart__table">
                    <div class="row">
                        <div class="col-8">
                            <div class="cart__product__item">
                                <div class="row">
                                    <div class="col-4">
                        <img src="" alt="image" class="embed-responsive" style="height: 100px; width: 100px;">
                                    </div>
                                    <div class="col-8">
                                        <div class="cart__product__item__title">
                                            <h6> ${ value.title } </h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span class="wishlistreview">(136 Reviews)</span>
                                            </div>
                                            <div class="individuallistprice">tk
                       <span>tk </span>
                        <span style="text-decoration: line-through">tk </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-4">
        <div class="add-to-cart">
            <a href="#" class="btn btn-sm btn-primary" id="add-to-cart"><span class="icon_cart"></span></a>
            <button type="submit" id="${value.id}" onclick="removeWishlist(this.id)" class="btn btn-sm btn-danger cart__close"><span class="icon_close"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
    //                     wishListProducts = `<h2>${value.myData.title} </h2>`

                    });
                    $('#wishProduct').html(wishListProducts);
                }
            })
        }
        wishProducts();

    </script>


@endsection
