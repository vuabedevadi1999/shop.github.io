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
                        <form role="form" action="{{URL::to('/insert-product')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên sản phẩm</label>
                                <input type="text" name ="product_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Loại sản phẩm</label>
                                <select class="form-control input-sm m-bot15" name="category_product_name">
                                    @foreach($categories as $category)
                                        <option value="{{$category->category_id}}">{{$category->category_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Giá sản phẩm</label>
                                <input type="number" name ="product_price" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Hình ảnh sản phẩm</label>
                                <input type="file"  name ="product_image" class="form-control" >
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                <textarea rows="5" style="resize: none" class="form-control" name="product_desc" id="exampleInputPassword1" placeholder="Password"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Thương hiệu</label>
                                <select class="form-control input-sm m-bot15" name="product_brand_name">
                                    @foreach($brands as $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                <textarea rows="8" style="resize: none" class="form-control" name="product_content" id="exampleInputPassword1" placeholder="Password"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thi</label>
                                <select class="form-control input-sm m-bot15" name="product_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm sản phẩm</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
