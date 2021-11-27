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
        // $request->session()->flash('message','Coupon Updated');
        return redirect('admin/coupon');
    
    }


    // public function manage_coupon(Request $request,$id='')
    // {
    //    if($id>0){
    //        $arr=Coupon::where(['id'=>$id])->get();
    //        $result['title']=$arr['0']->title;
    //        $result['code']=$arr['0']->code;
    //        $result['value']=$arr['0']->value;
    //        $result['id']=$arr['0']->id;
    //    } 
    //    else{
    //     $result['title']='';
    //     $result['code']='';
    //     $result['value']='';
    //     $result['id']=0;
    //    }
    //    return view('backend/manage_coupon',$result);
    // }


    // public function manage_coupon_process(Request $request)
    // {
    // $request->validate([
    //     'title'=>'required',
    //     'code'=>'required|unique:coupons,code,'.
    //     $request->post('id'),
    //     'value'=>'required',
    // ]);
    // if($request->post('id')>0){
    //     $model=Coupon::find($request->post('id'));
    //     $msg="Coupon Updated";
    // }
    //     else{
    //         $model=new Coupon();
    //         $msg="Coupon Inserted";
    //     }
    //     $model->title=$request->post('title');
    //     $model->code=$request->post('code');
    //     $model->value=$request->post('value');
    //     $model->save();
    //     $request->session()->flash('message',$msg);
    //     return redirect('/admin/coupon');
    // }


    public function delete(Request $request,$id)
    {
    $model=Coupon::find($id);
    $model->delete();
    $request->session()->flash('message','Coupon deleted');
    return redirect('/admin/coupon');
    }
}
