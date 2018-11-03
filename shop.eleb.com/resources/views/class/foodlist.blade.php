@extends('layout.default')
@section('contents')
    @include('layout._nav')
    <form method="get">
        分类名<input type="text" name="name"/>
        <input type="submit" value="搜索">
        </form>
    <table class="table table-bordered table-striped">
        <tr>
            <th>id</th>
            <th>分类名称</th>
            <th>菜品编号</th>
            <th>描述</th>
            <th>是否是默认分类</th>
            <th>操作</th>
        </tr>
        @foreach ($menucategories as $menucategorie)
            <tr>
                <td>{{$menucategorie->id}}</td>
                <td>{{$menucategorie->name}}</td>
                <td>{{$menucategorie->type_accumulation}}</td>
                <td>{{$menucategorie->description}}</td>
                <td>{{$menucategorie->is_selected==1?'是':'否'}}</td>

                <td><a href="{{ route('menucategories.Delete',$menucategorie) }}"class="btn btn-danger btn-xs">删除</a>/
                <a href=" "class="btn btn-danger btn-xs">修改</a>/
                <a href="{{ route('menus.LookFood',compact('menucategorie')) }}"class="btn btn-danger btn-xs">查看菜品详情</a>
                </td>



            </tr>
        @endforeach
    </table>
    {{ $menucategories->appends(['name'=>request()->name])->links() }}
@stop