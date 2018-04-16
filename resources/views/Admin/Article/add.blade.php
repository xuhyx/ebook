@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '添加文章')

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

{{--这里修改主要内容class--}}
@section('class_li2', 'btn-info')

{{--这里修改count--}}
@section('count')
{{$articleCount}}
@endsection

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
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">添加文章信息</h4>
				<p class="category"></p>
            </div>
            <div class="card-content">
                <form action="{{url('/Admin/Article')}}" method="post" enctype = "multipart/form-data">
                	{{csrf_field()}}
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">标题</label>
							<input type="text" class="form-control" name="title" value="{{old('title')}}">
						</div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">所属分类</label>
                            <div class="row" id="select">
                                <div class="col-md-3">
                                    <select id="search-type" class="select form-control" data-placeholder="Search Type" name="cate_id">
                                        <option value="0" selected >--请选择(添加父类)--</option>
                                        @foreach($cates as $v)
                                            <option value="{{$v['id']}}" >{{$v['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group label-floating">
                            <label class="control-label">是否公开</label>
                            <div class="row">
                                <div class="col-md-1">
                                    <label><input type="radio" class="" name="state" value="0">私有</label>
                                </div>
                                <div class="col-md-1">
                                    <label><input type="radio" class="" name="state" value="1">公开</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">文章配图</label>
							<input type="text" class="form-control" disabled id="picname">
                            <input type="file" class="form-control" name="picture" id="picture">
						</div>
               		</div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">文章简介</label>
							<input type="text" class="form-control" name="descr" value="{{old('descr')}}" >
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">文章内容</label>
							<textarea id="div1" class="form-control" name="content" rows="12">{{old('content')}}</textarea>
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
@endsection

@section('javascript')

	<script type="text/javascript">
		$(function () {
            var editor = new wangEditor('div1');
            editor.create();
        });
        $('#select').on('change','.select',function(){
            $(this).parent('.col-md-3').nextAll('.col-md-3').remove();
            var val=$(this).val();
            $.get('/Admin/Cate/json/'+val,function(data){
                if(data!=''){
                    var html='<div class="col-md-3">' +
                        '<select id="search-type" class="select form-control" data-placeholder="Search Type" name="cate_id" >'+
                        '<option value="'+val+'" selected>--请选择(添加子类)--</option>'
                    for(var i=0;i<data.length;i++){
                        html+='<option value="'+data[i]['id']+'">'+data[i]['name']+'</option>';
                    }
                    html+='</select></div>';
                    $('#select').append(html);
                }
            })
        })
	</script>
@endsection