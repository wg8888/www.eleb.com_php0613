<?php

namespace App\Http\Controllers\register;
use App\Models\Shop;
use App\Models\shopcategorie;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    //注册用户信息
   public function Add(){
       //获取店铺分类名单
       $shopcategories=shopcategorie::all();
       return view('rr.add',['shopcategories'=>$shopcategories]);
   }
   //添加数据到数据库
   public function Keep(Request $request){
       //dd($_POST);
     $this->validate($request,[
          'name' => 'required|min:2|max:5',
           'email'=>'required',
           'password' => 'required|min:6|max:12',
           'status' => 'required',
           'shop_id' => 'required',
           'shop_category_id' => 'required',
           'shop_name' => 'required',
          // 'shop_name' => 'required',
           'captcha'=>'required|captcha',
           'shop_img'=>'required|file',
           'shop_rating'=>'required',
           'brand'=>'required',
           'on_time'=>'required',
           'fengniao'=>'required',
           'bao'=>'required',
           'piao'=>'required',
           'zhun'=>'required',
           'start_send'=>'required',
           'send_cost'=>'required',
           'notice'=>'required',
           'discount'=>'required',
          // 'status'=>'required'

       ],[
           'name.required'=>'用户名不能为空',
           'name.min'=>'用户名不能少于2个字',
           'name.max'=>'用户名不能大于5个字',
           'email'=>'邮箱不能为空',
           'password.required'=>'密码不能为空',
           'password.min'=>'密码不能低于6位数',
           'password.max'=>'密码不能大于12位数',
           'status.required'=>'状态不能为空',
           'shop_id.required'=>'所属商家不能为空',
           'shop_category_id.required'=>'店铺分类不能为空',
           'shop_name.required'=>'店铺名不能为空',
           'shop_rating.required'=>'评分不能为空',
           'brand.required'=>'品牌不能为空',
           'on_time.required'=>'是否准时送达不能为空',
           'fengniao.required'=>'是否蜂鸟配送不能为空',
           'bao.required'=>'是否保标记不能为空',
           'piao.required'=>'是否票标记不能为空',
           'zhun.required'=>'是否准标记不能为空',
           'start_send.required'=>'起送金额不能为空',
           'send_cost.required'=>'配送费不能为空',
           'notice.required'=>'店公告不能为空',
           'discount.required'=>'优惠信息不能为空',
          // 'status.required'=>'状态不能为空',
           'captcha.required'=>'验证码不能为空',
           'shop_img.required'=>'店铺图像不能为空',
       ]);
    //添加商户账号
      // DB::beginTransaction();//开启事务
       //try{
           $path = $request->file('shop_img')->store('public/pic');
           User::create([
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>bcrypt($request->password),
               'status'=>0,
               'shop_id'=>$request->shop_id,
               'remember_token'=>str_random(50),
              // 'head'=>$path
           ]);
           Shop::create([
               'shop_category_id'=>$request->shop_category_id,
               'shop_name'=>$request->shop_name,
               'shop_img'=>$path,
               'name'=>$request->name,
               'shop_rating'=>$request->shop_rating,
               'brand'=>$request->brand,
               'on_time'=>$request->on_time,
               'fengniao'=>$request->fengniao,
               'bao'=>$request->bao,
               'piao'=>$request->piao,
               'zhun'=>$request->zhun,
               'start_send'=>$request->start_send,
               'send_cost'=>$request->send_cost,
               'notice'=>$request->notice,
               'discount'=>$request->discount,
               'status'=>0,
           ]);
       session()->flash('success', '注册成功,等待审核');
          // DB::commit();//执行事务
     //  }catch (\Exception $e){
        //   DB::rollBack(); //回滚事务
      // }

       //添加商户信息

   }
   //显示登录页面
   public function Login(){
       return view('rr.login');
   }
   //提交登录
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
        if(Auth::attempt(['name'=>$request->name,'password'=>$request->password,'status'=>1])){
            session()->flash('success','登录成功');
            return redirect()->route('menucategories.FoodList');
            return "登录成功";
        }else{
            session()->flash('success','账户名或密码错误,或者状态不正常');
            return redirect()->route('user.Login');
        }

    }
    //退出功能
    public function LogOut(){
        Auth::logout();
        session()->flash('success','注销成功');
        return redirect()->route('user.Login');
    }

}
