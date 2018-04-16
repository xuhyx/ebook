@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '轮播图管理')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏--}}
@section('class7', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '轮播图管理')

{{--这里修改主要内容--}}
@section('name', '轮播图')

{{--这里修改主要内容class--}}
@section('class_li1', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/Banner')

{{--这里修改count--}}
@section('count')
{{$count??$bannerCount}}
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
    <option value="type">类型</option>
    <option value="flag">是否禁用</option>
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
                        <th>缩略图</th>
                        <th>图片名称</th>
                        <th>类型</th>
                        <th>状态</th>
                        <th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        @forelse($res as $v)
                            <tr>
                                <td>{{$v['id']}}</td>
                                <td  class="col-md-3">
                                    <a href="{{URL::asset('Libs/Uploads/BannerPic/'.$v->name)}}" class="img-rounded">
                                        <img src="{{URL::asset('Libs/Uploads/BannerPic/'.$v->name)}}">
                                    </a>
                                </td>
                                <td>{{$v['name']}}</td>
                                <td>{{picType($v['type_id'])}}</td>
                                <td>{{$v['flag']==-1?'锁定':'激活'}}</td>
                                <td class="col-md-2">
                                    <div class="col-md-4 text-center">
                                        @if($v->flag==-1)
                                            <button type="button" rel="tooltip" title="激活" class="btn btn-primary btn-simple btn-xs btn-form" >
                                                <a href="{{url('/Admin/Banner/active/'.$v['id'])}}"><i class="material-icons">lock_outline</i></a>
                                            </button>
                                        @else
                                            <button type="button" rel="tooltip" title="锁定" class="btn btn-primary btn-simple btn-xs btn-form" >
                                                <a href="{{url('/Admin/Banner/lock/'.$v['id'])}}"><i class="material-icons">lock_open</i></a>
                                            </button>
                                        @endif
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <button type="button" rel="tooltip" title="编辑" class="btn btn-primary btn-simple btn-xs btn-form" >
                                            <a href="{{url('/Admin/Banner/'.$v['id'].'/edit')}}"><i class="material-icons">edit</i></a>
                                        </button>
                                    </div>
                                    <div class="col-md-4 text-center">
                                        <form action="{{url('/Admin/Banner/'.$v['id'])}}" method="post">
                                            {{csrf_field()}}
                                            {{method_field('DELETE')}}
                                            <button type="submit" rel="tooltip" title="删除" class="btn btn-danger btn-simple btn-xs">
                                                <i class="material-icons">close</i>
                                            </button>
                                        </form>
                                    </div>



                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="6" class="text-center">——没有任何图片——</td></tr>
                        @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        @include('Admin.Layouts.page')
    </div>
@endsection
