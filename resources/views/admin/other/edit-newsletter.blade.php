@extends('admin.base')
@section('title', 'Newsletter > edit')
@section('content')


    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-4 col-xl-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Newsletter edit form</h4>

                                <form action="{{ url('admin/newsletter/update/'. $newsletter->id) }}" method="POST" id="newsletterForm">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" value="{{ $newsletter->name}}"
                                               aria-describedby="name" placeholder="Enter category">

                                        @error('categoryName')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="email">E-mail</label>
                                        <input type="text" class="form-control" name="email" value="{{ $newsletter->email }}"
                                               id="email" required aria-describedby="email"
                                               placeholder="johndoe@yourdomain.com">

                                        @error('email')
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
