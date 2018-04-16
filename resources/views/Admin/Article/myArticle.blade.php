@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '文章列表')

{{--这里修改侧边栏--}}
@section('class4', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '文章管理')

{{--这里修改主要内容--}}
@section('name', '文章')

{{--这里修改主要内容class--}}
@section('class_li3', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/Article')

{{--这里修改url--}}
@section('else','/myArticle')

{{--这里修改count--}}
@section('count')
    {{$articleCount}}
@endsection

{{--这里添加按钮--}}
@section('add')
    <a href="{{--这里传递url--}}@yield('url')/create" class="btn @yield('class_li2')" >
        <i class="material-icons">add</i>添加@yield('name')
    </a>
@endsection

{{--这里添加我的文章按钮--}}
@section('myArticle')
    <a href="{{--这里传递url--}}@yield('url')/myArticle" class="btn @yield('class_li3')" >
        我发布的@yield('name')&nbsp&nbsp&nbsp {{$count}}
    </a>
@endsection

{{--这里修改搜索内容--}}
@section('option')
    <option value="id" selected>文章ID</option>
    <option value="title">文章标题</option>
    <option value="cate">文章类型</option>
    <option value="descr">文章简介</option>
    <option value="flag">状态</option>
    <option value="created_at">上传时间</option>
@endsection

{{--这里插入搜索框--}}
@section('search_form')
    @include('Admin.Layouts.search')
@endsection

{{--这里修改主体内容--}}
@section('content')
    <div class="row">
        <div class="col-md-12">
            @include('Admin.Layouts.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card card-plain">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">@yield('name')列表</h4>
                    <p class="category"></p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>标题</th>
                        <th>作者</th>
                        <th>所属类型</th>
                        <th>简介</th>
                        <th>状态</th>
                        <th>审核</th>
                        <th>上传时间</th>
                        <th>阅读量</th>
                        <th>评论量</th>
                        <th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        @foreach($res as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td style="max-width: 100px;">
                                    <a href="{{url('/Admin/Article/'.$v['id'])}}" title="点击查看文章详情" rel="tooltip">{{str_limit($v['title'],20)}}</a>
                                </td>
                                <td style="max-width: 100px">{{Auth::user()->name}}</td>
                                <td style="max-width: 100px">{{$v->cates->name}}</td>
                                <td style="max-width: 400px">{{str_limit($v['descr'],30)}}</td>
                                <td style="max-width: 400px">{{$v['state']==0?'私有':'公开'}}</td>
                                <td>
                                    @if($v['flag']==0)
                                        未审核
                                    @elseif($v['flag']==1)
                                        审核
                                    @else
                                        锁定
                                    @endif
                                </td>
                                <td>{{$v['created_at']}}</td>
                                <td>{{$v['click_num']}}</td>
                                <td>
                                    <a href="" title="查看评论" rel="tooltip">{{$v['replay_num']}}</a>
                                </td>
                                <td style="display: flex;justify-content: center">
                                    <button type="button" rel="tooltip" title="审核" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/Article/'.$v['id'])}}" ><i class="material-icons">verified_user</i></a>
                                    </button>
                                    <button type="button" rel="tooltip" title="编辑" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/Article/'.$v['id'].'/edit')}}" ><i class="material-icons">edit</i></a>
                                    </button>
                                    <form action="{{url('/Admin/Article/'.$v['id'])}}" method="post">
                                        {{csrf_field()}}
                                        {{method_field('DELETE')}}
                                        <button type="submit" rel="tooltip" title="删除" class="btn btn-danger btn-simple btn-xs">
                                            <i class="material-icons">close</i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('Admin.Layouts.page')
    </div>
@endsection