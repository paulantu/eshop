@extends('fontend.base')

@section('body_content')

    <!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                    <span>Shopping cart</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            @foreach($WishData as $WishListData)
            <div class="col-lg-12">
                <div class="shop__cart__table">
                    <div class="row">
                        <div class="col-8">
                            <div class="cart__product__item">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="{{ asset($WishListData->thumbnail) }}" alt="" class="embed-responsive" style="height: 100px; width: 100px;">
                                    </div>
                                    <div class="col-8">
                                        <div class="cart__product__item__title">
                                            <h6>{{ $WishListData->title }}</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <span class="wishlistreview">(136 Reviews)</span>
                                            </div>
                                            <div class="individuallistprice">
                                                @if($WishListData->discount == true)
                                                    @if($WishListData->discount != 0 || NULL)
                                                    tk {{ $WishListData->selling_price - ($WishListData->selling_price * ($WishListData->discount /100)) }}
                                                        @else<span>tk {{ $WishListData->selling_price }}</span>
                                                    @endif
                                                        <span style="text-decoration: line-through">tk {{ $WishListData->selling_price }}</span>
                                                @else
                                                    tk {{ $WishListData->selling_price }}
                                                @endif
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
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->
@endsection
