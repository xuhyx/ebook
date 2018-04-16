<form class="navbar-form navbar-right" role="search" action="@yield('url')@yield('else')" method="get">
    {{csrf_field()}}
    <div class="form-group  is-empty">
        <input type="text" class="form-control" name="search" placeholder="查找@yield('name')">
        <span class="material-input"></span>
    </div>
    <div class="form-group  is-empty">
        <select class="form-control" name="searchCondition">
            @yield('option')
        </select>
        <span class="material-input"></span>
    </div>
    <button type="submit" class="btn btn-white btn-round btn-just-icon is-empty">
        <i class="material-icons">search</i><div class="ripple-container"></div>
    </button>
</form>