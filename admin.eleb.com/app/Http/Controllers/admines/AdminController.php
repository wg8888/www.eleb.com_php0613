<?php

namespace App\Http\Controllers\admines;

use App\Models\Admin;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
        //展示管理员列表
    public function add(){
        return view('ad.add');
    }
    public function AddTo(Request $request){
        $this->validate($request,[
            'name' => 'required|min:2|max:5',
            'email'=>'required',
            'password' => 'required|min:6|max:12',
            'captcha'=>'required',
        ],[
            'name.required'=>'用户名不能为空',
            'name.min'=>'用户名不能少于2个字',
            'name.max'=>'用户名不能大于5个字',
            'email'=>'邮箱不能为空',
            'password.required'=>'密码不能为空',
            'password.min'=>'密码不能低于6位数',
            'password.max'=>'密码不能大于12位数',
            'captcha.required'=>'验证码不能为空',
        ]);

        Admin::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'remember_token'=>str_random(50),
        ]);
        session()->flash('success','注册成功，返回登录页面');
        return redirect()->route('admin.Login');
    }
    //管理员登录界面
    public function Login(){
        return view('ad.login');
    }
    //登录确认
    public function ToLogin(Request $request){
        $this->validate($request,[
            'name' => 'required',
            'captcha'=>'required',
            'password' => 'required',
        ],[
            'name.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
            'captcha.required'=>'验证码不能为空',
        ]);
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password])){
            session()->flash('success','登录成功');
           return redirect()->route('admin.List');
        }else{
            session()->flash('success','账户名或密码错误');
            return redirect()->route('admin.Login');
        }
    }
    //退出功能
    public function LogOut(){
            Auth::logout();
        session()->flash('success','注销成功');
        return redirect()->route('admin.Login');
    }

    //展示管理员名单
    public function List(){
        $admins=Admin::all();
        return view('ad.list',compact('admins'));
    }
    //修改管理员密码
    public function Edit(admin $admin){
        $name=session('name',$admin->name);
      return view('ad.Edit',compact('admin'));

    }

}
