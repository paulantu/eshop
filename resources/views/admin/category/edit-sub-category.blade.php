@extends('admin.base')
@section('title', 'Sub Category edit')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-4 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Sub Category edit form</h4>

                                <form action="{{ url('admin/subcategory/update/'. $subcategories->id) }}" method="POST" id="subCatForm">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-group">
                                        <label for="cat_name">Category</label>
                                        <select name="cat_name" id="cat_name" class="form-control" required aria-describedby="cat_name">
                                            <option value="{{ $subcategories->category_id }}">{{ $subcategories->category->name }}</option>

                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                        </select>

                                        @error('cat_name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="name">Sub Category</label>
                                        <input type="text" class="form-control" name="name"
                                               id="name" required aria-describedby="name" value="{{ $subcategories->name }}"
                                               placeholder="Enter category">

                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
