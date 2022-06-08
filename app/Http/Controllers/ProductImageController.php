<?php

namespace App\Http\Controllers;

use App\Models\Product_image;
use Gumlet\ImageResize;
use Illuminate\Http\Request;
use App\Http\Requests\ProductImageRequest;
use App\Http\Requests\ProductImageEditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;


class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // Product image views for admin
    public function index(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }

        $product_images = Product_image::all();
        $params = array('title'=>'all_product_images','page'=>'all_product_images','PageType'=>'view','product_images'=>$product_images);
        return view('admin.all_product_images',$params);
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
     * @param  \App\Models\Product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function show(Product_image $product_image)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function edit(Product_image $product_image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product_image $product_image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product_image  $product_image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product_image $product_image)
    {
        //
    }


    //Add product image form
    public function add_product_image_form(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $categories = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get();
        $products = DB::table('products')->where('status', 'a')->orderBy('id', 'desc')->get()->pluck('heading','id');
        $params = array('title'=>'add_product_images','page'=>'add_product_images','PageType'=>'form','categories'=>$categories,'products'=>$products);
        return view('admin.form_product_image',$params);
    }

    //Add product image method
    public function add_product_image_method(ProductImageRequest $request){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }

        $imagearr = $request->file('image');
        if(!empty($imagearr)){

            if($request->set_main=='1'){
                $get_main = DB::table('product_images')->where('product_id','=',$request->product_id)->where('set_main','=','1')->get();
                if(!empty($get_main)){
                    DB::table('product_images')
                        ->where('product_id','=',$request->product_id)->where('set_main','=','1')
                        ->update(['set_main'=>'0']);
                }
                $set_main='1';
            }
            else{$set_main='0';}

            if($request->set_hover=='1'){
                $get_hover = DB::table('product_images')->where('product_id','=',$request->product_id)->where('set_hover','=','1')->get();
                if(!empty($get_hover)){
                    DB::table('product_images')
                        ->where('product_id','=',$request->product_id)->where('set_hover','=','1')
                        ->update(['set_hover'=>'0']);
                }
                $set_hover='1';
            }
            else{ $set_hover='0'; }

            $product_image = new Product_image([
                //'category_id'=>$request->category_id,
                'product_id'=>$request->product_id,
                'set_main'=>$set_main,
                'set_hover'=>$set_hover,
                'status'=>'a',
            ]);

            $txt_data_img = $request->base64ImgName;
            list($type, $txt_data_img) = explode(';', $txt_data_img);
            list(, $txt_data_img)      = explode(',', $txt_data_img);
            $data = base64_decode($txt_data_img);

            $imagearr = $request->file('image');
            $image_name = $genimage_name = md5(date('Y:m:d:H:i:s').$imagearr->getClientOriginalName()).'.'.$imagearr->getClientOriginalExtension();

            file_put_contents('uploads/products/'.$image_name, $data);
            $resize_image_ = new ImageResize('uploads/products/'.$genimage_name);
            $resize_image_->resizeToWidth(65);
            $resize_image_->save('uploads/products/thumbnails/'.$genimage_name);

            $product_image->fill([
                'image'=>$image_name,
            ]);
            $product_image->save();
            return redirect()->route('product_images')->with(['error'=>'Record successfully added.','alert_class'=>'success']);
        }
        else{
            return redirect()->route('product_images')->with(['error'=>'Image must be required.','alert_class'=>'danger']);
        }
    }

    //Update product image status
    public function productimage_update($id, $status){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product_image = Product_image::find($id);
        if(empty($product_image)){
            return redirect()->route('product_images')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $product_image->fill([
                'status'=>$status,
            ]);
            $product_image->save();
            return redirect()->route('product_images')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    //Set product image at main
    public function set_main($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product_image = Product_image::find($id);
        if(empty($product_image)){
            return redirect()->route('product_images')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            DB::table('product_images')
                ->where('id','!=',$id)->where('product_id','=',$product_image->product_id)->where('set_main','=','1')
                ->update(['set_main'=>'0']);

            $product_image->fill([
                'set_main'=>'1',
            ]);
            $product_image->save();
            return redirect()->route('product_images')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    //Set product image at hover
    public function set_hover($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product_image = Product_image::find($id);
        if(empty($product_image)){
            return redirect()->route('product_images')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            DB::table('product_images')
                ->where('id','!=',$id)->where('product_id','=',$product_image->product_id)->where('set_hover','=','1')
                ->update(['set_hover'=>'0']);

            $product_image->fill([
                'set_hover'=>'1',
            ]);
            $product_image->save();
            return redirect()->route('product_images')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    // Edit product image form
    public function edit_product_image_form($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product_image = Product_image::find($id);
        if(empty($product_image)){
            return redirect()->route('product_images')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        $categories = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get();
        $products = DB::table('products')->where('status', 'a')->orderBy('id', 'desc')->get()->pluck('heading','id');
        $params = array('title'=>'edit_product_image','page'=>'edit_product_image','PageType'=>'form','categories'=>$categories,'products'=>$products,'product_image'=>$product_image);
        return view('admin.form_product_image',$params);
    }

    // Edit product image method
    public function edit_product_image_method(ProductImageEditRequest $request, $id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product_image = Product_image::find($id);
        if(empty($product_image)){
            return redirect()->route('product_images')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $old_image_name = $product_image->image;

            if($request->set_main=='1'){
                $get_main=DB::table('product_images')->where('id','!=',$id)->where('product_id','=',$request->product_id)->where('set_main','=','1')->get();
                if(!empty($get_main)){
                    DB::table('product_images')
                        ->where('id','!=',$id)->where('product_id','=',$request->product_id)->where('set_main','=','1')
                        ->update(['set_main'=>'0']);
                }
                $set_main='1';
            }
            else{$set_main='0';}

            if($request->set_hover=='1'){
                $get_hover=DB::table('product_images')->where('id','!=',$id)->where('product_id','=',$request->product_id)->where('set_hover','=','1')->get();
                if(!empty($get_hover)){
                    DB::table('product_images')
                        ->where('id','!=',$id)->where('product_id','=',$request->product_id)->where('set_hover','=','1')
                        ->update(['set_hover'=>'0']);
                }
                $set_hover='1';
            }
            else{ $set_hover='0'; }

            $product_image->fill([
                'product_id'=>$request->product_id,
                'set_main'=>$set_main,
                'set_hover'=>$set_hover,
                'status'=>'a',
            ]);

            $imagearr = $request->file('image');
            if(!empty($imagearr)){
                /*if($product_image->image!=NULL){
                  if(file_exists('uploads/products/'.$product_image->image)===true){
                    unlink('uploads/products/'.$product_image->image);
                  }
                }*/
                if(!empty($old_image_name) && file_exists('uploads/products/'.$old_image_name)===true){
                    unlink('uploads/products/'.$old_image_name);
                }
                if(!empty($old_image_name) && file_exists('uploads/products/thumbnails/'.$old_image_name)===true){
                    unlink('uploads/products/thumbnails/'.$old_image_name);
                }

                $txt_data_img = $request->base64ImgName;
                list($type, $txt_data_img) = explode(';', $txt_data_img);
                list(, $txt_data_img)      = explode(',', $txt_data_img);
                $data = base64_decode($txt_data_img);

                $image_name = $genimage_name = md5(date('Y:m:d:H:i:s').$imagearr->getClientOriginalName()).'.'.$imagearr->getClientOriginalExtension();

                file_put_contents('uploads/products/'.$image_name, $data);
                $resize_image_ = new ImageResize('uploads/products/'.$genimage_name);
                $resize_image_->resizeToWidth(65);
                $resize_image_->save('uploads/products/thumbnails/'.$genimage_name);

                $product_image->fill([
                    'image'=>$image_name,
                ]);
            }

            $product_image->save();
            return redirect()->route('product_images')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    // Delete product image
    public function dell_product_image($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product_image = Product_image::find($id);
        if(empty($product_image)){
            return redirect()->route('product_images')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $image_name = $product_image->image;
            if(!empty($image_name) && file_exists('uploads/products/'.$image_name)===true){
                unlink('uploads/products/'.$image_name);
            }
            if(!empty($image_name) && file_exists('uploads/products/thumbnails/'.$image_name)===true){
                unlink('uploads/products/thumbnails/'.$image_name);
            }
            $product_image->delete();
            return redirect()->route('product_images')->with(['error'=>'Record successfully deleted.','alert_class'=>'info']);
        }
    }

}
