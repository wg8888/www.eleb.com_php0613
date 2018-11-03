@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post"  action="{{ route('user.Update',['user'=>$user]) }}">
        <div class="form-group">
            <label>	商户名</label>
            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
        </div>
        <div class="form-group">
            <label>新密码</label>
            <input type="password" name="password" class="form-control">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary">确认重置</button>
    </form>
@stop