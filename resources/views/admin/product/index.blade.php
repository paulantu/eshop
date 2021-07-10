@extends('admin.base')
@section('title', 'Product')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Product Table</h4>
                                <a href="{{ route('admin.product.add') }}" type="button" class="btn btn-primary">Add Product</a>
                            </div>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>Category</th>
                                        <th>Title</th>
                                        <th>SKU</th>
                                        <th>Size</th>
                                        <th>QTY</th>
                                        <th>Selling Price</th>
                                        <th>Discount Price</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($products as $row)
                                        <tr class="tb-image">
                                            <td>{{ $row->Product->Category->name }}</td>
                                            <td>{{ $row->Product->title }}</td>
                                            <td>{{ $row->sku }}</td>
                                            <td>{{ $row->size }}</td>
                                            <td>{{ $row->qty }}</td>
                                            <td>{{ $row->Product->selling_price }}</td>
                                            <td>{{ $row->Product->discount }}</td>
                                            @php
                                                $image = json_decode($row->Product->images);
                                            @endphp
                                            <td><img src="{{ asset($image[0]) }}" alt="brand logo"></td>
                                            <td>
                                                @if ($row->Product->status == 1)
                                                    <span class="badge badge-primary">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif

                                            </td>
                                            <td>
                                                <a class="dropdown-toggle btn btn-sm btn-primary" data-toggle="dropdown" id="editDropdown" title="Edit">
                                                    <i class="ti-marker-alt">
                                                    </i>
                                                </a>
                                                <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                                                     aria-labelledby="editDropdown">
                                                    <a class="dropdown-item"
                                                       href="{{ url('admin/product/edit/'.$row->product->id) }}">
                                                        <i class="ti-marker-alt text-primary"></i>
                                                        Edit Product
                                                    </a>
                                                    <a class="dropdown-item"
                                                       href="{{ url('admin/product/edit/'.$row->product->id) }}">
                                                        <i class="ti-marker-alt text-primary"></i>
                                                        Edit Attribute
                                                    </a>
                                                </div>
                                                <a href="{{url ('admin/product/trash/' . $row->Product->id.'/'.$row->id)}}" type="button" title="Trash" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                                                <a href="{{url ('admin/product/view/' . $row->Product->id)}}" type="button" title="View" class="btn btn-sm btn-success"><i class="ti-eye"></i></a>
                                                @if($row->Product->status == 1)
                                                    <a href="{{url ('admin/product/inactive/' . $row->Product->id)}}" type="button" title="Change status" class="btn btn-sm btn-info"><i class="ti-face-sad"></i></a>
                                                @else
                                                    <a href="{{url ('admin/product/active/' . $row->Product->id)}}" type="button" title="Change status" class="btn btn-sm btn-warning"><i class="ti-face-smile"></i></a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{ $products->links() }}

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
