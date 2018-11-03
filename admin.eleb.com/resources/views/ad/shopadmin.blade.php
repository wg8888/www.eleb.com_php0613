@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>商户名</th>
            <th>邮箱</th>
            <th>密码</th>
            <th>状态</th>
            <th>所属商家</th>
            <th>设置</th>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->status==1?'启用':'禁用'}}</td>
                <td>{{$user->shop_id}}</td>
                <td><a href=""class="btn btn-danger btn-xs">删除</a>/
                <a href="{{  route('user.NewPwd',[$user]) }}"class="btn btn-danger btn-xs">重置密码</a>

                </td>



            </tr>
        @endforeach
    </table>
@stop