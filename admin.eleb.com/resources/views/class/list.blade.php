@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>分类名称</th>
            <th>店铺图片</th>
            <th>是否显示</th>
            <th>操作</th>
        </tr>
        @foreach ($shopcategories as $shopcategorie)
            <tr>
                <td>{{$shopcategorie->id}}</td>
                <td>{{$shopcategorie->name}}</td>
                <td>@if($shopcategorie->img) <img style="width: 80px;height: 60px" src="{{\Illuminate\Support\Facades\Storage::url($shopcategorie->img)}}"/>@endif</td>
                <td>{{$shopcategorie->status==1?'是':'否'}}</td>



                <td><a href="{{ route('shopcategorie.Delete',[$shopcategorie]) }}"class="btn btn-danger btn-xs">删除</a>/
                <a href="{{ route('shopcategorie.Edit',[$shopcategorie]) }}"class="btn btn-danger btn-xs">修改</a>/
                <a href="{{ route('shopcategorie.Look',[$shopcategorie]) }}"class="btn btn-danger btn-xs">查看商户详情</a>
                </td>



            </tr>
        @endforeach
    </table>
@stop