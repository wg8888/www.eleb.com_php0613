<?php

namespace App\Http\Controllers\admines;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //修改密码表单
    public function ShopAdmin(){
        $users=User::all();
        return view('ad.shopadmin',compact('users'));
    }
    public function NewPwd(user $user){
        //dd($user);

        return view('ad.newpwd',compact('user'));
    }
    //重置商户密码
    public function Update(user $user,Request $request){
        //dd($user);
        $request->user()->fill([
            'password' => Hash::make($request->password)
        ])->save();
        session()->flash('success','重置成功');
        return redirect()->route('user.ShopAdmin');
    }
}
