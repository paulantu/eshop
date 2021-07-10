@extends('admin.base')
@section('title', 'Shipping >> Thana')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Thana Table</h4>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#categoryModel">Add Thana</button>

                                <!-- Modal -->
                                <div class="modal fade" id="categoryModel" tabindex="-1" role="dialog"
                                     aria-labelledby="categoryModelTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="categoryModelTitle">Add Thana</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">

                                                <form action="{{ route('admin.shipping.thana.store') }}" method="POST" id="shipDivForm">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="divisionName">Division Name</label>
                                                        <select class="form-control" name="divisionName" id="divisionName" required aria-describedby="divisionName">
                                                            <option value="">Select Division</option>
                                                            @foreach($shippingDivision as $division)
                                                                <option value="{{ $division->id }}">{{ $division->division_name }}</option>
                                                            @endforeach
                                                        </select>

                                                        @error('divisionName')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="districtName">District Name</label>
                                                        <select class="form-control" name="districtName" id="districtName" required aria-describedby="districtName">


                                                        </select>

                                                        @error('districtName')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="thanaName">Thana Name</label>
                                                        <input type="text" class="form-control" name="thanaName"
                                                               id="thanaName" required aria-describedby="thanaName"
                                                               placeholder="Enter Shipping Thana">

                                                        @error('thanaName')
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
                                        <th>Division</th>
                                        <th>District</th>
                                        <th>Thana</th>
                                        <th>Created by</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($shippingThana as $thana)
                                        <tr class="tb-image">
                                            <td>{{ $shippingThana->firstItem()+$loop->index }}</td>
                                            <td>{{ $thana->Divisions->division_name }}</td>
                                            <td>{{ $thana->Districts->district_name }}</td>
                                            <td>{{ $thana->thana_name }}</td>
                                            <td>{{ $thana->user->name }}</td>
                                            <td>{{ $thana->created_at->diffForHumans() }}</td>
                                            <td>
                                                @if ($thana->status == 1)
                                                    <span class="badge badge-primary">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{url('admin/shipping/thana/edit/'.$thana->id)}}" type="button" title="Edit" class="btn btn-sm btn-warning"><i class="ti-marker-alt"></i></a>


                                                <a href="{{url ('admin/shipping/thana/delete/'.$thana->id)}}" type="button" title="Destroy" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                                                @if($thana->status == 1)
                                                    <a href="{{url ('admin/shipping/thana/inactive/' . $thana->id)}}" type="button" title="Change status" class="btn btn-sm btn-info"><i class="ti-face-sad"></i></a>
                                                @else
                                                    <a href="{{url ('admin/shipping/thana/active/' . $thana->id)}}" type="button" title="Change status" class="btn btn-sm btn-warning"><i class="ti-face-smile"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $shippingThana->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>







@endsection
