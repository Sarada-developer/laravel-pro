<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $result = Coupon::all();
        return view('backend/coupon',compact('result'));
    }
    public function addCoupon(){
        return view('backend.addCoupon');
    }
    public function insert_Coupon(Request $request){
        $coupon= new Coupon();
        $coupon->title=$request->title;
        $coupon->code=$request->code;
        $coupon->value=$request->value;
        $coupon->save();
        return back()->with('success',"Coupon has been added succesfully");
    }
    public function CouponEdit($id){
        $coupon = Coupon::findOrFail($id);
        return view('backend.manage_coupon',compact('coupon'));

    }
     public function Coupon_update(Request $request,$id){

        $request->validate([
            'title' => 'required',
            'code' => 'required|unique:coupons,code',
            'value' => 'required',
        ]);

        $coupon = Coupon::find($id);
        $coupon->title = $request->title;
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->save();
        return redirect('admin/coupon');
    }
    public function delete(Request $request,$id)
    {
    $model=Coupon::find($id);
    $model->delete();
    $request->session()->flash('message','Coupon deleted');
    return redirect('/admin/coupon');
    }
}
