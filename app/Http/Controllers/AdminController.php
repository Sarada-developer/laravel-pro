<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use App\Models\Category;
use App\Models\Product;
use Validator;

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
            $category = Category::all();
            return view('backend/admin_category',compact('category'));
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

        public function CategoryDelete($id){

            Category::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
    
            return redirect()->back()->with($notification);
    
        } 


        public function CategoryEdit($id){
            $category = Category::findOrFail($id);
            return view('backend.edit_category',compact('category'));
    
        }

        public function category_update(Request $request, $id){

            $request->validate([
                'category_name' => 'required',
                // 'category_slug' => 'required|unique:categories',
            ]);
            $cate =Category::find($id);
            $cate->category_name = $request->category_name;
            // $cate->category_slug = $request->category_slug;
            $cate->save();
            $request->session()->flash('message','category Updated');
            return redirect()->back()->with("update");
        
        }

        public function insert_products(Request $request){

            $this->validate($request, [
                'product_name'=>'required',
                'category_id' => 'required',
                'price'=>'required',
                'description' => 'required',
                'pro_img' => 'required',
                // 'pro_img.*' => 'image',
                'SKU'=>'required',
                'slug' => 'required',
                'stock' => 'required',
                'Weight'=>'required',
                'dimension'=>'required'

            ]);

            $product= new Product;
            $product->product_name=$request->product_name;
            $product->category_id=$request->category_id;
            $product->price=$request->price;
            $product->description=$request->description;

            // $files=[];
            // if($request->hasfile('image')){
            //     foreach($request->file('image') as $img){
            //         $img_name=time().rand(1,100).'.'.$img->extension();
            //         $img->move(public_path('files'),$img_name);
            //         $files[]=$img_name;
            //     }
            // }
            $files = [];
            if($request->hasfile('pro_img'))
             {
                foreach($request->file('pro_img') as $file)
                {
                    $name = time().rand(1,100).'.'.$file->extension();
                    $file->move(public_path('files'), $name);  
                    $files[] = $name;  
                }
             }
             $product->pro_img = $files;
            // $product->pro_img=$files;
            $product->SKU=$request->SKU;
            $product->slug=$request->slug;
            $product->stock=$request->stock;
            $product->Weight=$request->Weight;
            $product->dimension=$request->dimension;
            $product->save();
            return back()->with('success',"Product has been added succesfully");
        }
    }
