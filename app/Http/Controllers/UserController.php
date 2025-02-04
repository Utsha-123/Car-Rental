<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function welcome(){
        return view('welcome');
    }

    function aboutus(){
        return view('aboutus');
    }

    function deals(){
        $products = Product::all();
        return view('deals',compact('products'));
    }
    

    function chooseus(){
        return view('chooseus');
    }
    
    function testimonials(){
        return view('testimonials');
    }
    

}
