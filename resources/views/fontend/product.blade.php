@foreach($products as $product)
    <div class="col-lg-4 col-md-6">
        <div class="product__item">
            @php
                $image = json_decode($product->images);
                $thumbnail = $image[0];
            @endphp
            <div class="product__item__pic set-bg" data-setbg="{{ asset($thumbnail) }}">
                <div class="label new">New</div>
                <ul class="product__hover">
                    <li><a href="{{ asset($thumbnail) }}" class="image-popup"><span class="arrow_expand"></span></a></li>
                    <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                    <li><a href="#"><span class="icon_bag_alt"></span></a></li>
                </ul>
            </div>
            <div class="product__item__text">
                <h6><a href="{{ url('shop/'.$product->Category->slug.'/'.$product->p_code.'/'.$product->slug) }}" title="{{ $product->title }}">{{ $product->title }}</a></h6>
                <div class="rating">
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                    <i class="fa fa-star"></i>
                </div>
                <div class="product__price">tk {{ $product->selling_price }}</div>
            </div>
        </div>
    </div>
@endforeach

