@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>商户名</th>
            <th>邮箱</th>
            <th>创建时间</th>
            <th>状态</th>
            <th>所属商家</th>
            <th>店铺分类ID</th>
            <th>店铺名称</th>
            <th>店铺图片</th>
            <th>评分</th>
            <th>是否是品牌</th>
            <th>是否准时送达</th>
            <th>是否蜂鸟配送</th>
            <th>是否保标记</th>
            <th>是否票标记</th>
            <th>是否准标记</th>
            <th>起送金额</th>
            <th>配送费</th>
            <th>店公告</th>
            <th>优惠信息</th>
            <th>状态</th>
            <th>是否通过审核</th>
            <th>请确认</th>
        </tr>
        @foreach ($users as $user)
            @if($user->shops->status==0)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at}}</td>
                <td>{{ $user->status }}</td>
                <td>{{ $user->shop_id}}</td>
                <td>{{ $user->shops->shop_category_id }}</td>
                <td>{{ $user->shops->shop_name  }}</td>
                <td><img src="{{\Illuminate\Support\Facades\Storage::url($user->shops->shop_img)}}"/></td>
                <td> {{ $user->shops->shop_rating }}</td>
                <td> {{ $user->shops->brand==1?'是':'否' }}</td>
                <td>{{ $user->shops->on_time==1?'是':'否' }}</td>
                <td>{{ $user->shops->fengniao==1?'是':'否' }}</td>
                <td>{{ $user->shops->bao==1?'是':'否' }}</td>
                <td>{{ $user->shops->piao==1?'是':'否' }}</td>
                <td>{{ $user->shops->zhun==1?'是':'否' }}</td>
                <td>{{ $user->shops->start_send }}</td>
                <td>{{ $user->shops->send_cost }}</td>
                <td>{{ $user->shops->notice }}</td>
                <td>{{ $user->shops->discount }}</td>
             {{--  @if ($user->shops->status==0)--}} <td>待审核</td>{{-- @endif --}}
                <form action="{{ route('shop.Update',[$user]) }}" method="post">
                    <td style="width: 80px">
                        是<input type="radio" name="status" value="1">
                        否<input type="radio" name="status" value="-1">
                        {{ csrf_field() }}
                    </td>
                    <td style="width: 80px">
                       <input type="submit" value="确认" class="btn btn-danger btn-xs"/>
                    </td>

                </form>


            </tr>
            @endif
        @endforeach

    </table>
@stop