<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Http\Requests\ProductEditRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // products views for admin
    public function index(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        //$products = DB::table('products')->get();
        $products = Product::all();
        $params = array('title'=>'all_products','page'=>'all_products','PageType'=>'view','products'=>$products);
        return view('admin.all_products',$params);
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    //Add product form
    public function add_product_form(){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        //$category = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get();
        $categories = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get()->pluck('heading','id');
        $params = array('title'=>'product_form','page'=>'product_form','PageType'=>'form','categories'=>$categories);
        return view('admin.form_product',$params);
    }

    //Add product method
    public function add_product_method(ProductRequest $request){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }

        if($request->sale=='y'){ $sale='y'; }
        else{ $sale='n'; }

        if($request->special_offer=='y'){ $special_offer='y'; }
        else{ $special_offer='n'; }

        if($request->price_display=='d'){ $price_display='d'; }
        else{ $price_display='h'; }

        $product = new Product([
            'category_id'=>$request->category_id,
            'heading'=>$request->heading,
            'actule_price'=>$request->actule_price,
            'sale_price'=>$request->sale_price,
            'star_rating'=>$request->star_rating,
            'description'=>$request->description,
            'sale'=>$sale,
            'special_offer'=>$special_offer,
            'price_display'=>$price_display,
            'status'=>'a',
        ]);
        $product->save();

        return redirect()->route('products')->with(['error'=>'Record successfully added.','alert_class'=>'success']);
    }

    //Update product status
    public function product_update($id, $status){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product = Product::find($id);
        if(empty($product)){
            return redirect()->route('products')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            $product->fill([
                'status'=>$status,
            ]);
            $product->save();
            return redirect()->route('products')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    // View a single product
    public function view_product($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $category = Category_portfolio::find($id);
        if(empty($category)){
            return redirect()->route('categories')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        //dd($category);
    }

    // Edit product form
    public function edit_product_form($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product = Product::find($id);
        if(empty($product)){
            return redirect()->route('products')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        //$category = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get();
        $categories = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get()->pluck('heading','id');
        $params = array('title'=>'edit_product_form','page'=>'edit_product_form','PageType'=>'form','product'=>$product,'categories'=>$categories);
        return view('admin.form_product',$params);
    }

    // Edit product method
    public function edit_product_method(ProductEditRequest $request, $id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product = Product::find($id);
        if(empty($product)){
            return redirect()->route('products')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            if($request->sale=='y'){ $sale='y'; }
            else{ $sale='n'; }

            if($request->special_offer=='y'){ $special_offer='y'; }
            else{ $special_offer='n'; }

            if($request->price_display=='d'){ $price_display='d'; }
            else{ $price_display='h'; }

            $product->fill([
                'category_id'=>$request->category_id,
                'heading'=>$request->heading,
                'actule_price'=>$request->actule_price,
                'sale_price'=>$request->sale_price,
                'star_rating'=>$request->star_rating,
                'description'=>htmlentities($request->description),
                'sale'=>$sale,
                'special_offer'=>$special_offer,
                'price_display'=>$price_display
            ]);
            $product->save();
            return redirect()->route('products')->with(['error'=>'Record successfully updated.','alert_class'=>'warning']);
        }
    }

    // Delete product
    public function dell_product($id){
        $admin_id = Session::get('logedin_admin_id');
        if(empty($admin_id) or $admin_id<1){
            return redirect()->route('login');
        }
        $product = Product::find($id);
        if(empty($product)){
            return redirect()->route('products')->with(['error'=>'Record not available.','alert_class'=>'danger']);
        }
        else{
            /*$image_name = $category->image;
            if(!empty($image_name)){
              if(file_exists('uploads/categories/'.$image_name)===true){
                unlink('uploads/categories/'.$image_name);
              }
            }*/
            $product->delete();
            return redirect()->route('products')->with(['error'=>'Record successfully deleted.','alert_class'=>'info']);
        }
    }


    // products views for User
    public function ui_products($id){
        //$products = DB::table('products')->get();
        $category = DB::table('categories')->where('id', '=', $id)->where('status', 'a')->orderBy('position', 'asc')->limit(1)->first();
        if($category!=NULL){
            $products = DB::table('products')
                ->where('category_id','=',$id)
                ->where('status','=','a')
                ->where('special_offer','=','n')
                ->orderBy('id','desc')->get();
            $special_products = DB::table('products')
                ->where('category_id','=',$id)
                ->where('status','=','a')
                ->where('special_offer','=','y')
                ->orderBy('id','desc')->get();
            $params = array('title'=>'PRODUCTS','page'=>'PRODUCTS','category'=>$category,'products'=>$products,'special_products'=>$special_products);
            return view('public.products',$params);
        }
        else{
            return redirect()->route('HOME');
        }
    }

    // products views for User
    public function ui_product_detail($id){
        $product = DB::table('products')
            ->where('id','=',$id)
            ->where('status','=','a')
            ->orderBy('id','desc')
            ->limit(1)->first();
        if($product!=NULL){
            $category_id=$product->category_id;
            $category = DB::table('categories')
                ->where('id','=',$category_id)
                ->where('status','=','a')
                ->orderBy('position', 'desc')
                ->limit(1)->first();
            if($category!=NULL){
                $m_img = DB::table('product_images')
                    ->where('product_id','=',$id)
                    ->where('set_main','=','1')
                    ->where('status','=','a')
                    ->orderBy('id','asc')
                    ->limit(1)->first();
                $all_img = DB::table('product_images')
                    ->where('product_id','=',$id)
                    ->where('set_main','=','0')
                    ->where('status','=','a')
                    ->orderBy('id','asc')
                    ->limit(4)->get();
                $params = array('title'=>'PRODUCT DETAIL','page'=>'PRODUCTS','category'=>$category,'product'=>$product,'m_img'=>$m_img,'all_img'=>$all_img);
                return view('public.product_detail',$params);
            }
            else{
                return redirect()->route('HOME');
            }
        }
        else{
            return redirect()->route('HOME');
        }
    }

}
