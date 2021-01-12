<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use function Illuminate\Support\Facades\Response;

class CategoryProductController extends Controller
{
    //START-BE-ADMIN
    public function AuthLogin(){
        $admin_id = Session::get('admin_id');
        if($admin_id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }
    public function add_category_product(){
        $this->AuthLogin();
        return view('admin.add_category_product');
    }
    public function all_category_product(){
        $this->AuthLogin();
        $categories = Category::paginate(10);
        return view('admin.all_category_product',['categories' => $categories]);
    }
    public function insert_category_product(Request $request){
        $this->AuthLogin();
        $categories = new Category();
        $categories->category_name = $request->category_product_name;
        $categories->category_desc = $request->category_roduct_des;
        $categories->category_status = $request->category_status;
        $categories->save();
        Session::put('message','Them thanh cong');
        return Redirect::to('/add-category-product');
    }
    public function edit_category_product($category_id){
        $this->AuthLogin();
        $categories = DB::table('categories')->where('category_id',$category_id)->first();
        return view('admin.edit_category_product')->with('categories',$categories);
    }
    public function update_category_product(Request $request,$category_id){
        $this->AuthLogin();
        DB::table('categories')
                ->where('category_id', $category_id)
                ->update([
                    'category_name' => $request->category_product_name,
                    'category_desc'=> $request->category_roduct_des,
                    'category_status' => $request->category_status
                ]);
        Session::put('message','Cap nhat thanh cong danh muc co id la:'.$category_id);
        return Redirect::to('/all-category-product');
    }
    public function delete_category_product($category_id){
        $this->AuthLogin();
        DB::table('categories')->where('category_id',$category_id)->delete();
        Session::put('message','Xóa danh mục sản phẩm');
        return Redirect::to('/all-category-product');
    }
    //END-BE-ADMIN
    //tìm sản phẩm theo danh mục
    public function findByCategoryID($category_id){
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        $productByCateIDs = DB::table('products')->join('categories','products.category_id','=','categories.category_id')
            ->where('products.category_id',$category_id)->get();
        $category_name =  DB::table('products')->join('categories','products.category_id','=','categories.category_id')
            ->where('products.category_id',$category_id)->first();
        return view('pages.category.productByCTID')->with('categories',$categories)
            ->with('brands',$brands)->with('productByCateIDs',$productByCateIDs)->with('category_name',$category_name);
    }
    //tìm sản phẩm theo thương hiệu
    //bản chất là để ở BrandController.Tạm thời để ở đây(Chuyển sau)
    public function findByBrandID($brand_id){
        $categories = DB::table('categories')->where('category_status',1)->get();
        $brands = DB::table('brands')->where('brand_status',1)->get();
        $productByBrandIDs = DB::table('products')->join('brands','products.brand_id','=','brands.brand_id')
            ->where('products.brand_id',$brand_id)->get();
        $brand_name = DB::table('products')->join('brands','products.brand_id','=','brands.brand_id')
            ->where('products.brand_id',$brand_id)->first();
        return view('pages.brand.productByBrandID')->with('categories',$categories)
            ->with('brands',$brands)->with('productByBrandIDs',$productByBrandIDs)->with('brand_name',$brand_name);;
    }
}
