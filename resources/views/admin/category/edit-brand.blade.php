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

                                <form action="{{ url('admin/brand/update/'. $brands->id) }}" method="POST" id="subCatForm"  enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Brand</label>
                                        <input type="text" class="form-control" name="name" value="{{ $brands->name}}" id="name" required aria-describedby="name" placeholder="Enter category">

                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="brand_logo">Brand logo</label>
                                        <input type="file" name="brand_logo" id="brand_logo" class="file-upload-default">
                                        <div class="input-group col-xs-12">
                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                            <span class="input-group-append">
                                            <button class="file-upload-browse btn btn-primary" type="button">Choose logo</button>
                                          </span>
                                        </div>

                                        @error('brand_logo')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="brand-logo">
                                        <img src="{{asset($brands->brand_logo)}}" alt="image not found" srcset="" style="height: 70px; width:70px">
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
