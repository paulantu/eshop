@extends('admin.base')
@section('title', 'Category > Brand')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Coupon Table</h4>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#categoryModel">Add Coupon</button>

                                <!-- Modal -->
                                <div class="modal fade" id="categoryModel" tabindex="-1" role="dialog"
                                     aria-labelledby="categoryModelTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="categoryModelTitle">Add New Coupon</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('admin.coupon.store') }}" method="POST" id="subCatForm" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="couponName">Coupon Name</label>
                                                        <input type="text" class="form-control" name="couponName"
                                                               id="couponName" required aria-describedby="couponName"
                                                               placeholder="Enter Coupon Name">

                                                        @error('couponName')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="couponDiscount">Coupon Discount (%)</label>
                                                        <input type="text" class="form-control" name="couponDiscount"
                                                               id="couponDiscount" required aria-describedby="couponDiscount"
                                                               placeholder="Enter Coupon Discount">

                                                        @error('couponDiscount')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="couponValidity">Coupon Validation</label>
                                                        <input type="date" class="form-control" name="couponValidity"
                                                               id="couponValidity" required aria-describedby="couponValidity"
                                                               placeholder="Enter Coupon Discount" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

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

                                                    <div class="form-group">
                                                        <div class="form-check form-check-primary">
                                                            <label class="form-check-label">
                                                                <input type="checkbox" class="form-check-input" name="status" value="1">
                                                                status
                                                            </label>
                                                        </div>
                                                    </div>

                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-success"
                                                                id="btnSaveIt">Save</button>
                                                        <button type="button" class="btn btn-danger" id="btnCloseIt"
                                                                data-dismiss="modal">Close</button>
                                                    </div>
                                                </form>


                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>

                                        <th>#</th>
                                        <th>Coupon name</th>
                                        <th>Discount</th>
                                        <th>Validation</th>
                                        <th>Banner</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Ststus</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shopCoupons as $coupon)
                                        <tr class="tb-image">
                                            <td></td>
                                            <td>{{ $coupon->coupon_name }}</td>
                                            <td>{{ $coupon->coupon_discount }} %</td>
                                            <td>{{ $coupon->coupon_validity }}</td>
                                            <td><img src="{{ asset($coupon->coupon_banner) }}" style="width: 400px; height: 100px;"></td>
                                            <td>{{ $coupon->created_by }}</td>
                                            <td>{{ $coupon->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($coupon->status == 1)
                                                    <span class="badge badge-primary">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('admin/coupon/edit/'.$coupon->id)}}" type="button" title="Edit" class="btn btn-sm btn-warning"><i class="ti-marker-alt"></i></a>

                                                <a href="{{url ('admin/coupon/destroy/'.$coupon->id)}}" type="button" title="Destroy" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                                                @if($coupon->status == 1)
                                                    <a href="{{url ('admin/product/inactive/' . $coupon->id)}}" type="button" title="Change status" class="btn btn-sm btn-info"><i class="ti-face-sad"></i></a>
                                                @else
                                                    <a href="{{url ('admin/product/active/' . $coupon->id)}}" type="button" title="Change status" class="btn btn-sm btn-warning"><i class="ti-face-smile"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                    {{ $shopCoupons->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
