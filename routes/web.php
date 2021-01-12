<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//front-end
Route::get('/','HomeController@index');
Route::get('/trang-chu', 'HomeController@index');
Route::get('/thuong-hieu-san-pham/{brand_id}', 'CategoryProductController@findByBrandID');
Route::get('/danh-muc-san-pham/{category_id}', 'CategoryProductController@findByCategoryID');
//detail-product
Route::get('/chi-tiet-san-pham/{product_id}', 'ProductController@ShowDetailProduct');
//back-end
Route::get('/admin','AdminController@index')->name('admin');
Route::get('/logout','AdminController@logout')->name('logout');
Route::get('/admin/dashboard','AdminController@showdashboard')->name('/admin/dashboard');
Route::post('/admin_login','AdminController@check')->name('admin_login');
//brand
Route::get('/add-brand','BrandController@add_brand');
Route::get('/all-brand','BrandController@all_brand');
Route::post('/insert-brand','BrandController@insert_brand');
Route::get('/delete-brand/{brand_id}','BrandController@delete_brand');
//admin-categorry
Route::get('/add-category-product','CategoryProductController@add_category_product');
Route::get('/all-category-product','CategoryProductController@all_category_product');
Route::post('/insert-category-product','CategoryProductController@insert_category_product');
Route::get('/edit-category-product/{category_id}','CategoryProductController@edit_category_product');
Route::get('/delete-category-product/{category_id}','CategoryProductController@delete_category_product');
Route::post('/update-category-product/{category_id}','CategoryProductController@update_category_product');

//admin-product
Route::get('/add-product','ProductController@add_product');
Route::get('/all-product','ProductController@all_product');
Route::post('/insert-product','ProductController@insert_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
//cart
Route::post('/save-cart','CartController@save_cart');


