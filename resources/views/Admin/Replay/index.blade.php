@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '回复列表')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏--}}
@section('class9', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '回复管理')

{{--这里修改主要内容--}}
@section('name', '回复')

{{--这里修改主要内容class--}}
@section('class_li1', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/Replay')

{{--这里修改count--}}
@section('count')
{{$count??$replayCount}}
@endsection

{{--这里修改搜索内容--}}
@section('option')
	<option value="id" selected>ID</option>
	<option value="user_id">回复人</option>
	<option value="commend_id">回复评论编号</option>
	<option value="created_at">回复时间</option>
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
                        	<th>回复人</th>
                        	<th>回复评论id</th>
                        	<th>内容</th>
                        	<th>回复时间</th>
                        	<th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        	@foreach($res as $v)
                            <tr>
                            	<td>{{$v['id']}}</td>
                            	<td style="max-width: 100px">{{$v->user->name}}</td>
								<td style="max-width: 100px">{{$v->comment_id}}</td>
                            	<td style="max-width: 400px">{{str_limit($v['rplContent'],30)}}</td>
                            	<td>{{$v['created_at']}}</td>
                            	<td class="text-right" style="display: flex;justify-content: center">
									<form action="{{url('/Admin/Comment/'.$v['id'])}}" method="post">
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