@extends('layout.default')

@section('contents')
    @include('layout._nav')
    @include('layout._errors')
    <form method="post" enctype="multipart/form-data" action="{{ route('user.Keep') }}">
        <div class="form-group">
            <label>用户名</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>邮箱</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>状态</label>
            <input name="status" type="radio" value="1" />启用
            <input name="status" type="radio" value="2" />禁用
        </div>
        <div class="form-group">
            <label>所属商家</label>
            <input type="text" name="shop_id" class="form-control">
        </div>
        <div class="form-group">
            <label>店铺分类</label>

            <select name="shop_category_id" >
                <option>请选择类型</option>
                @foreach ($shopcategories as $shopcategorie)
                <option value="{{ $shopcategorie->id }}">{{$shopcategorie->name}}</option>
                @endforeach
            </select>
        <div class="form-group">
            <label>店铺名称</label>
            <input type="text" name="shop_name" class="form-control">
        </div>
        <div class="form-group">
            <label>店铺图像</label>
            <input type="file" name="shop_img" class="form-control">
        </div>
        </div> <div class="form-group">
            <label>评分</label>
            <input type="text" name="shop_rating" class="form-control">
        </div>
        <div class="form-group">
            <label>是否是品牌</label>
            <input name="brand" type="radio" value="1" />是
            <input name="brand" type="radio" value="2" />不是
        </div>
        <div class="form-group">
            <label>是否准时送达</label>
            <input name="on_time" type="radio" value="1" />是
            <input name="on_time" type="radio" value="2" />不是
        </div>
        <div class="form-group">
            <label>是否蜂鸟配送</label>
            <input name="fengniao" type="radio" value="1" />是
            <input name="fengniao" type="radio" value="2" />不是
        </div>
        <div class="form-group">
            <label>是否保标记</label>
            <input name="bao" type="radio" value="1" />是
            <input name="bao" type="radio" value="2" />不是
        </div>
        <div class="form-group">
            <label>是否票标记</label>
            <input name="piao" type="radio" value="1" />是
            <input name="piao" type="radio" value="2" />不是
        </div>
        <div class="form-group">
            <label>是否准标记</label>
            <input name="zhun" type="radio" value="1" />是
            <input name="zhun" type="radio" value="2" />不是
        </div>
        <div class="form-group">
            <label>起送金额</label>
            <input type="text" name="start_send" class="form-control">
        </div>
        <div class="form-group">
            <label>配送费</label>
            <input type="text" name="send_cost" class="form-control">
        </div>
         <div class="form-group">
            <label>店铺公告</label>
            <textarea name="notice" style="height: 80px;width: 1100px">
            </textarea>
        </div>
        <div class="form-group">
            <label>优惠信息</label>
            <textarea name="discount" style="height: 80px;width: 1100px">
            </textarea>
        </div>
        <div class="form-group">
            <label>店铺状态</label>
           {{-- <input name="status" type="radio" value="1" />正常 --}}
            待审核<input name="status" type="radio" value="0" checked="checked"/>
            {{--  <input name="status" type="radio" value="-1" />禁用   --}}
        </div>
        <label>验证码</label>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        {{csrf_field()}}
        <button class="btn btn-primary">提交</button>
    </form>
@stop