<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        $params = array('title'=>'ABOUT US','page'=>'ABOUT US');
        return view('public.about_us',$params);
    }
}
