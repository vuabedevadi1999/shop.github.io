<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
Session::start();
class ProductController extends Controller
{
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        return view('admin.add_product')->with('categories',$categories)->with('brands',$brands);
    }
    public function all_product(){
        $this->AuthLogin();
       $products = DB::table('products')->get();
       return view('admin.all_product')->with('products',$products);
       // return response()->json($products);
    }
    public function insert_product(Request $request){
        $this->AuthLogin();
        $product = array();
        $product['product_name']= $request->product_name;
        $product['category_id']= $request->category_product_name;
        $product['brand_id']= $request->product_brand_name;
        $product['product_price']= $request->product_price;
        $product['product_desc']= $request->product_desc;
        $product['product_content']= $request->product_content;
        $product['product_status']= $request->product_status;
        $product['created_at']= date('Y-m-d H:i:s');
        $product['updated_at']= date('Y-m-d H:i:s');
        $image = $request->file('product_image');
        if($image){
            $get_img_name = $image->getClientOriginalName();
            $exp_img_name = current(explode('.',$get_img_name));
            $new_img_name = $exp_img_name.rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/product',$new_img_name);
            $product['product_image'] = $new_img_name;
            DB::table('products')->insert($product);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect::to('add-product');

        }
        $product['product_image'] ='';
        DB::table('products')->insert($product);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect::to('add-product');
    }
    public function edit_product($product_id){
        $this->AuthLogin();
        $products = DB::table('products')->where('product_id',$product_id)->first();
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        return view('admin.edit_product')->with('products',$products)->with('categories',$categories)
            ->with('brands',$brands);
    }
    public function update_product(Request $request,$product_id){
        $this->AuthLogin();
        $product = array();
        $product['product_name']= $request->product_name;
        $product['category_id']= $request->category_product_name;
        $product['brand_id']= $request->product_brand_name;
        $product['product_price']= $request->product_price;
        $product['product_desc']= $request->product_desc;
        $product['product_content']= $request->product_content;
        $product['product_status']= $request->product_status;
        $product['created_at']= date('Y-m-d H:i:s');
        $product['updated_at']= date('Y-m-d H:i:s');
        $image = $request->file('product_image');
        if($image){
            $get_img_name = $image->getClientOriginalName();
            $exp_img_name = current(explode('.',$get_img_name));
            $new_img_name = $exp_img_name.rand(0,1000).'.'.$image->getClientOriginalExtension();
            $image->move('uploads/product',$new_img_name);
            $product['product_image'] = $new_img_name;
            DB::table('products')->where('product_id',$product_id)->update($product);
            Session::put('message','Cập nhật sản phẩm thành công');
            return Redirect::to('all-product');

        }
        DB::table('products')->where('product_id',$product_id)->update($product);
        Session::put('message','Cập nhật sản phẩm thành công');
        return Redirect::to('all-product');
    }
    public function delete_product($product_id){
        $this->AuthLogin();
        DB::table('products')->where('product_id',$product_id)->delete();
        return Redirect::to('all-product');
    }
    //show detail product
    public function ShowDetailProduct($product_id){
        $category_id  = DB::table('products')->where('product_id',$product_id)->first();
//        $brand_id  = DB::table('products')->where('product_id',$product_id)->first();
        $product = DB::table('products')->join('categories','categories.category_id','=','products.category_id')
            ->join('brands','brands.brand_id','=','products.brand_id')
            ->where('product_id',$product_id)->first();
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        $recommended_products  = DB::table('products')
            ->join('categories','categories.category_id','=','products.category_id')
            ->join('brands','brands.brand_id','=','products.brand_id')
            ->where('products.category_id',$category_id->category_id)
            ->where('products.product_id','!=',$product_id)
            ->get();
        return view('pages.product.product_detail')->with('categories',$categories)
            ->with('brands',$brands)->with('product',$product)
            ->with('recommended_products',$recommended_products);
    }

}
