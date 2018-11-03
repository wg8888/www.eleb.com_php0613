@extends('layout.default')

@section('contents')
    @include('layout._errors')
    <form method="post" enctype="multipart/form-data" action="{{ route('shopcategorie.Update',[$shopcategorie]) }}">
        <div class="form-group">
            <label>	分类名称</label>
            <input type="text" name="name" class="form-control" value="{{ $shopcategorie->name}}">
        </div>
        <div class="form-group">
            <label>是否显示</label>
            <input type="radio" name="status" checked value="1" >显示
            <input type="radio" name="status" checked value="0" >隐藏
        </div>
        <div class="form-group">
            <label>分类图片</label>
            <img style="width: 80px;height: 60px" src="{{\Illuminate\Support\Facades\Storage::url($shopcategorie->img)}}"/>
            <input type="file" name="img" class="form-control" value="{{$shopcategorie->img}}"/>
        </div>
        {{ csrf_field() }}
        <button class="btn btn-primary">提交</button>
    </form>
@stop