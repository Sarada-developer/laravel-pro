<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use Illuminate\Support\Facades\Hash;
use App\Models\Product;


class SellerController extends Controller
{
    public function index(Request $request){
        if($request->session()->has('SELLER_LOGIN')){

        }else{
            return view('seller/seller_login');
        }
        return view('seller/seller_index');
    }

    public function auth(Request $req){

        $email = $req->post('email');
        $password = $req->post('password');
        $result = Seller::where(['email'=>$email])->first();
         if($result){
             if(Hash::check($req->post('password'),$result->password)){
                 $req->session()->put('SELLER_LOGIN',true);
                 $req->session()->put('SELLER_ID',$result->id);
                 return redirect('seller/dashboard');
             }else{ 
                 $req->session()->flash('error','please enter valid password');
                 return redirect('seller');
             }       
         }else{
             $req->session()->flash('error','please enter valid login details');
             return redirect('seller');
         }
        }
        
        public function dashboard(){
            return view('seller/seller_index');
        }
        public function seller_login(){
        return view('seller/seller_login');
        }

        public function seller_products(){
            return view('seller/seller_products');
        }
      
        public function add_products(){
            return view('seller/add_products');
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
