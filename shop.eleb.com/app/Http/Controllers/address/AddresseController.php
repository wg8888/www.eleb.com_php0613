<?php

namespace App\Http\Controllers\address;

use App\Models\Addresse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Validator;


class AddresseController extends Controller
{
   public function Add(Request $request){
       //dd($_POST);
           $validator=Validator::make($request->all(),[
               'name'=>'required',
               'tel'=>'required',
               'provence'=>'required',
               'city'=>'required',
               'area'=>'required',
               'detail_address'=>'required'
           ],[
               'name.required'=>'用户名不能为空',
               'tel.required'=>'电话不能为空',
               'provence.required'=>'省份不能为空',
               'city.required'=>'市不能为空',
               'area.required'=>'区/县不能为空',
               'detail_address.required'=>'详细地址不能为空',
           ]);
          if($validator->fails()){
               return [
                   "status"=>"false",
                   "message"=>$validator->errors()
               ];
           }


       Addresse::create([
               'name'=>$request->name,
               'tel'=>$request->tel,
               'province'=>$request->provence,
               'city'=>$request->city,
               'county'=>$request->area,
               'address'=>$request->detail_address,
               'is_default'=>0,
               'user_id'=>Auth::user()->id
           ]);
           return [
               "status"=>"true",
               "message"=>"添加成功"
           ];
       }
       //显示地址
    public function List(){
       /*
        *  [{
      "id": "1",
      "provence": "四川省",
      "city": "成都市",
      "area": "武侯区",
      "detail_address": "四川省成都市武侯区天府大道56号",
      "name": "张三",
      "tel": "18584675789"
    }, {
      "id": "2",
     "provence": "河北省",
     "city": "保定市",
     "area": "武侯区",
     "detail_address": "四川省成都市武侯区天府大道56号",
     "name": "张三",
     "tel": "18584675789"
    }]
        */
       //获取所有数据
       // dd(2222);
        $addresses=Addresse::where('user_id','=',Auth::user()->id)->get();
        $lists=[];
        foreach ($addresses as $addresse){
            $list=[
                'id'=>$addresse->id,
               'provence'=> $addresse->province,
                'city'=>$addresse->city,
                'area'=>$addresse->county,
                'detail_address'=>$addresse->address,
                'name'=>$addresse->name,
                'tel'=>$addresse->tel
            ];
            $lists[]=$list;
        }
        return $lists;

    }
    //回显
    public function HuiXian(Request $request){
      // dd(12300);
        $id=$request->id;
        $address=Addresse::find($id);
        return [
            "id"=>$address->id,
            "provence"=>$address->province,
            "city"=>$address->city,
            "area"=>$address->county,
            "detail_address"=>$address->address,
            "name"=>$address->name,
            "tel"=>$address->tel
        ];
    }

    public function Edit(Request $request){
        $validatot=Validator::make($request->all(),[
            'name'=>'required',
            'tel'=>'required',
            'provence'=>'required',
            'city'=>'required',
            'area'=>'required',
            'detail_address'=>'required'
        ],[
            'name.required'=>'用户名不能为空',
            'tel.required'=>'电话不能为空',
            'provence.required'=>'省份不能为空',
            'city.required'=>'市不能为空',
            'area.required'=>'区/县不能为空',
            'detail_address.required'=>'详细地址不能为空',
        ]);
        if($validatot->fails()){
            return [
                "status"=>"false",
                "message"=>$validatot->errors()
            ];
        }
        $id=$request->id;
        $address=Addresse::find($id);
        $address->update([
            'id'=>$request->id,
            'name'=>$request->name,
            'tel'=>$request->tel,
            'province'=>$request->provence,
            'city'=>$request->city,
            'county'=>$request->area,
            'address'=>$request->detail_address
        ]);
        return [
            "status"=>"true",
            "message"=>"修改成功"
        ];
    }

}
