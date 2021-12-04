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
    // admin login
    public function index(Request $request){
        if($request->session()->has('ADMIN_LOGIN')){
        }else{
            return view('backend/admin_login');
        }
        return view('backend/admin_index');
    }
    public function admin_login(){
        return view('backend/admin_login');
        }

    // admin auth
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
        
        // admin dashboard
        public function dashboard(){
            return view('backend/admin_index');
        }

    //    admin category
        public function admin_category(){
            $category = Category::all();
            return view('backend/admin_category',compact('category'));
        }
        public function add_category(){
            return view('backend/add_category');
        }
        public function insert_category(Request $request){
            $category= new Category();
            $category->category_name=$request->category_name;
            $category->category_slug=$request->category_slug;
            $category->status=1;
            $category->save();
            return back()->with('success',"Category has been added succesfully");
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
            $cate->save();
            $request->session()->flash('message','category Updated');
            return redirect()->back()->with("update"); 
        }
        public function CategoryDelete($id){

            Category::findOrFail($id)->delete();
    
            $notification = array(
                'message' => 'Category Deleted Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
        public function status(Request $request,$status,$id)
        {
            $data = Category::find($id);
            $data->status = $status;
            $data->save();
            $request->session()->flash('message','Status Updated');
            return redirect('admin/category');
        }

        // admin products
        public function admin_products(){
            $products = Product::all();
            return view('backend/admin_products',compact('products'));
        }
        public function add_products(){
            return view('backend/add_products');
        }
          public function insert_products(Request $request){
 
            $this->validate($request, [
                'product_name'=>'required',
                'category' => 'required',
                'pro_img' => 'required|mimes:jpeg,jpg,png',
                'slug'=>'required',
                'brand'=>'required',
                'model'=>'required',
                'price'=>'required',
                'short_desc' => 'required',
                'desc' => 'required',
                'keywords'=>'required',
                'technical_specification' => 'required',
                'uses'=>'required',
                'warranty'=>'required'
            ]);
            
            $product= new Product;
            $product->product_name=$request->product_name;
            $product->category=$request->category;
            $product->slug=$request->slug;

            if($request->hasfile('image')){
                $image=$request->file('image');
                $ext=$image->extension();
                $image_name=time().'.'.$ext;
                $image->storeAs('/public/media',$image_name);
                $product->image=$image_name;
            }

            $product->brand=$request->brand;
            $product->model=$request->model;
            $product->price=$request->price;
            $product->short_desc=$request->short_desc;
            $product->desc=$request->desc;
            $product->keywords=$request->keywords;
            $product->technical_specification=$request->technical_specification;
            $product->uses=$request->uses;
            $product->warranty=$request->warranty;
            $product->status=1;
            // echo '<pre>';
            // print_r($product);
            // die();
            $product->save();
           
            return redirect('admin/products');
        }

        public function productEdit($id){
            $product = Product::findOrFail($id);
            return view('backend.edit_product',compact('product'));
        }
        
        public function product_update(Request $request,$id){
            $product=Product::find($id);
            $product->product_name=$request->product_name;
            $product->category=$request->category;
            $product->slug=$request->slug;
            $product->image=$request->image;
            $product->brand=$request->brand;
            $product->model=$request->model;
            $product->price=$request->price;
            $product->short_desc=$request->short_desc;
            $product->desc=$request->desc;
            $product->keywords=$request->keywords;
            $product->technical_specification=$request->technical_specification;
            $product->uses=$request->uses;
            $product->warranty=$request->warranty;
            $product->save();
            $request->session()->flash('message','Product updated');
            return redirect('admin/products');
        }
        public function product_status(Request $request,$status,$id){
            $request->validate([
                'product_name' => 'required',
                'category' => 'mimes:jpeg,jpg,png',
                'slug' => 'required',
                'image' => 'required',
                'brand' => 'required',
                'model' => 'required',
                'price' => 'required',
                'short_desc' => 'required',
                'desc' => 'required',
                'keywords' => 'required',                
                'technical_specification' => 'required',
                'uses' => 'required',
                'warranty' => 'required',
                'slug' => 'required',
            ]);
            $data=Product::find($id);
            $data->status=$status;
            $data->save();
            return redirect('admin/products');
        }
        public function product_delete($id){
            Product::findOrFail($id)->delete();
            $notification=array(
                'message'=>'Product successfully deleted',
                'alert-type'=>'success'
            );
            return redirect('admin/products');
        }
    }
