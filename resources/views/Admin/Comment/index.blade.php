@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '评论列表')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏--}}
@section('class8', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '评论管理')

{{--这里修改主要内容--}}
@section('name', '评论')

{{--这里修改主要内容class--}}
@section('class_li1', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/Comment')

{{--这里修改count--}}
@section('count')
{{$count??$commentCount}}
@endsection

{{--这里修改搜索内容--}}
@section('option')
	<option value="id" selected>ID</option>
	<option value="user_id">评论人</option>
	<option value="goodsid">评论书籍编号</option>
	<option value="articleid">评论文章编号</option>
	<option value="created_at">评论时间</option>
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
                        	<th>评论人</th>
                        	<th>评论类型</th>
                        	<th>评论文章或书籍标题</th>
                        	<th>评论内容</th>
                        	<th>评论时间</th>
                        	<th>回复量</th>
                        	<th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        	@foreach($res as $v)
                            <tr>
                            	<td>{{$v['id']}}</td>
                            	<td style="max-width: 100px">{{$v->user->name}}</td>
								<td style="max-width: 100px">{{$v->cmtType==0?'文章':'书籍'}}</td>
								<td>
									@if($v->cmtType==0)
										{{$v->article->title}}
									@else
										{{$v->goods->gname}}
									@endif
								</td>
                            	<td style="max-width: 400px">{{str_limit($v['cmtContent'],30)}}</td>
                            	<td>{{$v['created_at']}}</td>
                            	<td><a href="{{url('/Admin/Replay?&search='.$v->id.'&searchCondition=comment_id')}}" title="查看评论" rel="tooltip">{{$v->replay->count()}}</a> </td>
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