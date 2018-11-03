@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <table class="table table-bordered table-striped">
        <tr>
            <th>店铺名</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>是否是品牌</th>
            <th>状态</th>
        </tr>
        @foreach ($shops as $shop)
            <tr>
                <td>{{$shop->shop_name}}</td>
                <td>@if($shop->shop_img) <img style="width: 80px;height: 60px" src="{{\Illuminate\Support\Facades\Storage::url($shop->shop_img)}}"/>@endif</td>
                <td>{{$shop->shop_rating}}</td>
                <td>{{$shop->brand==1?'是':'否'}}</td>
                @if($shop->status==0) <td>待审核</td>@elseif($shop->status==1)<td>已通过审核</td>@else<td>禁用</td>@endif

            </tr>
        @endforeach
    </table>
@stop