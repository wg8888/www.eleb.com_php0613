<?php

namespace App\Http\Controllers\food;

use App\Models\MenuCategories;
use App\Models\Menus;
use App\Models\ShopCategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\PostDec;

class MenuCategoriesController extends Controller
{
    //添加分类
    public function FoodAdd(){
        $id = Auth::user('id');//获取当前登录用户信息
        return view('class.foodadd',compact('id'));
    }
    //菜品分类添加到数据库
    public function FoodUpdate(Request $request){
       // dd($_POST);

        $this->validate($request,[
            'name' => 'required',
            'type_accumulation' => 'required',
            'shop_id' => 'required',
            'description'=>'required',
        ],[
            'name.required'=>'名称不能为空',
            'type_accumulation.required'=>'菜品编号不能为空',
            'shop_id.required'=>'所属商家ID不能为空',
            'description.required'=>'描述不能为空',
        ]);
        MenuCategories::create([
            'name'=>$request->name,
            'type_accumulation'=>$request->type_accumulation,
            'shop_id'=>$request->shop_id,
            'description'=>$request->description,
            'is_selected'=>$request->is_selected
        ]);

       session()->flash('success','分类添加成功');
        return redirect()->route('menucategories.FoodList');
    }
    //展示分类
    public function FoodList(Request $request){
            $menucategories=menucategories:: where('name','like',"%{$request->name}%")->paginate(2);
            return view('class.foodlist',compact('menucategories'));

    }

    //删除分类
    public function Delete( menucategories $menucategories){
        // dd($menucategories->id);
       // dd($menucategorie);
        $a=Menus::where('category_id',$menucategories->id)->first();
        //dd($a);exit;
      if(!$a==null){ //判断是否有分类id
          session()->flash('success','此分类中还有菜品无法栓出');
          return redirect()->route('menucategories.FoodList');
      }
      if($a==null){
          $menucategories->delete();
         // Post::find($menucategorie)->delete();
          session()->flash('success','删除文章成功');
          return redirect()->route('menucategories.FoodList');
      }
    }
}
