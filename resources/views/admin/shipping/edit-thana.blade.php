@extends('admin.base')
@section('title', 'Shipping Thana >> Edit')
@section('content')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-4 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Shipping Division edit</h4>


                                <form action="{{ url('admin/shipping/thana/update/'.$thanaEdit->id) }}" method="POST" id="shipDivForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="divisionName">Division Name</label>
                                        <select class="form-control" name="divisionName" id="divisionName" required aria-describedby="divisionName">
                                            <option value="">{{ $thanaEdit->Divisions->division_name }}</option>
                                            @foreach($divisions as $division)
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
                                            <option value="{{ $thanaEdit->district_id }}">{{ $thanaEdit->Districts->district_name }}</option>

                                        </select>

                                        @error('districtName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="thanaName">Thana Name</label>
                                        <input type="text" class="form-control" name="thanaName"
                                               id="thanaName" required aria-describedby="thanaName"
                                               placeholder="Enter Shipping Thana" value="{{ $thanaEdit->thana_name }}">

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
