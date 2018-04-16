@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '文章详情')

{{--这里修改样式--}}
@section('style')

@endsection
{{--这里修改侧边栏class--}}
@section('class4', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '文章管理')

{{--这里修改主要内容--}}
@section('name', '文章')

{{--这里修改url--}}
@section('url','/Admin/Article')

{{--这里修改count--}}
@section('count')
{{$articleCount}}
@endsection

{{--这里修改主要内容class--}}

{{--这里添加按钮--}}
@section('add')
	<a href="{{--这里传递url--}}@yield('url')/create" class="btn @yield('class_li2')" >
		<i class="material-icons">add</i>添加@yield('name')
	</a>
@endsection

{{--这里添加我的文章按钮--}}
@section('myArticle')
	<a href="{{--这里传递url--}}@yield('url')/myArticle" class="btn @yield('class_li3')" >
		我发布的@yield('name')
	</a>
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
		<div class="card card-profile">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="card-square">
						<a href="{{URL::asset('/Libs/Uploads/articlePic/'.$data['picture'])}}">
							<img class="img img-rounded" src="{{URL::asset('/Libs/Uploads/articlePic/'.$data['picture'])}}" />
						</a>
					</div>
				</div>
			</div>
	
			<div class="content">
				<h4 class="card-title">{{$data['title']}}</h4>
				<h6 class="category text-gray"><span>作者： {{$data->user->name}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp<span>所属分类： {{$data->cates->name}}</span></h6>

				<h6 class="category text-gray"><span>发布时间：{{$data['created_at']}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp<span>更新时间：{{$data['updated_at']}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp<span>阅读量：{{$data['click_num']}}</span>&nbsp&nbsp&nbsp&nbsp&nbsp<span>评论量：{{$data['replay_num']}}</span></h6>
				<div class="card-content">简介：{!!$data['descr']!!}</div>
				<div class="card-content text-left" >{!!$data['content']!!}</div>
				<div class="row" style="display: flex;justify-content: center">

						@if($data['flag']==0)
							<button type="submit" rel="tooltip" class="btn btn-info pull-center" >
								<a href="{{url('/Admin/Article/verify/'.$data['id'])}}" style="color: #fff;">审核</a>
							</button>
						@else
							<button type="submit" rel="tooltip" class="btn btn-info pull-center" >
								<a href="{{url('/Admin/Article/unVerify/'.$data['id'])}}" style="color: #fff;">下架</a>
							</button>
						@endif

					@if(Auth::id()==$data['user_id'])
					<button type="button" rel="tooltip" class="btn btn-info pull-center" >
						<a href="{{url('/Admin/Article/'.$data['id'].'/edit')}}" style="color: #fff;">编辑文章</a>
					</button>
					@endif
					<form action="{{url('/Admin/Article/'.$data['id'])}}" method="post">
						{{csrf_field()}}
						{{method_field('DELETE')}}
						<button type="submit" rel="tooltip" class="btn btn-info pull-center">
							删除文章
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
