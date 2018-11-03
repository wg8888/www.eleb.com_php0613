<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategories extends Model
{
    protected $fillable=['name','type_accumulation','shop_id','description','is_selected'];
}
