@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '添加书籍')

{{--这里修改样式--}}

{{--这里修改侧边栏class--}}
@section('class5', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '书籍管理')

{{--这里修改主要内容--}}
@section('name', '书籍')

{{--这里修改url--}}
@section('url','/Admin/Goods')

{{--这里修改主要内容class--}}
@section('class_li2', 'btn-info')

{{--这里修改count--}}
@section('count')
{{$goodsCount}}
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
		<div class="col-md-12">
			@include('Admin.Layouts.header')
		</div>
	</div>
<div class="row">

    <div class="col-md-12">
        <div class="card">
            <div class="card-header" data-background-color="blue">
                <h4 class="title">添加书籍信息</h4>
				<p class="category"></p>
            </div>
            <div class="card-content">
                <form action="{{url('/Admin/Goods')}}" method="post" enctype = "multipart/form-data">
                	{{csrf_field()}}
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">书籍名称</label>
							<input type="text" class="form-control" name="gname" value="{{old('gname')}}">
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">作者</label>
							<input type="text" class="form-control" name="gauthor" value="{{old('gauthor')}}">
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">价格</label>
							<input type="text" class="form-control" name="gPrise" value="{{old('gPrise')}}">
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">库存</label>
							<input type="text" class="form-control" name="gstock" value="{{old('gstock')}}">
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">是否上架</label>
							<div class="row">
								<label class="status col-md-1"><input value="0" type="radio" class="" name="isSale" {{old('isSale')==0?'checked':''}}>否</label>
								<label class="status col-md-1"><input value="1" type="radio" class="" name="isSale" {{old('isSale')==1?'checked':''}}>是</label>
							</div>
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">是否热销</label>
							<div class="row">
								<label class="status col-md-1"><input value="0" type="radio" class="" name="isHot" {{old('isHot')==0?'checked':''}}>否</label>
								<label class="status col-md-1"><input value="1" type="radio" class="" name="isHot" {{old('isHot')==1?'checked':''}}>是</label>
							</div>
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">是否新品</label>
							<div class="row">
								<label class="status col-md-1"><input value="0" type="radio" class="" name="isNew" {{old('isNew')==0?'checked':''}}>否</label>
								<label class="status col-md-1"><input value="1" type="radio" class="" name="isNew" {{old('isNew')==1?'checked':''}}>是</label>
							</div>
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">所属分类</label>
							<div class="row" id="select">
								<div class="col-md-3">
									<select id="search-type" class="select form-control" data-placeholder="Search Type" name="cate_id">
										<option value="0" selected>--请选择(添加父类)--</option>
										@if(count($cates)==1)
											<option value="{{$cates[0]['id']}}"  selected>{{$cates[0]['name']}}</option>
										@else
											@foreach($cates as $v)
												<option value="{{$v['id']}}">{{$v['name']}}</option>
											@endforeach
										@endif
									</select>
								</div>
							</div>
						</div>
                    </div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">出版社</label>
							<div class="row" id="select2">
								<div class="col-md-3">
									<select id="search-type" class="select form-control" data-placeholder="Search Type" name="press_id">
										<option value="0" selected>--请选择出版社--</option>
										@foreach($presses as $v)
											<option value="{{$v['id']}}" {{old('brandId')==$v['id']?'selected':''}}>{{$v['name']}}</option>
										@endforeach
									</select>
								</div>
								<button type="button"  class="btn brandId btn-default"> + 添加出版社</button>
							</div>
						</div>
                    </div>
                    
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">配图</label>
							<input type="text" class="form-control" disabled id="picname">
							<input type="file" class="form-control" name="gimg" id="picture">
						</div>
               		</div>
                    <div class="col-md-12">
						<div class="form-group label-floating">
							<label class="control-label">详情</label>
							<textarea id="div1" class="form-control" name="gDesc" rows="12">{{old('gDesc')}}</textarea>
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

	<script type="text/JavaScript">
		$(function () {
			//加载编辑器
            var editor = new wangEditor('div1');
            editor.create();

            //添加出版社
		$('#select2').on('click','.brandId',function(){
			var html='<div class="col-md-4"> <input type="text" class="form-control" name="press_name" placeholder="请输入出版社名称"></div>';
			$('#select2').append(html);
			$(this).remove();
		})
        });

        //加载所属类别
        $('#select').on('change','.select',function(){
            $(this).parent('.col-md-3').nextAll('.col-md-3').remove();
            var val=$(this).val();
            $.get('/Admin/Cate/json/'+val,function(data){
                console.log(11111)
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