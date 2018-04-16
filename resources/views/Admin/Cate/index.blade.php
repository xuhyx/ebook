@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '个人商城--分类管理')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏--}}
@section('class3', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '分类管理')

{{--这里修改主要内容--}}
@section('name', '分类')

{{--这里修改主要内容class--}}
@section('class_li1', 'btn-info')


{{--这里修改url--}}
@section('url','/Admin/Cate')

{{--这里修改count--}}
@section('count')
{{$count??$cateCount}}
@endsection

{{--这里添加按钮--}}
@section('add')
    <a href="{{--这里传递url--}}@yield('url')/create" class="btn @yield('class_li2')" >
        <i class="material-icons">add</i>添加@yield('name')
    </a>
@endsection

{{--这里修改搜索内容--}}
@section('option')
    <option value="id" selected>ID</option>
    <option value="pid">父分类</option>
    <option value="path">路径</option>
    <option value="name">类型名称</option>
@endsection

{{--这里插入搜索框--}}
@section('search_form')
    @include('Admin.Layouts.search')
@endsection

{{--这里修改主体内容--}}
@section('content')
    <div class="row">
        @include('Admin.Layouts.header')
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header" data-background-color="blue">
                    @if(isset($pathName))
                        <p class="category pull-right">
                            @foreach($pathName as $v)
                                @if($v['pid']==0)
                                <a href="{{url('/Admin/Cate')}}">{{$v['name']}}</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                                @else
                                <a href="{{url('/Admin/Cate/details/'.$v['pid'])}}">{{$v['name']}}</a>&nbsp;&nbsp;/&nbsp;&nbsp;
                                @endif
                            @endforeach
                        </p>
                    @endif

                        <h4 class="title">@yield('name')列表</h4>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>分类名称</th>
                        <th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        @if(count($res)==0)
                            <tr>
                                <td class="text-center" colspan="2  ">--该父类先暂无分类--</td>
                                <td class="text-center">
                                    <button type="button" rel="tooltip" title="添加类别" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/Cate/add/'.$pid)}}"><i class="material-icons">add</i></a>
                                    </button>
                                </td>
                            <tr>
                        @else
                        @foreach($res as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td>{{$v['name']}}</td>
                                <td style="display: flex;justify-content: center">
                                    <button type="button" rel="tooltip" title="查看分类" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/Cate/details/'.$v['id'])}}"><i class="material-icons">search</i></a>
                                    </button>
                                    <button type="button" rel="tooltip" title="添加类别" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/Cate/add/'.$v['id'])}}"><i class="material-icons">add</i></a>
                                    </button>
                                    <button type="button" rel="tooltip" title="编辑" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/Cate/'.$v['id'].'/edit')}}"><i class="material-icons">edit</i></a>
                                    </button>

                                    <form action="{{url('/Admin/Cate/'.$v['id'])}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" rel="tooltip" title="删除" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach
                        @endif
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection
