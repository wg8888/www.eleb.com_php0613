@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <form method="get">
        分类名<input type="text" name="name"/> 价格区间<input type="text" name="a"/>-<input type="text" name="b"/>
        <input type="submit" value="搜索">
    </form>
    <table class="table table-bordered table-striped">
        <tr>
            <th>菜品名</th>
            <th>评分</th>
            <th>价格</th>
            <th>描述</th>
            <th>月销量</th>
            <th>评分数量</th>
            <th>提示信息</th>
            <th>满意度数量</th>
            <th>满意度评分</th>
            <th>商品图片</th>
            <th>状态</th>
            <th>操作</th>
        </tr>
        @foreach ($menuses as $menuse)
            <tr>
                <td>{{$menuse->goods_name}}</td>
                <td>{{$menuse->rating}}</td>
                <td>{{$menuse->goods_price}}</td>
                <td>{{$menuse->description}}</td>
                <td>{{$menuse->month_sales}}</td>
                <td>{{$menuse->rating_count}}</td>
                <td>{{$menuse->tips}}</td>
                <td>{{$menuse->satisfy_count}}</td>
                <td>{{$menuse->satisfy_rate}}</td>
                <td><img style="height: 60px;width: 80px" src="{{\Illuminate\Support\Facades\Storage::url($menuse->goods_img) }}"></td>
                <td>{{$menuse->status==1?'上架':'下架'}}</td>
                <td><a href=""class="btn btn-danger btn-xs">删除</a>/
                <a href=""class="btn btn-danger btn-xs">修改</a>
                </td>
            </tr>
        @endforeach
    </table>
@stop