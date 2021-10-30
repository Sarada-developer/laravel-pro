<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

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
     //    $result = Admin::where(['email'=>$email,'password'=>$password])->get();
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
     
         // if(isset($result[0]->id)){
             
         // }else{
            
         // }
        }

        public function dashboard(){
            return view('backend/admin_index');
        }




    public function admin_login(){
        return view('backend/admin_login');
    }
}
