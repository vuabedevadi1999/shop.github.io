@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    Danh mục sản phẩm
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
                        <form role="form" action="{{URL::to('/update-category-product/'.$categories->category_id)}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên danh mục</label>
                                <input type="text" name ="category_product_name" class="form-control" id="exampleInputEmail1" value="{{$categories->category_name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả danh mục</label>
                                <textarea rows="8" style="resize: none" class="form-control" name="category_roduct_des" id="exampleInputPassword1" >{{$categories->category_desc}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thi</label>
                                <select class="form-control input-sm m-bot15" name="category_status">
                                    @if($categories->category_status===0)
                                        <option value="0" selected="selected">Ẩn</option>
                                        <option value="1">Hiển thị</option>
                                    @else
                                        <option value="0">Ẩn</option>
                                        <option value="1" selected="selected">Hiển thị</option>
                                    @endif
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Submit</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection

