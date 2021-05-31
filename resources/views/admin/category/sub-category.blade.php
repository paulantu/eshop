@extends('admin.base')
@section('title', 'Category > Sub Category')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Sub Category Table</h4>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#categoryModel">Add Sub Category</button>

                                <!-- Modal -->
                                <div class="modal fade" id="categoryModel" tabindex="-1" role="dialog"
                                     aria-labelledby="categoryModelTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="categoryModelTitle">Add New Sub Category</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('admin.subcategory.store') }}" method="POST" id="subCatForm">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="cat_name">Category</label>
                                                        <select name="cat_name" id="cat_name" class="form-control" required aria-describedby="cat_name">
                                                            <option value="">select category</option>

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
                                                               id="name" required aria-describedby="name"
                                                               placeholder="Enter category">

                                                        @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
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
                                        <th>Category</th>
                                        <th>Sub Category</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($subcategories as $row)
                                        <tr>

                                            <td>{{ $subcategories->firstItem()+$loop->index }}</td>
                                            <td>{{ $row->category->name }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{url('admin/subcategory/edit/' . $row->id)}}" type="button" title="Edit" class="btn btn-warning"><i class="ti-marker-alt"></i></a>

                                                <a href="{{url ('admin/subcategory/trash/' . $row->id)}}" type="button" title="Trash" class="btn btn-danger"><i class="ti-share"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $subcategories->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add trash-table">
                                <h4 class="card-title">Trash Sub Category Table</h4><br><br>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sub Category</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>deleted at</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                        $i = 1;
                                    @endphp
                                    @foreach ($trashes as $row)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->created_at }}</td>
                                            <td>{{ $row->deleted_at }}</td>
                                            <td>
                                                <a href="{{url('admin/subcategory/restore/' . $row->id)}}" type="button" title="Restore" class="btn btn-warning"><i class="ti-share-alt"></i></a>

                                                <a href="{{url ('admin/subcategory/destroy/' . $row->id)}}" type="button" title="Delete" class="btn btn-danger"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
