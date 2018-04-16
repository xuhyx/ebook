@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '书籍添加')

{{--这里修改样式--}}


{{--这里修改侧边栏--}}
@section('class5', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '书籍管理')

{{--这里修改主要内容--}}
@section('name', '书籍')

{{--这里修改主要内容class--}}


{{--这里修改url--}}
@section('url','/Admin/Goods')

{{--这里修改count--}}
@section('count')
{{$count??$goodsCount}}
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
        <div class="col-md-12">
			<div class="card">
				<div class="card-header" data-background-color="blue">
					<h4 class="title">@yield('name')详情</h4>
					<p class="category"></p>
				</div>
				<div class="card-profile">
				<div class="col-md-12">
					<div class="row">
						<div class="col-sm-3 col-sm-offset-1">
								<a href="{{URL::asset('/Libs/Uploads/goodsPic/'.$goods['gimg'])}}" class="thumbnail">
									<img class="img-rounded" src="{{URL::asset('/Libs/Uploads/goodsPic/'.$goods['gimg'])}}">
								</a>
						</div>
						<div class="col-sm-7">
							<div class="page text-left">
								<h3>《{{$goods['gname']}}》<small>作者：{{$goods['gauthor']}}</small></h3>
								<p><span style="padding-right: 30px">出版社：{{$goods->press->name}}</span><span>上架时间：{{$goods['updated_at']}}</span></p>
								<p><span style="padding-right: 30px">点击量：{{$goods['visitNum']}}</span><span>评论量：<a href="##" title="查看评论" rel="tooltip">{{$goods['appraiseNum']}}</a></span></p>
								<p><span style="padding-right: 30px">已销售：{{$goods['saleNum']}}</span><span>库存：{{$goods['gstock']}}</p>
								<p><span>所属类别：{{$goods['cate_name']}}</p>
								<div class="well">
									<p>价格</p>
									<h3 class="text-danger">￥<i>{{$goods['gPrise']}}</i></h3>
								</div>
							</div>
						</div>
					</div>
						<div class="card-content text-left" >
							<div class="col-md-10 col-md-offset-1">
								{!!$goods['gDesc']!!}
							</div>
						</div>
						<div class="row ">
							<div class="col-md-2 col-md-offset-4">
								<button type="button" rel="tooltip" title="编辑" class="btn btn-info " >
									<a href="{{url('/Admin/Goods/'.$goods['id'].'/edit')}}" style="color: #fff;">编辑书籍信息</a>
								</button>
							</div>
							<div class="col-md-2">
								<form action="{{url('/Admin/Goods/'.$goods['id'])}}" method="post">
									{{csrf_field()}}
									{{method_field('DELETE')}}
									<button type="submit" rel="tooltip" title="删除" class="btn btn-danger ">
										删除书籍
									</button>
								</form>
							</div>


						</div>
				</div>

	        </div>
	        
        </div>
		</div>
    </div>
@endsection