@extends('admin.base')
@section('title', 'Newsletter')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Newsletter Table</h4>

                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#newsletterModel">Add Newsletter</button>

                                <!-- Modal -->
                                <div class="modal fade" id="newsletterModel" tabindex="-1" role="dialog"
                                     aria-labelledby="newsletterModelTitle" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="newsletterModelTitle">Add Newsletter</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <form action="{{ route('admin.newsletter.store') }}" method="POST" id="newsletterForm">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="name">Name</label>
                                                        <input type="text" class="form-control" name="name"
                                                               id="name" required aria-describedby="name"
                                                               placeholder="john doe">

                                                        @error('name')
                                                        <div class="alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="email">E-mail</label>
                                                        <input type="text" class="form-control" name="email"
                                                               id="email" required aria-describedby="email"
                                                               placeholder="johndoe@yourdomain.com">

                                                        @error('email')
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
                                        <th>Name</th>
                                        <th>E-mail/Contact</th>
                                        <th>Created at</th>
                                        <th>Status</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($newsletters as $row)
                                        <tr>
                                            <td>{{ $newsletters->firstItem()+$loop->index }}</td>
                                            <td>@if($row->name == true){{ $row->name }}@else <p>Unidentifined</p>@endif</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->created_at->diffForHumans() }}</td>
                                            <td>
                                                <a href="{{url('admin/newsletter/edit/' . $row->id)}}" type="button" title="Edit" class="btn btn-sm btn-warning"><i class="ti-marker-alt"></i></a>

                                                <a href="{{url ('admin/newsletter/delete/' . $row->id)}}" type="button" title="Trash" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $newsletters->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
