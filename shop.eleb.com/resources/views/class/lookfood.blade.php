@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <table class="table table-bordered table-striped">
        <tr>
            <th>菜品名</th>
            <th>价格</th>
            <th>描述</th>
            <th>月销量</th>
            <th>满意度数量</th>
            <th>商品图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($menus as $menu)
            <tr>
                <td>{{$menu->goods_name}}</td>
                <td>{{$menu->goods_price}}</td>
                <td>{{$menu->description}}</td>
                <td>{{$menu->month_sales}}</td>
                <td>{{$menu->satisfy_count}}</td>
                <td><img style="height: 60px;width: 80px" src="{{\Illuminate\Support\Facades\Storage::url($menu->goods_img) }}"></td>
                <td>{{$menu->status==1?'上架':'下架'}}</td>
                <td><a href=""class="btn btn-danger btn-xs">删除</a>/
                <a href=""class="btn btn-danger btn-xs">修改</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop