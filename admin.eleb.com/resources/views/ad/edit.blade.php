@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post"  action="">
        <div class="form-group">
            <label>	管理员账号</label>
            <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
        </div>
        <div class="form-group">
            <label>原密码</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>新密码</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="form-group">
            <label>确认密码</label>
            <input type="password" name="password" class="form-control">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop