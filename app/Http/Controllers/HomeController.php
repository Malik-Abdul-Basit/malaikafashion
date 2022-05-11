<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->where('status', 'a')->orderBy('position', 'asc')->get();
        $products = DB::table('products')->where('status','=','a')->where('special_offer','=','n')->orderBy('id', 'desc')->limit(16)->get();
        $special_products = DB::table('products')->where('status','=','a')->where('special_offer','=','y')->orderBy('id', 'desc')->limit(16)->get();
        $params = array('title'=>'HOME','page'=>'HOME','categories'=>$categories,'products'=>$products,'special_products'=>$special_products);
        return view('public.home',$params);
    }
}
