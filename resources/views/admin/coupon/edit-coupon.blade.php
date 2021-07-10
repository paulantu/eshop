@extends('admin.base')
@section('title', 'Brand edit')
@section('content')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-4 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Brand edit form</h4>

                                <form action="{{ url('admin/coupon/update/'. $coupon->id) }}" method="POST" id="subCatForm"  enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="couponName">Coupon Name</label>
                                        <input type="text" class="form-control" name="couponName"
                                               id="couponName" required aria-describedby="couponName"
                                               placeholder="Enter Coupon Name" value="{{ $coupon->coupon_name }}">

                                        @error('couponName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="couponDiscount">Coupon Discount (%)</label>
                                        <input type="text" class="form-control" name="couponDiscount"
                                               id="couponDiscount" required aria-describedby="couponDiscount"
                                               placeholder="Enter Coupon Discount"  value="{{ $coupon->coupon_discount }}">

                                        @error('couponDiscount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="couponValidity">Coupon Validation</label>
                                        <input type="date" class="form-control" name="couponValidity"
                                               id="couponValidity" required aria-describedby="couponValidity"
                                               placeholder="Enter Coupon Discount" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}"  value="{{ $coupon->coupon_validity }}">

                                        @error('couponValidity')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="couponBanner">Coupon Banner</label>
                                        <input type="file" name="couponBanner" id="couponBanner" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Choose Banner</button>
                                                          </span>
                                        </div>

                                        @error('couponBanner')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="brand-logo">
                                        <img src="{{asset($coupon->coupon_banner)}}" alt="image not found" srcset="" style="height: 80px; width:200px">
                                    </div>

                                    <div class="form-group">
                                        <div class="form-check form-check-primary">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="status" value="1">
                                                status
                                            </label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-success"  id="btnSaveIt">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
