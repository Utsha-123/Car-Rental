<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function welcome(){
        $products = Product::all();
        $categories = Category::all();
        return view('welcome',compact('products','categories'));
    }

    public function aboutus(){
        return view('aboutus');
    }

    public function deals(Request $request) {
        $categories = Category::all();
    
        // Check if a category is selected
        if ($request->has('category_id')) {
            $products = Product::where('category_id', $request->category_id)->get();
        } else {
            $products = Product::all();
        }
    
        return view('deals', compact('products', 'categories'));
    }
    
    

    public function chooseus(){
        return view('chooseus');
    }
    
    public function testimonials(){
        return view('testimonials');
    }
    

}
