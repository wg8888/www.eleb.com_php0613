@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post" enctype="multipart/form-data" action="{{ route('menus.Update') }}">
        <div class="form-group">
            <label>	菜名</label>
            <input type="text" name="goods_name" class="form-control">
        </div>
        <div class="form-group">
            <label>	评分</label>
            <input type="text" name="rating" class="form-control">
        </div>
        {{-- 商家id --}}
        <div class="form-group">
            <input type="hidden" name="shop_id" class="form-control" value="{{ $id->id }}">
        </div>
        {{-- 分类id --}}
        <div class="form-group">
            <label>	所属菜品</label>
                <select name="category_id" style="width: 80px">
                    @foreach($categorys as $category)
                    <option value="{{  $category->id}}">{{  $category->name}}</option>
                    @endforeach
                </select>

        </div>
        <div class="form-group">
            <label>	价格</label>
            <input type="text" name="goods_price" class="form-control">
        </div>
        <div class="form-group">
            <label>	描述</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>	月销量</label>
            <input type="text" name="month_sales" class="form-control">
        </div>
        <div class="form-group">
            <label>	评分数量</label>
            <input type="text" name="rating_count" class="form-control">
        </div>
        <div class="form-group">
            <label>	提示信息</label>
            <input type="text" name="tips" class="form-control">
        </div>
        <div class="form-group">
            <label>	满意度数量</label>
            <input type="text" name="satisfy_count" class="form-control">
        </div>
        <div class="form-group">
            <label>	满意度评分</label>
            <input type="text" name="satisfy_rate" class="form-control">
        </div>
        <div class="form-group">
            <label>商品图片</label>
            <input type="file" name="goods_img" class="form-control">
        </div>
        <div class="form-group">
            <label>状态</label>
            <input type="radio" name="status" checked value="1" >上架
            <input type="radio" name="status" checked value="0" >下架
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop