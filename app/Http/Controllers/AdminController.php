<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
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
    public function index(){
       return view('admin_login');
    }
    public function showdashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function check(Request $request){
        $admin_email = $request->email;
        $admin_password = $request->password;
        $result = DB::table('tb_admins')->where('admin_email','=',$admin_email)->where('admin_password','=',$admin_password)->first();
        if($result){
            Session::put('admin_name',$result->admin_name);
            Session::put('admin_id',$result->admin_id);
            return Redirect::to('/admin/dashboard');
        }else{
            Session::put('message','Lỗi đăng nhập');
            return Redirect::to('/admin');
        }
    }
    public function logout(){
            $this->AuthLogin();
            Session::put('admin_name',null);
            Session::put('admin_id',null);
            return Redirect::to('/admin');
    }
}
