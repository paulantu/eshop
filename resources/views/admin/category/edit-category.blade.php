@extends('admin.base')
@section('title', 'Category edit')
@section('content')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-4 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Category edit form</h4>

                                <form action="{{ url('admin/category/update/'. $categories->id) }}" method="POST" id="CatForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="categoryName">Category Name</label>
                                        <input type="text" class="form-control" name="name" id="categoryName" value="{{ $categories->name}}" required
                                               aria-describedby="categoryName" placeholder="Enter category">

                                        @error('categoryName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
