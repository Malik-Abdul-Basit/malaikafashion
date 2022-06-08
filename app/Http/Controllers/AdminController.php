<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function __construct(){
        //$admin_id = Session::get('logedin_admin_id');
        if(Session::get('logedin_admin_id') == NULL){
            //return redirect()->route('login');
        }
        else{
            //echo Session::get('logedin_admin_id');
        }
    }

    //Admin login form
    public function index(){
        $admin_id = Session::get('logedin_admin_id');
        if(!empty($admin_id) && $admin_id>0){
            return redirect()->route('dashboard');
        }
        return view('admin.login');
    }

    //Admin login method
    public function login(LoginRequest $request){
        $email = $request->email;
        $password = md5($request->password);
        $perm = array('email'=>$email,'password'=>$password,'type'=>'a','status'=>'a');
        $id = DB::table('users')->where($perm)->value('id');
        if(empty($id) or !is_numeric($id) or $id<1){
            return back()->with('error','Provide valid email and password');
        }
        else{
            Session::put('logedin_admin_id', $id);
            return redirect()->route('dashboard');
        }
    }

    //Admin dashboard
    public function dashboard(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $params = array('title'=>'dashboard','page'=>'dashboard','PageType'=>'dashboard');
        return view('admin.dashboard',$params);
    }

    //Admin logout method
    public function logout(){
        Session::forget('logedin_admin_id');
        Session::flush();
        return redirect()->route('login');
    }
}
