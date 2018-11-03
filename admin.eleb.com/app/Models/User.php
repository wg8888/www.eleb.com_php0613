<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable=['name','email','password','remember_token','status','shop_id'];
    //找到信息对应的商户  模型关联一对多
    public function shops(){
        return $this->belongsTo(Shop::class,'id','id');
    }
}
