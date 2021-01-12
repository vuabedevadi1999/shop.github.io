@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Thêm sản phẩm mới
                </header>
                <div class="panel-body">
                    <?php
                    $message = \Illuminate\Support\Facades\Session::get('message');
                    if($message){
                        echo "<script type='text/javascript'>alert('$message');</script>";
                        \Illuminate\Support\Facades\Session::put('message',null);
                    }
                    ?>
                    <div class="position-center">
                        <form role="form" action="{{URL::to('/update-product/'.$products->product_id)}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" value="{{$products->product_name}}" name ="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Loại sản phẩm</label>
                                <select class="form-control input-sm m-bot15" name="category_product_name">
                                    @foreach($categories as $category)
                                        @if($category->category_id==$products->category_id)
                                            <option value="{{$category->category_id}}" selected="selected">{{$category->category_name}}</option>
                                        @else
                                            <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="number" value="{{$products->product_price}}" name ="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                <input type="file" name ="product_image" class="form-control" >
                                <img src="{{asset('uploads/product/'.$products->product_image)}}" height="100px">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea rows="5" style="resize: none" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Password">
                                    {{$products->product_desc}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu</label>
                                <select class="form-control input-sm m-bot15" name="product_brand_name">
                                    @foreach($brands as $brand)
                                        @if($brand->brand_id==$products->brand_id)
                                            <option value="{{$brand->brand_id}}" selected="selected">{{$brand->brand_name}}</option>
                                        @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                        @endif
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea rows="8" style="resize: none" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Password">
                                    {{$products->product_content}}
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thi</label>
                                <select class="form-control input-sm m-bot15" name="product_status">
                                    @if($products->product_status==1)
                                        <option value="0">Ẩn</option>
                                        <option value="1" selected="selected">Hiển thị</option>
                                    @else
                                        <option value="0" selected="selected">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Cập nhật sản phẩm</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
