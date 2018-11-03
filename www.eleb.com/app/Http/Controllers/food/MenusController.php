<?php

namespace App\Http\Controllers\food;

use App\Models\MenuCategories;
use App\Models\Menus;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class MenusController extends Controller
{
    //添加菜品
    public function Add(){
        $id=Auth::user('id');
        $categorys=MenuCategories::all();
        //dd($categorys);
            return view('addfood.add',compact('categorys'),compact('id'));
    }
    public function Update(Request $request){

        $this->validate($request,[
            'goods_name' => 'required',
            'rating'=>'required',
            'shop_id'=>'required',
            'category_id' => 'required',
            'goods_price' => 'required',
            'description' => 'required',
            'month_sales' => 'required',
            'rating_count' => 'required',
             'tips' => 'required',
             'satisfy_count' => 'required',
             'satisfy_rate' => 'required',
            'goods_img'=>'required|file',
            'status'=>'required',
        ],[
            'goods_name.required'=>'菜品名不能为空',
            'rating.required'=>'评分不能为空',
            'shop_id.required'=>'评分不能为空',
            'category_id.required'=>'所属分类不能为空',
            'goods_price.required'=>'价格不能为空',
            'description.required'=>'商家描述不能为空',
            'month_sales.required'=>'月销量不能为空',
            'rating_count.required'=>'评分数量不能为空',
            'tips.required'=>'提示信息不能为空',
            'satisfy_count.required'=>'满意度数量不能为空',
            'satisfy_rate.required'=>'满意度评分不能为空',
            'goods_img.required'=>'商品图片不能为空',
            'status	.required'=>'状态不能为空',
        ]);
        $path = $request->file('goods_img')->store('public/pic');
        Menus::create([
            'goods_name'=>$request->goods_name,
            'rating'=>$request->rating,
            'shop_id'=>$request->shop_id,
            'category_id'=>$request->category_id,
            'goods_price'=>$request->goods_price,
            'description'=>$request->description,
            'month_sales'=>$request->month_sales,
            'rating_count'=>$request->rating_count,
            'tips'=>$request->tips,
            'satisfy_count'=>$request->satisfy_count,
            'satisfy_rate'=>$request->satisfy_rate,
            'goods_img'=>$path,
            'status'=>$request->status,
        ]);
        session()->flash('success','添加菜品成功');
        return redirect()->route('menus.List');
    }
    public function List(){
        $menuses=Menus::all();
            return view('addfood.list',compact('menuses'));
    }
    //查看分类下面菜品详细信息
    public function LookFood( $menucategorie){
        //dd($menucategorie);
        $menus=Menus::where('category_id',$menucategorie)->get();
        //dd($shops);
        return view('class.lookfood',compact('menus'));
    }
}
