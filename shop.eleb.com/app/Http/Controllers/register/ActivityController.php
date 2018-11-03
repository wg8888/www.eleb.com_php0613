<?php

namespace App\Http\Controllers\register;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ActivityController extends Controller
{
    //显示添加活动页面
    public function Add(){
      return view('ay.add');
    }
}
