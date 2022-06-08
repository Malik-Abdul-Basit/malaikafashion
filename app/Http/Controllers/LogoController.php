<?php

namespace App\Http\Controllers;

use App\Models\Logo;
use Illuminate\Http\Request;
use App\Http\Requests\LogoRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $logo =  Logo::all();
        $params = array('title'=>'all_logos','page'=>'all_logos','PageType'=>'view','logos'=>$logo);
        return view('admin.all_logos', $params);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit(Logo $logo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Logo $logo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        //
    }

    public function add_logo_form(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $params = array('title'=>'add_logo_form','page'=>'add_logo_form','PageType'=>'form');
        return view('admin.form_logo', $params);
    }
    public function add_logo_method(LogoRequest $request){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $imagearr = $request->file('image');
        if(!empty($imagearr)){
            $image_name = md5(date('H:i:s').$imagearr->getClientOriginalName()).'.'.$imagearr->getClientOriginalExtension();
            $imagearr->move('uploads/logos', $image_name);
            DB::table('logos')->update(['status' => 'd']);
            $logo = new Logo([
                'image'=>$image_name,
                'status'=>'a',
            ]);
            $logo->save();
            return redirect()->route('logos')->with(['error'=>'Logo successfully uploaded.','alert_class'=>'success']);
        }
        else{
            return redirect()->route('add_logo');
        }
    }

    public function set_logo($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        DB::table('logos')->update(['status' => 'd']);
        DB::table('logos')->where('id', $id)->update(['status' => 'a']);
        return redirect()->route('logos')->with(['error'=>'Logo successfully set.','alert_class'=>'warning']);
    }
    public function dell_logo($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $logo = Logo::find($id);
        if(empty($logo)){
            return redirect()->route('logos')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        $image_name = $logo->image;
        if(!empty($image_name)){
            unlink('uploads/logos/'.$image_name);
        }
        $logo->delete();
        return redirect()->route('logos')->with(['error'=>'Record successfully deleted.','alert_class'=>'info']);
    }
}
