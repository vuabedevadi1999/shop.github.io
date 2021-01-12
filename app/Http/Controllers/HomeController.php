<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        $products = DB::table('products')->orderBy('created_at','desc')->limit(4)->get();
        return view('pages.home')->with('categories',$categories)->with('brands',$brands)->with('products',$products);
    }
}
