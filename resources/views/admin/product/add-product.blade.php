@extends('admin.base')
@section('title', 'Product > Add')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Product add form</h4>
                                <br><br>
                                <form action="{{ url('admin/product/store') }}" method="POST" id="productForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="cat_id">Category</label>
                                                <select name="cat_id" id="cat_id" class="form-control" aria-describedby="cat_id" required>
                                                    <option value="">choose category</option>
                                                    @foreach ($categories as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>
                                                @error('cat_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="subcat_id">Sub Category</label>
                                                <select name="subcat_id" id="subcat_id" class="form-control">

                                                </select>
                                                @error('subcat_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">

                                            <div class="form-group">
                                                <label for="brand_id">Brand</label>
                                                <select name="brand_id" id="brand_id" class="form-control" aria-describedby="brand_id" >
                                                    <option value="">choose brand</option>
                                                    @foreach ($brands as $row)
                                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                    @endforeach
                                                </select>

                                                @error('brand_id')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">

                                            <div class="form-group">
                                                <label for="title">Product Title</label>
                                                <input type="text" class="form-control" name="title" id="title" value=""
                                                       required aria-describedby="title" placeholder="Enter product title">

                                                @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="p_code">SKU</label>
                                                <input type="text" class="form-control" name="p_code" id="sku" value=""
                                                       required aria-describedby="p_code" placeholder="Enter product code">

                                                @error('p_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="selling_price">Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" id="selling_price"
                                                       value="" required aria-describedby="selling_price"
                                                       placeholder="Enter selling price">

                                                @error('selling_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="buying_price">Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" id="buying_price"
                                                       value="" required aria-describedby="buying_price"
                                                       placeholder="Enter selling price">

                                                @error('buying_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input type="text" class="form-control" name="discount" id="discount"
                                                       value="" aria-describedby="discount" placeholder="Enter discount price">

                                                @error('discount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" name="description"
                                                          id="description" value="" aria-describedby="description"
                                                          placeholder="Enter description"></textarea>

                                                @error('description')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="thumbnail">Thumbnail</label>
                                                <input type="file" name="thumbnail" id="thumbnail"
                                                       class="file-upload-default">
                                                <div class="input-group col-xs-12">
                                                    <input type="text" class="form-control file-upload-info" disabled
                                                           placeholder="Upload thumbnail">
                                                    <span class="input-group-append">
                                                        <button class="file-upload-browse btn btn-primary"
                                                                type="button">Choose thumbnail</button>
                                                    </span>
                                                </div>

                                                @error('thumbnail')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="thumbnail_preview" id="thumbnail_preview">

                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="images"> Image</label>
                                                <input type="file" name="images[]" id="images" class="form-control" multiple="multiple">
                                            </div>
                                                @error('images')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                                <div class="image_preview" id="image_preview">
                                                </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-check form-check-primary">
                                                    <label class="form-check-label">
                                                        <input type="checkbox" class="form-check-input" name="status" value="1">
                                                        status
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn btn-success" id="btnSaveIt">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
