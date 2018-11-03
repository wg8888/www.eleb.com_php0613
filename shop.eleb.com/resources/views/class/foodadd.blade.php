@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post" enctype="multipart/form-data" action="{{ route('menucategories.FoodUpdate') }}">
        <div class="form-group">
            <label>	分类名称</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>	菜品编号</label>
            <input type="text" name="type_accumulation" class="form-control">
        </div>
        <div class="form-group">
            <input type="hidden" name="shop_id" class="form-control" value="{{ $id->id }}">
        </div>
        <div class="form-group">
            <label>	描述</label>
            <input type="text" name="description" class="form-control">
        </div>
        <div class="form-group">
            <label>是否默认分类</label>
            <input type="radio" name="is_selected" checked value="1" >是
            <input type="radio" name="is_selected" checked value="0" >不是
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop