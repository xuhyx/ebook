<div class="card" style="padding: 10px">
    <div class="col-lg-6 col-md-9 col-xs-9">
        <div class="row">
            <a href="{{--这里传递url--}}@yield('url')" class="btn @yield('class_li1')">
                查看@yield('name')列表&nbsp&nbsp&nbsp @yield('count')
            </a>
            @yield('add')


            @yield('myArticle')
        </div>
    </div>
</div>