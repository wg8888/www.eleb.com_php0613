@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post" enctype="multipart/form-data" action="{{ route('admin.addto') }}">
        <div class="form-group">
            <label>	管理员名</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>邮箱</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="text" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>确认密码</label>
            <input type="text" name="pwd" class="form-control">
        </div>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop