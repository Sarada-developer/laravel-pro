<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function index(){

      return view('frontend/index');
  }
  public function products(){

      return view('frontend/products');
  }
  public function about(){
      
    return view('frontend/about');
  }
  public function contact(){
      return view('frontend/contact');
  }
  public function single_product(){
      return view('frontend/single_product');
  }
}
