@extends('admin.base')
@section('title', 'Product')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-5">
                                    <img src="{{ asset($ProductDetails->thumbnail) }}" alt="Product thumbnail here.">
                                    <ul>
                                        @foreach(json_decode($ProductDetails->images, true) as $image)
                                            <li class="proimgview"><img src="{{ asset('Image/product/'.$image) }}" alt="Product image here."></li>
                                        @endforeach
                                    </ul>

                                </div>
                                <div class="col-7">
                                    <h2 style="color: #1b69c0">{{ $ProductDetails->title }}</h2>
                                    <p>{{ $ProductDetails->description }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
