@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '添加用户')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏class--}}
@section('class2', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '用户管理')

{{--这里修改主要内容--}}
@section('name', '用户')

{{--这里修改主要内容class--}}
@section('class_li2', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/User')

{{--这里修改count--}}
@section('count')
    {{$userCount}}
@endsection

{{--这里添加按钮--}}
@section('add')
    <a href="{{--这里传递url--}}@yield('url')/create" class="btn @yield('class_li2')" >
        <i class="material-icons">add</i>添加@yield('name')
    </a>
@endsection

{{--这里修改主体内容--}}
@section('content')

    <div class="row">
        <div class="col-md-9">
            @include('Admin.Layouts.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">添加用户信息</h4>
                    <p class="category"></p>
                </div>
                <div class="card-content">
                    <form action="{{url('/Admin/User')}}" method="post" enctype = "multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">昵称</label>
                                <input type="text" class="form-control" name="name" value="{{old('nickname')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">邮箱</label>
                                <input type="text" class="form-control" name="email" value="{{old('email')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">输入密码</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">再次输入密码</label>
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">手机</label>
                                <input type="text" class="form-control" name="telephone" value="{{old('telephone')}}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">上传头像</label>
                                <input type="text" class="form-control" disabled id="picname">
                                <input type="file" class="form-control" name="picture" id="picture" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">权限</label>
                                <div class="row">
                                    <label class="status col-md-2"><input value="0" type="radio" class="" name="auth"> 超级管理员</label>
                                    <label class="status col-md-2"><input value="1" type="radio" class="" name="auth"> 系统管理员</label>
                                    <label class="status col-md-2"><input value="2" type="radio" class="" name="auth"> 会员</label>
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <button type="submit" class="btn btn-info pull-right" >提 交</button>
                            <button type="reset" class="btn btn-default pull-right">重 置</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
{{--这里修改javescript--}}

@section('javascript')

@endsection
