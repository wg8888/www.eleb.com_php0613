@extends('layout.default')

@section('contents')
    @include ('layout._nav')
    @include('layout._errors')
    <form method="post" enctype="multipart/form-data" action="{{ route('shopcategorie.AddTo') }}">
        <div class="form-group">
            <label>	分类名称</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="form-group">
            <label>是否显示</label>
            <input type="radio" name="status" checked value="1" >显示
            <input type="radio" name="status" checked value="0" >隐藏
        </div>
        <div class="form-group">
            <label>分类图片</label>
            <input type="file" name="img" class="form-control">
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop