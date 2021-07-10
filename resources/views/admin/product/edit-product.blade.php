@extends('admin.base')
@section('title', 'Product > Edit')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Product edit form</h4>
                                <br><br>
                                <form action="{{ url('admin/product/update/' . $products->id) }}" method="POST" id="productForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="cat_id">Category</label>
                                                <select name="cat_id" id="cat_id" class="form-control" aria-describedby="cat_id" required>
                                                    <option value="{{ $products->cat_id }}">{{ $products->Category->name }}</option>
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
                                                    <option value="{{ $products->subcat_id }}">{{ $products->Subcategory->name }}</option>
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
                                                    <option value="@if($products->brand_id == true){{ $products->brand_id }}@else @endif">@if($products->brand == true){{ $products->Brand->name }}@else @endif</option>
                                                    @if($brands == true)
                                                            @foreach ($brands as $row)
                                                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                                                            @endforeach
                                                        @else
                                                    @endif
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
                                                <input type="text" class="form-control" name="title" id="title" value="{{ $products->title }}"
                                                       required aria-describedby="title" placeholder="Enter product title">

                                                @error('title')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="p_code">SKU</label>
                                                <input type="text" class="form-control" name="p_code" id="p_code" value="{{ $products->p_code }}"
                                                       required aria-describedby="p_code" placeholder="Enter product code">

                                                @error('p_code')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="selling_price">Selling Price</label>
                                                <input type="text" class="form-control" name="selling_price" id="selling_price" value="{{ $products->selling_price }}"
                                                       required aria-describedby="selling_price" placeholder="Enter product size">

                                                @error('selling_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="buying_price">Buying Price</label>
                                                <input type="text" class="form-control" name="buying_price" id="buying_price" value="{{ $products->buying_price }}"
                                                       required aria-describedby="buying_price" placeholder="Enter product buying price.">

                                                @error('buying_price')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="discount">Discount</label>
                                                <input type="text" class="form-control" name="discount" id="discount"
                                                       value="{{ $products->discount }}" aria-describedby="discount" placeholder="Enter discount price">

                                                @error('discount')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label for="description">Description</label>
                                                <textarea type="text" class="form-control" name="description"
                                                          id="description" value="{{ $products->description }}" aria-describedby="description"
                                                          placeholder="Enter description">{{ $products->description }}</textarea>

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
                                                <div class="upimg">
                                                    <img src="{{ asset($products->thumbnail)}}" alt="thumbnail" srcset="">
                                                </div>

                                                @error('thumbnail')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
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
                                    <button type="submit" class="btn btn-success" id="btnSaveIt">Update</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
