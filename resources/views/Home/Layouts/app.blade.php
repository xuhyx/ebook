<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>书城</title>

    <!-- Bootstrap -->
    <link href="{{url('/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{url('/assets/css/main.min.css')}}" rel="stylesheet">

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{url('/assets/images/favicon.ico')}}">

    <link href='http://fonts.googleapis.com/css?family=PT+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fira+Sans:400,300,300italic,400italic,500,500italic,700,700italic' rel='stylesheet' type='text/css'>
</head>
<body>





<div id="wrapper" >
    <div id="page-content-wrapper" class="st-pusher">
        <div class="st-pusher-after"></div>
        <!-- ============================================== HEADER ============================================== -->

        <header class="header">

            <nav class="navbar navbar-bookshop navbar-static-top" role="navigation">
                <div class="container">
                    <div class="row">
                        <div class="col-md-5 hidden-xs hidden-sm">
                            <ul class="nav navbar-nav">
                                <li><a href="single-book.html">在线商城</a></li>
                                <li><a href="about.html">关于我们</a></li>
                                <li><a href="about.html">送货范围</a></li>
                                <li><a href="contact.html">帮助</a></li>
                                <li><a href="contact.html">联系我们</a></li>
                            </ul><!-- /.nav -->
                        </div><!-- /.col -->
                        <div class="col-md-3 col-xs-10 col-sm-10 navbar-left">

                            <p class='text-center'><a href="#"><span class="icon glyphicon glyphicon-earphone"></span> +1-234-567-8910</a></p>

                        </div><!-- /.col -->
                        <div class="col-md-4 col-sm-2">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="hidden-xs hidden-sm"><a href="contact.html">愿望清单</a></li>
                                <li class="hidden-xs hidden-sm"><a href="single-book.html">购物车</a></li>
                                <li class="hidden-xs hidden-sm"><a href="contact.html">我的账户</a></li>
                                <li class="icon icon-small hidden-xs"><a data-toggle="modal" data-target="#modal-login-big" href="#"><i class="icon fa fa-lock"></i></a></li>
                                <li class="icon hidden-lg hidden-sm hidden-md"><a data-toggle="modal" data-target="#modal-login-small" href="#"><i class="icon fa fa-lock"></i></a></li>
                            </ul><!-- /.nav -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </nav><!-- /.navbar -->


            <!-- Modal -->
            <div id="modal-login-big" class="modal login fade hidden-xs"  tabindex="-1" role="dialog" aria-hidden="false">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <ul class="login-list clearfix ">
                                    <li class='active'>登录</li>
                                    <li class="divider"></li>
                                    <li><a href="#">注册</a></li>
                                </ul><!-- /.login-list -->
                                <form role="form" class="inner-top-50">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="sr-only">邮箱</label>
                                        <input type="email" class="form-control bookshop-form-control" id="exampleInputEmail1" placeholder="Hezy Theme">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1" class="sr-only">密码</label>
                                        <input type="password" class="form-control bookshop-form-control" id="exampleInputPassword1">
                                    </div>

                                    <button type="button" class="btn btn-primary btn-uppercase">登录</button>
                                    <a href="#" class='forgot-password'>忘记密码</a>
                                </form>
                            </div>
                        </div><!-- /.modal-body -->
                        <div class="modal-footer">
                            <div class="text-center">
                                <ul class='social-list text-center'>
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="google-plus"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="pinterest"></a></li>
                                </ul><!-- /.social-list -->
                            </div>
                        </div><!-- /.modal-footer -->
                        <a href="#" data-dismiss="modal" class="remove-icon"><i class="fa fa-times"></i></a>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <!-- Modal -->
            <div id="modal-login-small" class="modal fade login login-xs hidden-sm hidden-lg"  tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="logo-holder">
                                    <h1 class="logo">BookShop</h1>
                                    <div class="logo-subtitle">
                                        <span>World of books</span>
                                    </div><!-- /.logo-subtitle -->
                                </div>

                                <form role="form" class="inner-top-50">
                                    <div class="form-group">
                                        <label for="entername" class="sr-only">邮箱</label>
                                        <input type="email" class="form-control bookshop-form-control" id="entername" placeholder="Hezy Theme">
                                    </div>
                                    <div class="form-group">
                                        <label for="enterpassword" class="sr-only">密码</label>
                                        <input type="password" class="form-control bookshop-form-control" id="enterpassword">
                                    </div>

                                    <button type="button" class="btn btn-primary btn-block btn-uppercase">登录</button>
                                    <a href="#" class='forgot-password'>忘记密码</a>
                                </form>
                            </div>
                        </div><!-- /.modal-body -->
                        <div class="modal-footer">
                            <div class="text-center">
                                <ul class='social-list text-center'>
                                    <li><a href="#" class="facebook"></a></li>
                                    <li><a href="#" class="google-plus"></a></li>
                                    <li><a href="#" class="twitter"></a></li>
                                    <li><a href="#" class="pinterest"></a></li>
                                </ul><!-- /.social-list -->
                            </div>
                        </div><!-- /.modal-footer -->
                        <a href="#" data-dismiss="modal" class="remove-icon"><i class="fa fa-times"></i></a>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="main-header">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4 col-md-4 top-search-holder m-t-10">
                            <!-- ============================================== SEARCH BAR ============================================== -->
                            <form class="search-form" role="search">
                                <div class="form-group">
                                    <label class="sr-only" for="page-search">搜索商品</label>
                                    <input id="page-search" class="search-input form-control" type="search" placeholder="搜索书籍">
                                </div>
                                <button class="page-search-button">
                                    <span class="fa fa-search">
                                        <span class="sr-only">Search</span>
                                    </span>
                                </button>
                            </form>
                            <!-- ============================================== SEARCH BAR : END ============================================== -->					</div><!-- /.top-search-holder -->

                        <div class="col-xs-12 col-sm-4 col-md-4 text-center logo-holder">
                            <!-- ============================================== LOGO ============================================== -->
                            <a href="{{url('/')}}">
                                <h1 class="logo">BookShop</h1>
                                <div class="logo-subtitle">
                                    <span>World of books</span>
                                </div><!-- /.logo-subtitle -->
                            </a>
                            <!-- ============================================== LOGO : END ============================================== -->					</div><!-- /.logo-holder -->

                        <div class="col-xs-12  col-md-2 header-shippment hidden-sm m-t-10">
                            <!-- ============================================== FREE DELIVERY ============================================== -->
                            <div class="media free-delivery hidden-xs ">
                                <span class="media-left"><img src="{{URL::asset('assets/images/delivery-icon.png')}}" height="48" width="48" alt=""></span>
                                <div class="media-body">
                                    <h5 class="media-heading">免费送货</h5>
                                </div>
                            </div>
                            <!-- ============================================== FREE DELIVERY : END ============================================== -->					</div><!-- /.header-shippment -->

                        <div class="col-xs-12 col-sm-4 col-md-2 animate-dropdown1 top-cart-row m-t-10">
                            <!-- ============================================== SHOPPING CART DROPDOWN ============================================== -->
                            <ul class="clearfix shopping-cart-block list-unstyled">
                                <li class="dropdown">
                                    <a class="menu-toggle-right clearfix" href="/.menu-toggle-right">
                                        <span class="pull-right cart-right-block">
                                            <img src="{{URL::asset('assets/images/cart-icon.png')}}" alt="" width="46" height="39" />
                                        </span><!-- /.cart-right-block -->
                                        <span class="pull-right cart-left-block">
                                            <span class="cart-block-heading">$345.39</span>
                                            <span class="hidden-xs">2 件</span>
                                        </span><!-- /.cart-left-block -->
                                    </a>
                                </li>
                            </ul> <!-- /.list-unstyled -->
                            <!-- ============================================== SHOPPING CART DROPDOWN : END ============================================== -->					</div><!-- /.top-cart-row -->
                    </div><!-- /.row -->

                </div><!-- /.container -->

            </div><!-- /.main-header -->




            <!-- ============================================== NAVBAR ============================================== -->
            <div class="header-nav animate-dropdown">
                <div class="container">
                    <div class="nav-bg-class">
                        <!-- ============================================================= NAVBAR PRIMARY ============================================================= -->
                        <nav class="yamm navbar navbar-primary animate-dropdown" role="navigation">
                            <div class="navbar-header">
                                <button id="btn-navbar-primary-collapse" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-primary-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                            </div><!-- /.navbar-header -->
                            <div class="collapse navbar-collapse" id="navbar-primary-collapse">
                                <ul class="nav navbar-nav">
                                    <li class="active"><a href="{{url('/')}}">书城首页</a></li>
                                    <li class="dropdown yamm-fw"><a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">教材</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-6">
                                                            <div class="section">
                                                                <h5 class="title">历史</h5>
                                                                <ul class="links list-unstyled">
                                                                    <li><a href="books.html">Indian Independence</a></li>

                                                                </ul>
                                                            </div><!-- /.section -->
                                                        </div><!-- /.col -->

                                                        <div class="col-md-2 col-sm-6">
                                                            <div class="section">
                                                                <h5 class="title">人文社科</h5>
                                                                <ul class="links list-unstyled">
                                                                    <li><a href="books.html">Applied Science</a></li>
                                                                </ul>
                                                            </div><!-- /.section -->
                                                        </div><!-- /.col -->

                                                        <div class="col-md-2 col-sm-6">
                                                            <div class="section">
                                                                <h5 class="title">文艺</h5>
                                                                <ul class="links list-unstyled">
                                                                    <li><a href="books.html">Indian Independence</a></li>
                                                                </ul>
                                                            </div><!-- /.section -->
                                                        </div><!-- /.col -->

                                                        <div class="col-md-2 col-sm-6">
                                                            <div class="section">
                                                                <h5 class="title">教育</h5>
                                                                <ul class="links list-unstyled">
                                                                    <li><a href="books.html">Applied Science</a></li>
                                                                </ul>
                                                            </div><!-- /.section -->
                                                        </div><!-- /.col -->

                                                        <div class="col-md-2 col-sm-6">
                                                            <div class="section">
                                                                <h5 class="title">小说</h5>
                                                                <ul class="links list-unstyled">
                                                                    <li><a href="books.html">Indian Independence</a></li>

                                                                </ul>
                                                            </div><!-- /.section -->
                                                        </div><!-- /.col -->

                                                        <div class="col-md-2 col-sm-6">
                                                            <div class="section">
                                                                <h5 class="title">小说</h5>
                                                                <ul class="links list-unstyled">
                                                                    <li><a href="books.html">Applied Science</a></li>

                                                                </ul>
                                                            </div><!-- /.section -->
                                                        </div><!-- /.col -->
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </li>
                                    <li><a href="books.html">电子书</a></li>
                                    <li class="hidden-sm"><a href="books.html">有声读物</a></li>
                                    <li class="hidden-sm hidden-md"><a href="books.html">杂志</a></li>
                                    <li class="hidden-sm hidden-md"><a href="books.html">电影</a></li>
                                    <li><a href="books.html">音乐</a></li>
                                    <li class="dropdown navbar-right"><a href="#" class="dropdown-toggle" data-hover="dropdown" data-toggle="dropdown">Pages</a>
                                        <ul class="dropdown-menu">
                                            <li>
                                                <div class="yamm-content">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-6">
                                                            <ul class="links">
                                                                <li><a href="home.html">Home</a></li>
                                                                <li><a href="home-2.html">Home II</a></li>
                                                                <li><a href="books.html">Books</a></li>
                                                                <li><a href="books-2.html">Books II</a></li>
                                                                <li><a href="single-book.html">Book</a></li>
                                                                <li><a href="blog.html">Blog</a></li>
                                                                <li><a href="blog-post.html">Blog Post</a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="col-md-6 col-sm-6">
                                                            <ul class="links">
                                                                <li><a href="about.html">About</a></li>
                                                                <li><a href="contact.html">Contact</a></li>
                                                                <li><a href="contact-2.html">Contact II</a></li>
                                                                <li><a href="categories.html">Categories</a></li>
                                                                <li><a href="magazine.html">Magazine</a></li>
                                                                <li><a href="all-brands.html">All Brands</a></li>
                                                                <li><a href="error.html">Error</a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>


                                        </ul>
                                    </li>
                                </ul><!-- /.nav -->
                            </div><!-- /.collapse navbar-collapse -->
                        </nav><!-- /.yamm -->
                        <!-- ============================================================= NAVBAR PRIMARY : END ============================================================= -->			</div><!-- /.nav-bg-class -->
                </div><!-- /.container -->

            </div><!-- /.header-nav -->
            <!-- ============================================== NAVBAR : END ============================================== -->
        </header>


        <!-- ============================================== HEADER : END ============================================== -->
        <div class="home-page">
            @yield('content')

        </div><!-- /.home-page -->            <!-- ============================================== FOOTER ============================================== -->
        <footer class="footer clearfix">
            <div class="margin-top-10">
                <div class="container inner-top-vs">
                    <!-- ============================================== FOOTER-TOP ============================================== -->
                    <div class="row">
                        <div class="col-md-3 col-sm-4">
                            <div class="footer-module">
                                <h4 class="footer-module-title">About this site</h4>
                                <div class="footer-module-body m-t-20 clearfix">
                                    <p><span class="pull-left"><img src="{{URL::asset('assets/images/footer-logo.png')}}" alt="" width="75" height="75"></span>A cras tincidunt, ut tellus et. Gravida scele risque, ipsum sed iacul is, nunc non namtellus. Placerat sed phasellus, purus purus elit. Cras ante eros. Erat vel. Donec vestibulum sed, vel euismod donec. </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4">
                            <div class="footer-module">
                                <h4 class="footer-module-title">Categories</h4>
                                <div class="footer-module-body clearfix">
                                    <ul class="list-unstyled link-list">
                                        <li><a href="#">Books</a></li>
                                        <li><a href="#">Text books</a></li>
                                        <li><a href="#">Nook books</a></li>
                                        <li><a href="#">Audiobooks</a></li>
                                        <li><a href="#">Magazines</a></li>
                                    </ul>

                                    <ul class="list-unstyled link-list">
                                        <li><a href="#">Movies</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Games</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-4 clearfix ">
                            <div class="footer-module">
                                <h4 class="footer-module-title">Information</h4>
                                <div class="footer-module-body clearfix">
                                    <ul class="list-unstyled link-list">
                                        <li><a href="#">Track Order</a></li>
                                        <li><a href="#">Delivery</a></li>
                                        <li><a href="#">Return Policy</a></li>
                                        <li><a href="#">Giftcards</a></li>
                                    </ul>

                                    <ul class="list-unstyled link-list">
                                        <li><a href="#">Contact Us</a></li>
                                        <li><a href="#">Store Locations</a></li>
                                        <li><a href="#">FAQ</a></li>
                                        <li><a href="#">Terms of Use</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                            <div class="footer-module">
                                <h4 class="footer-module-title">connect</h4>
                                <div class="footer-module-body clearfix">
                                    <ul class="clearfix list-unstyled footer-social-contact">
                                        <li><a href="#" class="fa fa-facebook" title="Facebook"></a></li>
                                        <li><a href="#" class="fa fa-pinterest" title="Pinterest"></a></li>
                                        <li><a href="#" class="fa fa-linkedin" title="Linkedin"></a></li>
                                        <li><a href="#" class="fa fa-twitter" title="Twitter"></a></li>
                                        <li><a href="#" class="fa fa-google-plus" title="Google Plus"></a></li>
                                        <li><a href="#" class="fa fa-rss" title="Rss"></a></li>
                                        <li><a href="#" class="fa fa-instagram" title="Instagram"></a></li>

                                    </ul>


                                    <div class="inner-top-xs">
                                        <p>Subscribe to our weekly newsletter.</p>
                                        <form class="searchform" action="http://inspectelement.com/" method="get">
                                            <input class="s" type="text" placeholder="Email Address" name="s" value="">
                                            <input class="searchsubmit" type="submit" value="Subscribe">
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================== FOOTER-TOP : END ============================================== -->            <hr>
                    <!-- ============================================== FOOTER-BOTTOM ============================================== -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="pull-left">
                                <ul class="payment-list list-unstyled">
                                    <li><a href="#"><img src="{{URL::asset('assets/images/payments/1.png')}}" class="img-responsive" height="22" alt=""></a></li>

                                </ul>
                            </div>
                            <p class="copyright-footer pull-right">&copy; 2014 Bookshop. All rights reserved. Made with love by <a href="#">Heztheme</a></p>
                        </div>
                    </div>
                    <!-- ============================================== FOOTER-BOTTOM : END ============================================== -->        </div>
            </div>
        </footer>
        <!-- ============================================== FOOTER : END ============================================== -->        </div><!-- /.st-pusher -->
    <!-- ============================================== TOGGLE RIGHT CONTENT ============================================== -->

    <div id="cart-dropdown-wrapper">
        <nav id="menu1" class="cart-dropdown">
            <h2 class="shopping-cart-heading">Shopping cart</h2>
            <div class="cart-items">
                <div class="cart-items-list">
                    <ul>
                        <li class="media">

                            <div class="clearfix book cart-book">
                                <a href="single-book.html" class="media-left">
                                    <div class="book-cover">
                                        <img width="140" height="212" alt="" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/book-covers/01.jpg')}}">
                                    </div>
                                </a>
                                <div class="media-body book-details">
                                    <div class="book-description">
                                        <h3 class="book-title"><a href="single-book.html">The Brief Wondrous Life of  Oscar Wao</a></h3>
                                        <p class="book-subtitle">by <a href="single-book.html">Cormac McCarthy</a></p>
                                        <p class="price m-t-20">$1,401.75</p>
                                    </div>
                                </div>
                            </div>


                        </li>
                        <li class="media">

                            <div class="clearfix book cart-book">
                                <a href="single-book.html" class="media-left">
                                    <div class="book-cover">
                                        <img width="140" height="212" alt="" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/book-covers/02.jpg')}}">
                                    </div>
                                </a>
                                <div class="media-body book-details">
                                    <div class="book-description">
                                        <h3 class="book-title"><a href="single-book.html">The Brief Wondrous Life of  Oscar Wao</a></h3>
                                        <p class="book-subtitle">by <a href="single-book.html">Cormac McCarthy</a></p>
                                        <p class="price m-t-20">$14.45</p>
                                    </div>
                                </div>
                            </div>


                        </li>

                    </ul>
                </div>
                <div class="cart-item-footer">
                    <h3 class='total text-center'>Total:<span>$1,416.00</span></h3>
                    <div class="proceed-to-checkout text-center">
                        <button type="button" class="btn btn-primary btn-uppercase">Proceed to Checkout</button>
                    </div>
                </div>

            </div>

        </nav>
    </div>

    <!-- ============================================== TOGGLE RIGHT CONTENT : END ============================================== -->



</div><!-- /#wrapper -->

<script src="{{url('/assets/js/jquery-1.11.2.min.js')}}"></script>
<script src="{{url('/assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('/assets/js/bootstrap-hover-dropdown.min.js')}}"></script>
<script src="{{url('/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{url('/assets/js/perfect-scrollbar.min.js')}}"></script>
<script src="{{url('/assets/js/jquery-ui.min.js')}}"></script>
<script src="{{url('/assets/js/jquery.customSelect.min.js')}}"></script>
<script src="{{url('/assets/js/jquery.easing-1.3.min.js')}}"></script>
<script src="{{url('/assets/js/wow.min.js')}}"></script>
<script src="{{url('/assets/js/echo.min.js')}}"></script>
<script src="{{url('/assets/js/scripts.js')}}"></script>
</body>
</html>
