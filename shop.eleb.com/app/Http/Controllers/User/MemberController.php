<?php

namespace App\Http\Controllers\User;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redis;
//use Illuminate\Support\Facades\Validator;

class MemberController extends Controller
{
    public function Login(Request $request){
      //dd(123);exit;
        //return 'login';
        $validator=Validator::make($request->all(),[
            'username'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'用户名不能为空',
            'password.required'=>'密码不能为空',
        ]);
      /* if ($validator->fails()) {
            return [
                "status"=>"false",
                'message'=>$validator->errors()
            ];
        }
*/
        if(Auth::attempt(['username'=>$request->name,'password'=>$request->password])){
            return [
                "status"=>"true",
                "message"=>"登录成功",
                //"user_id"=>Auth::user()->id,
                //"username"=>Auth::user()->username
            ];
        }
        return [
            "status"=>"false",
            "message"=>"登录失败"
        ];
    }



    public function Begister(Request $request){
//        dd($request);
     $validator=Validator::make($request->all(),[
            'username'=>'required',
            'tel'=>'required',
            'sms'=>'required',
            'password'=>'required',
        ],[
            'username.required'=>'用户名不能为空',
            'tel.required'=>'电话不能为空',
            'sms.required'=>'短信密码不能为空',
            'password.required'=>'密码不能为空'
        ]);
       if($validator->fails()){
          return [
               'status'=>"false",
                'message'=>$validator->errors()
           ];
       }

        $code=Redis::get('code'.$request->tel);
        //dd($request->sms.$request->tel!=$code);
       //dd($request->sms.$request->tel!=$code);
        if($request->sms!=$code){
            return [
                'status'=>"false",
                'message'=>"请填写正确的短信"
            ];
        }
        member::create([
            'username'=>$request->username,
            'tel'=>$request->tel,
            'password'=>bcrypt($request->password)
        ]);
        return [
            "status"=>"true",
            "message"=>"注册成功"
        ];
    }
    public  function Sms(Request $request){
        $code=rand(1000,9000);//生成随机字符串
        $tel=$request->tel;//获取用户输入的电话号码
        /* $redis = new Redis('127.0.0.1',6379);
         $redis->connect();
         $redis->set('tel','666666');
         */
        Redis::setex('code'.$tel,300,$code);
        return [
            "status"=>"true",
            "message"=>"获取短信验证码成功"
        ];
    }

}
