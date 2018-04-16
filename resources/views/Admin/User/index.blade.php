@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '用户管理')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏--}}
@section('class2', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '用户管理')

{{--这里修改主要内容--}}
@section('name', '用户')

{{--这里修改主要内容class--}}
@section('class_li1', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/User')

{{--这里修改count--}}
@section('count')
{{$count??$userCount}}
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
    <option value="name">昵称</option>
    <option value="email">邮箱</option>
    <option value="status">状态</option>
    <option value="auth">权限</option>
    <option value="phone">手机号</option>
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
                    <h4 class="title">@yield('name')列表</h4>
                    <p class="category"></p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <th>ID</th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>状态</th>
                        <th>权限</th>
                        <th>电话</th>
                        <th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        @foreach($res as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td>{{$v['name']}}</td>
                                <td>{{$v['email']}}</td>
                                <td>{{$v['status']==0?'锁定':'激活'}}</td>
                                <td>@if($v['auth']==0)超级管理员@elseif($v['auth']==1)系统管理员@else会员@endif</td>
                                <td>{{$v['telephone']}}</td>
                                <td style="display: flex;justify-content: center">

                                    <button type="button" rel="tooltip" title="编辑" class="btn btn-primary btn-simple btn-xs btn-form" >
                                        <a href="{{url('/Admin/User/'.$v['id'].'/edit')}}"><i class="material-icons">edit</i></a>
                                    </button>

                                    <form action="{{url('/Admin/User/'.$v['id'])}}" method="post">
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
