@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post"  action="{{ route('admin.ToLogin') }}">
        <div class="form-group">
            <label>	管理员账号</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>密码</label>
            <input type="password" name="password" class="form-control">
        </div>
        <label>验证码</label>
        <input id="captcha" class="form-control" name="captcha" >
        <img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="this.src='/captcha/flat?'+Math.random()" title="点击图片重新获取验证码">
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop