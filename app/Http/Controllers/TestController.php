<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index(){
 // $value = session()->all();
    // echo "<pre>";
    // print_r($value);
    // echo "</pre>";

    // return view('welcome');
    $value = session('name');
    echo $value;
    }

    public function StoreSession(){
        session(['name' => 'Rental']);
        // another process
        // session()->put("class","Rent");

        return redirect('/');
    }

    public function DeleteSession(){
        session()->forget('name');
    }
}
