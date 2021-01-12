@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-12">
            <section class="panel">
                <header class="panel-heading">
                    THương hiệu sản phẩm
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
                        <form role="form" action="{{URL::to('/insert-brand')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tên thương hiệu</label>
                                <input type="text" name ="brand_name" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Mô tả thương hiêu</label>
                                <textarea rows="8" style="resize: none" class="form-control" name="brand_desc" id="exampleInputPassword1" placeholder="Password"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputFile">Hiển thi</label>
                                <select class="form-control input-sm m-bot15" name="brand_status">
                                    <option value="0">Ẩn</option>
                                    <option value="1">Hiển thị</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-info">Thêm thương hiệu</button>
                        </form>
                    </div>
                </div>
            </section>
        </div>
    </div>
@endsection
