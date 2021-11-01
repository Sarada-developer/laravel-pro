<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Product;


class AdminController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('ADMIN_LOGIN')){
        }else{
            return view('backend/admin_login');
        }
        return view('backend/admin_index');
    }

    public function auth(Request $req){
        $email = $req->post('email');
        $password = $req->post('password');
        $result = Admin::where(['email'=>$email])->first();
         if($result){
             if(Hash::check($req->post('password'),$result->password)){
                 $req->session()->put('ADMIN_LOGIN',true);
                 $req->session()->put('ADMIN_ID',$result->id);
                 return redirect('admin/dashboard');
             }else{ 
                 $req->session()->flash('error','please enter valid password');
                 return redirect('admin');
             }       
         }else{
             $req->session()->flash('error','please enter valid login details');
             return redirect('admin');
         }
        }
        public function dashboard(){
            return view('backend/admin_index');
        }
        public function admin_login(){
        return view('backend/admin_login');
        }
        public function admin_category(){
            return view('backend/admin_category');
        }
        public function admin_products(){
            return view('backend/admin_products');
        }
        public function add_category(){
            return view('backend/add_category');
        }
        public function add_products(){
            return view('backend/add_products');
        }
        public function insert_category(Request $request){
            $category= new Category();
            $category->category_name=$request->category_name;
            $category->save();
            return back()->with('success',"Category has been added succesfully");
        }
        public function insert_products(Request $request){
            $product=new Product();
            $product->product_name=$request->product_name;
            $product->category=$request->category;
            $product->price=$request->price;
            $product->description=$request->description;
            $files=[];
            if($request->hasfile('image')){
                foreach($request->file('image') as $img){
                    $img_name=time().rand(1,100).'.'.$img->extension();
                    $img->move(public_path('files'),$img_name);
                    $files[]=$img_name;
                }
            }
            $product->image=$files;
            $product->SKU=$request->SKU;
            $product->slug=$request->slug;
            $product->stock=$request->stock;
            $product->Weight=$request->Weight;
            $product->dimension=$request->dimension;
            $product->save();
            return back()->with('success',"Product has been added succesfully");
        }
    }
