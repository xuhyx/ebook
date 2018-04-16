<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', '网上书城') }}--@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Bootstrap core CSS     -->
{{--    <link href="{{ asset('/Admin/css/bootstrap.min.css') }}" rel="stylesheet" />--}}

    <!--  Material Dashboard CSS    -->
    <link href="{{ asset('/Admin/css/material-dashboard.css') }}" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="{{ asset('/Admin/css/demo.css') }}" rel="stylesheet" />

    <!--     Fonts and icons     -->
    <link href="{{ asset('/Admin/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href='{{ asset('/Admin/css/2d7207a20f294df196f3a53cae8a0def.css') }}' rel='stylesheet' type='text/css'>

    <!--     text editor     -->
    <link href="{{asset('/dist/css/wangEditor.css')}}" rel="stylesheet">

</head>
<body>
<div class="wrapper">

    <div class="sidebar" data-color="blue">
        <!--
            Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

            Tip 2: you can also add an image using data-image tag
        -->

        <div class="logo">
            <a href="#" class="simple-text">
                @if (Route::has('login'))
                    @if (Auth::check())
                        {{Auth::user()->name}}
                    @else
                       unknow
                    @endif
                @endif
            </a>
        </div>

        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="@yield('class1')">
                    <a href="{{url('Admin/Index')}}">
                        <i class="material-icons">Dashboard</i>
                        <p>主页</p>
                    </a>
                </li>
                <li class="@yield('class2')">
                    <a href="{{url('Admin/User')}}">
                        <i class="material-icons">person</i>
                        <p>用户管理</p>
                    </a>
                </li>
                <li class="@yield('class3')">
                    <a href="{{url('/Admin/Cate')}}">
                        <i class="material-icons">reorder</i>
                        <p>分类管理</p>
                    </a>
                </li>
                <li class="@yield('class4')">
                    <a href="{{url('/Admin/Article')}}">
                        <i class="material-icons">library_books</i>
                        <p>文章管理</p>
                    </a>
                </li>
                <li class="@yield('class5')">
                    <a href="{{url('/Admin/Goods')}}">
                        <i class="material-icons">book</i>
                        <p>书籍管理</p>
                    </a>
                </li>
                <li class="@yield('class6')">
                    <a href="/Admin/Order">
                        <i class="material-icons">assignment</i>
                        <p>订单管理</p>
                    </a>
                </li>
                <li class="@yield('class7')">
                    <a href="{{url('/Admin/Banner')}}">
                        <i class="material-icons">view_column</i>
                        <p>轮播图管理</p>
                    </a>
                </li>
                <li class="@yield('class8')">
                    <a href="{{url('/Admin/Comment')}}">
                        <i class="material-icons text-gray">message</i>
                        <p>评论管理</p>
                    </a>
                </li>
                <li class="@yield('class9')">
                    <a href="{{url('/Admin/Replay')}}">
                        <i class="material-icons text-gray">textsms</i>
                        <p>回复管理</p>
                    </a>
                </li>
                <li class="@yield('class10')">
                    <a href="notifications.html">
                        <i class="material-icons text-gray">photo</i>
                        <p>相册管理</p>
                    </a>
                </li>
                <li class="active-pro">
                    <a href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                        <i class="material-icons">exit_to_app</i>
                        <p>退出</p>
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>

                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-transparent navbar-absolute">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">@yield('main_title')</a>
                </div>
                <div class="collapse navbar-collapse">
                    <div class="top-right links">
                        <ul class="nav navbar-nav navbar-right">
                            @if (Route::has('login'))
                                @if (Auth::check())
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">dashboard</i>
                                        <p class="hidden-lg hidden-md">{{Auth::user()->name}}</p>
                                    </a>
                                </li>
                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">notifications</i>
                                        <span class="notification">5</span>
                                        <p class="hidden-lg hidden-md">消息</p>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Mike John responded to your email</a></li>
                                        <li><a href="#">You have 5 new tasks</a></li>
                                        <li><a href="#">You're now friend with Andrew</a></li>
                                        <li><a href="#">Another Notification</a></li>
                                        <li><a href="#">Another One</a></li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="#pablo" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="material-icons">person</i>
                                        <p class="hidden-lg hidden-md">个人中心</p>
                                    </a>
                                </li>
                                @else
                                    <li>
                                        <a href="{{ url('/login') }}">登录</a>
                                    </li>
                                    <li>
                                        <a href="{{ url('/register') }}">注册</a>
                                    </li>
                                @endif
                            @endif
                        </ul>
                    </div>
                    @yield('search_form')
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                {{--这里修改主要内容--}}
                @yield('content')

            </div>

        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="{{url('/home')}}">
                                主页
                            </a>
                        </li>
                        <li>
                            <a href="##">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                博客
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="#"></a>
                </p>
            </div>
        </footer>
    </div>
</div>

    <!-- Scripts -->
    {{--<script src="{{ asset('js/app.js') }}"></script>--}}

    <!--   Core JS Files   -->
    <script src="{{ asset('/Admin/js/jquery-1.11.3.min.js') }}" type="text/javascript"></script>script
    <script src="{{ asset('/Admin/js/bootstrap.min.js') }}" type="text/javascript"></script>
    <script src="{{ asset('/Admin/js/material.min.js') }}" type="text/javascript"></script>

    <!--  Charts Plugin -->
    <script src="{{ asset('/Admin/js/chartist.min.js') }}"></script>

    <!--  Notifications Plugin    -->
    <script src="{{ asset('/Admin/js/bootstrap-notify.js') }}"></script>

    <!--  Google Maps Plugin    -->


    <!-- Material Dashboard javascript methods -->
    <script src="{{ asset('/Admin/js/material-dashboard.js') }}"></script>

    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="{{ asset('/Admin/js/demo.js') }}"></script>
    <!-- Text Edit JS -->
    <script type="text/javascript" src="{{ asset('/dist/js/wangEditor.js') }}"></script>

<script type="text/JavaScript">
    $(function(){
        @include('Admin.Layouts.error')
        $('#picture').change(function(){
            var $picname=$(this).val();
            console.log($picname)
            $('#picname').val($picname);
        })
    })

</script>
    @yield('javascript')
</body>
</html>
