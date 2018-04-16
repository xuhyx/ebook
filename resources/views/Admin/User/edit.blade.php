@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '修改用户信息')

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

    <div class="col-md-12">
        <div class="row">
            @include('Admin.Layouts.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">修改用户信息</h4>
                        <p class="category"></p>
                    </div>
                    <div class="card-content">
                        <form action="{{url('/Admin/User/'.$data['id'])}}" method="post" enctype = "multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">昵称</label>
                                    <input type="text" class="form-control" name="name" value="{{$data['name']}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">邮箱</label>
                                    <input type="text" class="form-control" name="email" value="{{$data['email']}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">密码</label>
                                    <input type="password" class="form-control" name="password" value="{{$data['password']}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">手机</label>
                                    <input type="text" class="form-control" name="telephone" value="{{$data['telephone']}}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">状态</label>
                                    <div class="row">
                                        <label class="status col-md-2"><input value="0" type="radio" class="" name="status" {{$data['status']==0?'checked':''}}>锁定</label>
                                        <label class="status col-md-2"><input value="1" type="radio" class="" name="status" {{$data['status']==1?'checked':''}}>激活</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">上传头像</label>
                                    <input type="text" class="form-control" disabled id="picname">
                                    <input type="file" class="form-control" name="picture" id="picture">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">用户权限</label>
                                    <div class="row">
                                        <label class="status col-md-2"><input value="0" type="radio" class="" name="auth" {{$data['auth']==0?'checked':''}}>超级管理员</label>
                                        <label class="status col-md-2"><input value="1" type="radio" class="" name="auth" {{$data['auth']==1?'checked':''}}>系统管理员</label>
                                        <label class="status col-md-2"><input value="2" type="radio" class="" name="auth" {{$data['auth']==2?'checked':''}}>会员</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <button type="submit" class="btn btn-info pull-right">提 交</button>
                                <button type="reset" class="btn btn-info pull-right">重 置</button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-profile">
                    <div class="card-avatar">
                        <a href="#pablo">
                            <img class="img" src="{{URL::asset('/Libs/Uploads/headerPic/'.$data['picture'])}}" />
                        </a>
                    </div>
                    <div class="content">
                        <h6 class="category text-gray row"><span class="col-md-3 col-md-offset-3">状态：{{$data['status']==0?'锁定':'激活'}}</span><span class="col-md-4">权限：@if($data['auth']==0)超级管理员@elseif($data['auth']==1)系统管理员@else会员@endif</span></h6>
                        <h4 class="card-title">{{$data['name']}}</h4>
                        <h4 class="card-title">{{$data['email']}}</h4>
                        <p class="card-content">{{$data['telephone']}}</p>
                        <form action="{{url('/Admin/User/'.$data['id'])}}" method="post">
                            {{csrf_field()}}
                            {{method_field('DELETE')}}
                            <button type="submit" rel="tooltip" title="删除" class="btn btn-info pull-center">删除用户</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('javascript')

@endsection
