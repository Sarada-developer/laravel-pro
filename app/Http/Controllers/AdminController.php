<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('backend/admin_index');
    }
    public function admin_login(){
        return view('backend/admin_login');
    }
}
