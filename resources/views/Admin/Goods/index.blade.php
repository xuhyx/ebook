@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '书籍列表')

{{--这里修改样式--}}

{{--这里修改侧边栏--}}
@section('class5', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '书籍管理')

{{--这里修改主要内容--}}
@section('name', '书籍')

{{--这里修改主要内容class--}}
@section('class_li1', 'btn-info')

{{--这里修改url--}}
@section('url','Goods')

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

{{--这里修改搜索内容--}}
@section('option')
	<option value="id" selected>ID</option>
	<option value="gname">书名</option>
	<option value="gauthor">作者</option>
	<option value="isSale">是否上架</option>
	<option value="isHot">是否热销</option>
	<option value="isNew">是否新品</option>
	<option value="cate">所属类别</option>
	<option value="press">出版社</option>
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
                        	<th>商品名称</th>
                        	<th>作者</th>
                        	<th>商品价格</th>
                        	<th>商品库存</th>
                        	<th>所属类别</th>
                        	<th>出版社</th>
                        	<th>总销售量</th>
                        	<th>访问量</th>
                        	<th>评论量</th>
                        	<th class="text-center">操作</th>
                        </thead>
                        <tbody>
                        	@forelse($res as $v)
                            <tr>
                            	<td>{{$v['id']}}</td>
                            	<td>
                            		<a href="{{url('/Admin/Goods/'.$v['id'])}}" title="点击查看商品详情" rel="tooltip">{{str_limit($v['gname'],20)}}</a>
                            	</td>
                            	<td title="{{$v['gauthor']}}">{{str_limit($v['gauthor'],20)}}</td>
                            	<td>￥{{$v['gPrise']}}</td>
                            	<td>{{$v['gstock']}}</td>

                            	<td>{{$v->cate->name}}</td>
                            	<td>{{$v->press->name}}</td>
                            	<td>{{$v['saleNum']}}</td>
                            	<td>{{$v['visitNum']}}</td>
                            	<td>
                            		<a href="{{url('/Admin/Comment?&search='.$v->id.'&searchCondition=goodsid')}}" title="查看评论" rel="tooltip">{{$v->comment->count()}}</a>
                            	</td>
                            	<td style="display: flex;justify-content: center">
									@if($v['isSale']==0)
										<button type="button" rel="tooltip" title="上架" class="btn btn-primary btn-simple btn-xs btn-form" >
											<a href="{{url('/Admin/sale/'.$v['id'])}}" >sale</a>
										</button>
									@else
										<button type="button" rel="tooltip" title="下架" class="btn btn-primary btn-simple btn-xs btn-form" >
											<a href="{{url('/Admin/unSale/'.$v['id'])}}" >no sale</a>
										</button>
									@endif
									@if($v['isHot']==0)
										<button type="button" rel="tooltip" title="热销" class="btn btn-primary btn-simple btn-xs btn-form" >
											<a href="{{url('/Admin/hot/'.$v['id'])}}" >hot</a>
										</button>
									@else
										<button type="button" rel="tooltip" title="取消热销" class="btn btn-primary btn-simple btn-xs btn-form" >
											<a href="{{url('/Admin/unHot/'.$v['id'])}}" >no hot</a>
										</button>
									@endif
									@if($v['isNew']==0)
										<button type="button" rel="tooltip" title="新品" class="btn btn-primary btn-simple btn-xs btn-form" >
											<a href="{{url('/Admin/new/'.$v['id'])}}" >new</a>
										</button>
									@else
										<button type="button" rel="tooltip" title="取消新品" class="btn btn-primary btn-simple btn-xs btn-form" >
											<a href="{{url('/Admin/unNew/'.$v['id'])}}" >no new</a>
										</button>
									@endif
                            		<button type="button" rel="tooltip" title="编辑" class="btn btn-primary btn-simple btn-xs btn-form" >
										<a href="{{url('/Admin/Goods/'.$v['id'].'/edit')}}" ><i class="material-icons">edit</i></a>
									</button>
									<form action="{{url('/Admin/Goods/'.$v['id'])}}" method="post">
										{{csrf_field()}}
										{{method_field('DELETE')}}
										<button type="submit" rel="tooltip" title="删除" class="btn btn-danger btn-simple btn-xs">
											<i class="material-icons">close</i>
										</button>
									</form>
                            	</td>
                            </tr>
							@empty
								<tr><td colspan="11" class="text-center">——没有书籍——</td></tr>
                           @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
       @include('Admin.Layouts.page')
    </div>
@endsection