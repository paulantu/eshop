@extends('admin.base')
@section('title', 'Logo Setup')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Logo history</h4>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#categoryModel">Add new logo</button>

                                <!-- Modal -->
                                <div class="modal fade" id="categoryModel" tabindex="-1" role="dialog"
                                     aria-labelledby="categoryModelTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="categoryModelTitle">Add New logo</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form action="{{ route('admin.mystore.logo.store') }}" method="POST" id="logoSetupForm" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="store_logo">logo</label>
                                                        <input type="file" name="store_logo" id="store_logo" class="file-upload-default">
                                                        <div class="input-group col-xs-12">
                                                            <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                                            <span class="input-group-append">
                                                            <button class="file-upload-browse btn btn-primary" type="button">Choose logo</button>
                                                          </span>
                                                        </div>

                                                        @error('store_logo')
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
                                        <th>Logo</th>
                                        <th>Uploaded by</th>
                                        <th>Uploaded at</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($myLogos as $row)
                                        <tr>
                                            <td>{{ $myLogos->firstItem()+$loop->index }}</td>
                                            <td class="storeLogoView"><img src="{{ asset($row->logo) }}" alt="store logo"></td>
                                            <td>{{ $row->user->name }}</td>
                                            <td>{{ $row->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($row->status == 1)
                                                    <span class="badge badge-primary">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif

                                            </td>
                                            <td class="logo-table-body" >
                                                @if($row->status == 1)
                                                    <a href="{{url ('admin/mystore/logo/inactive/' . $row->id)}}" type="button" title="Change status" class="btn btn-sm btn-info"><i class="ti-face-sad"></i></a>
                                                @else
                                                    <a href="{{url ('admin/mystore/logo/active/' . $row->id)}}" type="button" title="Change status" class="btn btn-sm btn-warning"><i class="ti-face-smile"></i></a>
                                                @endif
                                                <a href="{{asset($row->logo)}}" type="button" title="View" class="btn btn-sm btn-success"><i class="ti-eye"></i></a>
                                                <a href="{{url ('admin/mystore/logo/delete/' . $row->id)}}" type="button" title="Trash" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $myLogos->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
