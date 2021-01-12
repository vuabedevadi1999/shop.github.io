<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function save_cart(){
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        return view('pages.cart.cart')->with('categories',$categories)->with('brands',$brands);
    }
}
