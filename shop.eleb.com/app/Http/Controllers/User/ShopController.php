<?php

namespace App\Http\Controllers\user;

use App\Models\MenuCategories;
use App\Models\Menus;
use App\Models\Shop;
use App\Models\ShopCategorie;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShopController extends Controller
{
    public function List(Request $request){
        //dd(123);exit;
        $shops=Shop::all();
      $datas=[];
      foreach ($shops as $shop){
          $data[]=[
              "id"=> $shop->id,
        "shop_name"=> $shop->shop_name,
        "shop_img"=> $shop->shop_img,
        "shop_rating"=> $shop->shop_rating,
        "brand"=> true,
        "on_time"=> true,
        "fengniao"=> true,
        "bao"=>true,
        "piao"=> $shop->piao,
        "zhun"=>true,
        "start_send"=>$shop->start_send,
        "send_cost"=> $shop->send_cost,
        "notice"=> $shop->notice,
        "discount"=>$shop->discount
          ];
          $datas=$data;
      }
      return $datas;
    }

    public function Business(request $request)
    {
        $id = $request->id;
        $shop = Shop::find($id);
        $commodity = [];
        $categorys = MenuCategories::where('shop_id', '=', $id)->get();
        foreach ($categorys as $category) {
            //遍历菜品分类
            $menus = Menus::where('category_id', '=', $category->id)->get();
            $goods_list = [];
            //遍历菜品
            foreach ($menus as $menu) {
                if($category->id==$menu->category_id) {
                    $menudata = [
                        "goods_id" => $menu->id,
                        "goods_name" => $menu->goods_name,
                        "rating" => $menu->rating,
                        "goods_price" => $menu->goods_price,
                        "description" => $menu->description,
                        "month_sales" => $menu->month_sales,
                        "rating_count" => $menu->rating_count,
                        "tips" => $menu->tips,
                        "satisfy_count" => $menu->satisfy_count,
                        "satisfy_rate" => $menu->satisfy_rate,
                        "goods_img" => $menu->goods_img
                    ];
                }
                //加入菜品列表
                $goods_list[] = $menudata;
            }
            $categorydata=["description" => $category->description,
                "is_selected" => $category->is_selected == 1 ? true : false,
                "name" => $category->name,
                "type_accumulation" => $category->type_accumulation,
                "goods_list"=>$goods_list
            ];
            $commodity[]=$categorydata;
        }
        $shopdata = ["id" => $shop->id,
            "shop_name" => $shop->shop_name,
            "shop_img" => $shop->shop_img,
            "shop_rating" => $shop->shop_rating,
            "service_code" => 4.4,
            "foods_code" => 4.5,
            "high_or_low" => true,
            "h_l_percent" => 30,
            "brand" => $shop->brand == 1 ? true : false,
            "on_time" => $shop->brand == 1 ? true : false,
            "fengniao" => $shop->brand == 1 ? true : false,
            "bao" => $shop->brand == 1 ? true : false,
            "piao" => $shop->brand == 1 ? true : false,
            "zhun" => $shop->brand == 1 ? true : false,
            "start_send" => $shop->start_send,
            "send_cost" => $shop->send_cost,
            "distance" => 637,
            "estimate_time" => 31,
            "notice" => $shop->notice,
            "discount" => $shop->discount,
            "evaluate" => [[
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 1,
                "send_time" => 30,
                "evaluate_details" => "好吃"
            ], [
                "user_id" => 12344,
                "username" => "w******k",
                "user_img" => "/images/slider-pic4.jpeg",
                "time" => "2017-2-22",
                "evaluate_code" => 5,
                "send_time" => 30,
                "evaluate_details" => "很好吃"
            ]
            ],
            "commodity"=>$commodity,
        ];
        return $shopdata;
    }
}
