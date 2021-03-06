@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '修改轮播图信息')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏class--}}
@section('class7', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '轮播图管理')

{{--这里修改主要内容--}}
@section('name', '轮播图')

{{--这里修改主要内容class--}}

{{--这里添加按钮--}}
@section('add')
    <a href="{{--这里传递url--}}@yield('url')/create" class="btn @yield('class_li2')" >
        <i class="material-icons">add</i>添加@yield('name')
    </a>
@endsection

{{--这里修改url--}}
@section('url','/Admin/Banner')

{{--这里修改count--}}
@section('count')
    {{$bannerCount}}
@endsection

{{--这里修改主体内容--}}
@section('content')

    <div class="col-md-9">
        <div class="row">
            @include('Admin.Layouts.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" data-background-color="blue">
                        <h4 class="title">修改轮播图信息</h4>
                        <p class="category"></p>
                    </div>
                    <div class="card-content">
                        <form action="{{url('/Admin/Banner/'.$data['id'])}}" method="post" enctype = "multipart/form-data">
                            {{csrf_field()}}
                            {{method_field('PUT')}}
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">上传图片</label>
                                    <div class="col-md-4" style="padding-left: 80px">
                                        <img class="pic" src="{{URL::asset('/Libs/Uploads/BannerPic/'.$data->name)}}">
                                    </div>
                                    <input type="text" class="form-control" disabled id="picname">
                                    <input type="file" class="form-control" name="name" id="picture" >
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">类型</label>
                                    <div class="row">
                                        <label class="status col-md-2"><input value="0" type="radio" class="" name="type_id" {{$data['type_id']==0?'checked':''}}> 首页图片</label>
                                        <label class="status col-md-2"><input value="1" type="radio" class="" name="type_id" {{$data['type_id']==1?'checked':''}}> 广告图片</label>
                                        <label class="status col-md-2"><input value="2" type="radio" class="" name="type_id" {{$data['type_id']==2?'checked':''}}> 详情页图片</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group label-floating">
                                    <label class="control-label">状态</label>
                                    <div class="row">
                                        <label class="status col-md-2"><input value="-1" type="radio" class="" name="flag" {{$data['flag']==-1?'checked':''}}> 锁定</label>
                                        <label class="status col-md-2"><input value="1" type="radio" class="" name="flag" {{$data['flag']==1?'checked':''}}> 激活</label>
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
    </div>
    </div>
@endsection

@section('javascript')

@endsection
