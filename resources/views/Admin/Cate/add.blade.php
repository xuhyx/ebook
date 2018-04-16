@extends('Admin.Layouts.app')

{{--这里修改title--}}
@section('title', '添加分类')

{{--这里修改侧边栏class--}}
@section('class3', 'active')

{{--这里修改主体内容标题--}}
@section('main_title', '分类管理')

{{--这里修改主要内容--}}
@section('name', '分类')

{{--这里修改主要内容class--}}
@section('class_li2', 'btn-info')

{{--这里修改url--}}
@section('url','/Admin/Cate')

{{--这里添加按钮--}}
@section('add')
    <a href="{{--这里传递url--}}@yield('url')/create" class="btn @yield('class_li2')" >
        <i class="material-icons">add</i>添加@yield('name')
    </a>
@endsection

{{--这里修改count--}}
@section('count')
    {{$cateCount}}
@endsection

{{--这里修改主体内容--}}
@section('content')
    <div class="row">
        <div class="col-md-9">
            @include('Admin.Layouts.header')
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-header" data-background-color="blue">
                    <h4 class="title">添加分类信息</h4>
                    <p class="category"></p>
                </div>
                <div class="card-content">
                    <form action="{{url('/Admin/Cate')}}" method="post" enctype = "multipart/form-data">
                        {{csrf_field()}}
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">类名</label>
                                <input type="text" class="form-control" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group label-floating">
                                <label class="control-label">选择父类</label>
                                <div class="row" id="select" data-path="0">
                                    <div class="col-md-3">
                                        <select id="search-type" class="select form-control" data-placeholder="Search Type" name="pid">
                                            @if($flag==0)
                                                <option value="0" selected >--请选择(添加父类)--</option>
                                            @else
                                                <option value="{{$id}}" selected ">--请选择(添加父类)--</option>
                                            @endif
                                            @foreach($cates as $v)
                                                <option value="{{$v['id']}}" >{{$v['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12">
                            <button type="submit" class="btn btn-info pull-right" >提 交</button>
                            <button type="reset" class="btn btn-info pull-right">重 置</button>
                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
{{--这里修改javescript--}}

@section('javascript')
    <script type="text/javascript">
        $('#select').on('change','.select',function(){
            $(this).parent('.col-md-3').nextAll('.col-md-3').remove();
            var val=$(this).val();
            $.get('/Admin/Cate/json/'+val,function(data){
                if(data!=''){
                    var html='<div class="col-md-3">' +
                        '<select id="search-type" class="select form-control" data-placeholder="Search Type" name="pid" >'+
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
