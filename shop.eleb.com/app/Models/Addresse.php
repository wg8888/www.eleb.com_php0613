<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Addresse extends Model
{
    protected $fillable=['name','tel','province','city','county','address','is_default','user_id'];
}
