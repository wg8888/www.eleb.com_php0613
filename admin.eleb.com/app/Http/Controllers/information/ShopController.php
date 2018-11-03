<?php

namespace App\Http\Controllers\information;


use App\Models\Shop;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
//显示商家信息的类
class ShopController extends Controller
{
   //显示商家信息
    public function Mation(){
        $users=User::all();
        //dd($users);
        return view('toexamine.mation',compact('users'));
    }
    //修改审核状态
    public function Update(Shop $shop,Request $request){
        //dd($request->statu);
        $s=Shop::where('id',$shop->id)->first();
       // dd($s->status);
        $s->status=$request->status;
       $s->save();
        session()->flash('success','审核成功');
        return redirect()->route('shop.Mation');
    }
}
