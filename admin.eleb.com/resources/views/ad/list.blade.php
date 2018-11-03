@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>管理员名</th>
            <th>邮箱</th>
            <th>创建时间</th>
            <th>操作</th>
        </tr>
        @foreach ($admins as $admin)
            <tr>
                <td>{{$admin->id}}</td>
                <td>{{$admin->name}}</td>
                <td>{{$admin->email}}</td>
                <td>{{$admin->created_at}}</td>
                <td><a href=""class="btn btn-danger btn-xs">删除</a>/
                <a href="{{ route('admin.Edit',[$admin]) }}"class="btn btn-danger btn-xs">修改</a>

                </td>



            </tr>
        @endforeach
    </table>
@stop