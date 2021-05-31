@extends('admin.base')
@section('title', 'Product > Attribures')
@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-lg-5 col-xl-5 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <div class="add">
                                <h4 class="card-title">Add Product attributes</h4>
                                <br><br>
                                <div class="show_product_data" id="show_product_data">
                                    <div class="row">
                                        <div class="col-6">
                                            <label>Product Title :</label><span style="color: #0ba1b5">{{$products->title}}</span><br>
                                            <label>Product Code :</label><span style="color: #0ba1b5">{{$products->p_code}}</span><br>
                                            <label>Product Category :</label><span style="color: #0ba1b5">{{$products->Category->name}}</span><br>
                                            <label>Product Selling Price :</label><span style="color: #0ba1b5">{{$products->selling_price}}</span><br>
                                            <label>Product Buying Price :</label><span style="color: #0ba1b5">{{$products->buying_price}}</span><br>
                                        </div>
                                        <div class="col-6">
                                            <span><img src="{{asset($products->images)}}" style="height: 100px; width: 100px"></span>
                                        </div>
                                    </div>
                                </div>
                                <br><br>
                                <form action="{{ url('admin/product/attributes/update/'.$products->id.'/'.urlencode(http_build_query($attributes->id))) }}" method="POST" id="productForm"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <table id="table_field">
                                        <thead class="">
                                        <tr class="row">
                                            <th class="col-4">Size</th>
                                            <th class="col-4">quantity</th>
                                            <th class="col-4">Add or Remove</th>
                                        </tr>
                                        </thead>
                                        <tbody class="protarow" >
                                        @foreach($attributes as $attribute)
                                        <tr id="tb_row" class="row" style="margin-bottom: 10px;">
                                            <td class="col-4">
                                                {{$attribute->id}}
                                                <input type="text" class="form-control" name="size[]" id="size" value="{{ $attribute->size }}" required aria-describedby="selling_price"
                                                       placeholder="Enter product size">
                                                @error('size')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </td>

                                            <td class="col-4">
                                                <input type="text" class="form-control" name="qty[]" id="qty" value="{{$attribute->qty}}" required aria-describedby="selling_price"
                                                       placeholder="Enter product size">
                                                @error('qty')
                                                <div class="alert alert-danger">{{ $message }}</div>
                                                @enderror
                                            </td>
                                            <td class="col-4">
                                                <button name="remove" id="remove" class="btn btn-danger ti-trash" style="margin-left: 7px;float: right;"></button>
                                                <button name="add" id="add" class="btn btn-success ti-plus"></button>
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success" id="btnSaveIt">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript">
            $(document).ready(function(){

                var add_row = ' <tr id="tb_row" class="row" style="margin-bottom: 10px;"><td class="col-4"><input type="text" class="form-control" name="size[]" id="size" value="" required aria-describedby="selling_price"\n' +
                    '                                                           placeholder="Enter product size"></td><td class="col-4"><input type="text" class="form-control" name="qty[]" id="qty" value="" required aria-describedby="selling_price"\n' +
                    '                                                           placeholder="Enter product size"></td><td class="col-4"><input type="button" value="remove" name="remove" id="remove" class="btn btn-danger"></td>\n' +
                    '                                            </tr>';

                var x = 1;

                $("#add").click(function(){
                    if(x <= 10){
                        $("#table_field").append(add_row);
                        x++;
                    }
                });
                $("#table_field").on('click','#remove',function(){
                    $(this).closest('tr').remove();
                    x--;
                });
            });

        </script>
@endsection
