<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class BrandController extends Controller
{
    //
    public function add_brand(){
        return view('admin.add_brand');
    }
    public function insert_brand(Request $request){
        $data=array();
        $data['brand_name']=$request->brand_name;
        $data['brand_desc']=$request->brand_desc;
        $data['brand_status']=$request->brand_status;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('brands')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return Redirect::to('/add-brand');
    }
    public function all_brand(){
        $brands = DB::table('brands')->get();
//        return view('admin.all_brand')->with('brands',$brands);
        return response()->json($brands);
    }
    public function delete_brand($brand_id){
        DB::table('brands')->where('brand_id',$brand_id)->delete();
        return Redirect::to('all-brand');
    }
}
