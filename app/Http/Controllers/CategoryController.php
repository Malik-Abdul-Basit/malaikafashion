<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryEditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
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
        $category = DB::table('categories')->orderBy('position', 'asc')->get();
        $params = array('title'=>'all_categories','page'=>'all_categories','PageType'=>'view','categories'=>$category);
        return view('admin.all_categories',$params);
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    //Add category form
    public function add_category_form(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $params = array('title'=>'category_form','page'=>'category_form','PageType'=>'form');
        return view('admin.form_category',$params);
    }

    //Add category method
    public function add_category_method(CategoryRequest $request){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = new Category([
            'heading'=>$request->heading,
            'position'=>$request->position,
            'status'=>'a',
        ]);
        $imagearr = $request->file('image');
        if(!empty($imagearr)){
            $txt_data_img = $request->base64ImgName;
            list($type, $txt_data_img) = explode(';', $txt_data_img);
            list(, $txt_data_img)      = explode(',', $txt_data_img);
            $data = base64_decode($txt_data_img);

            $imagearr = $request->file('image');
            $image_name = md5(date('Y:m:d:H:i:s').$imagearr->getClientOriginalName()).'.'.$imagearr->getClientOriginalExtension();
            file_put_contents('uploads/categories/'.$image_name, $data);
            $category->fill([
                'image'=>$image_name,
            ]);
        }
        else{
            $category->fill([
                'image'=>'',
            ]);
        }
        $category->save();

        return redirect()->route('categories')->with(['error'=>'Record successfully added.','alert_class'=>'success']);
    }

    // View a single category
    public function view_category($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = Category::find($id);
        if(empty($category)){
            return redirect()->route('categories')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        //dd($category);
    }

    //Update category status
    public function category_update($id, $status){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = Category::find($id);
        if(empty($category)){
            return redirect()->route('categories')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $category->fill([
                'status'=>$status,
            ]);
            $category->save();
            return redirect()->route('categories')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    // Edit category form
    public function edit_category_form($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = Category::find($id);
        if(empty($category)){
            return redirect()->route('categories')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        $params = array('title'=>'edit_category_form','page'=>'edit_category_form','PageType'=>'form','category'=>$category);
        return view('admin.form_category',$params);
    }

    // Edit category method
    public function edit_category_method(CategoryEditRequest $request, $id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = Category::find($id);
        if(empty($category)){
            return redirect()->route('categories')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $category->fill([
                'heading'=>$request->heading,
                'position'=>$request->position,
                'status'=>'a',
            ]);

            $imagearr = $request->file('image');
            if(!empty($imagearr)){
                $txt_data_img = $request->base64ImgName;
                list($type, $txt_data_img) = explode(';', $txt_data_img);
                list(, $txt_data_img)      = explode(',', $txt_data_img);
                $data = base64_decode($txt_data_img);

                $image_name = md5(date('Y:m:d:H:i:s').$imagearr->getClientOriginalName()).'.'.$imagearr->getClientOriginalExtension();
                file_put_contents('uploads/categories/'.$image_name, $data);
                if($category->image!=NULL){
                    if(file_exists('uploads/categories/'.$category->image)===true){
                        unlink('uploads/categories/'.$category->image);
                    }
                }
                $category->fill([
                    'image'=>$image_name,
                ]);
            }
            $category->save();
            return redirect()->route('categories')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    // Delete category
    public function dell_category($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = Category::find($id);
        if(empty($category)){
            return redirect()->route('categories')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $image_name = $category->image;
            if(!empty($image_name)){
                if(file_exists('uploads/categories/'.$image_name)===true){
                    unlink('uploads/categories/'.$image_name);
                }
            }
            $category->delete();
            return redirect()->route('categories')->with(['error'=>'Record successfully deleted.','alert_class'=>'info']);
        }
    }

}
