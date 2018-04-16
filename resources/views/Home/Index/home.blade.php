@extends('Home.Layouts.app')

@section('content')
    <div class="content">

        <div class="home-slider outer-bottom-vs">
            <!-- ========================================== SECTION â€?HERO : START ========================================= -->
            <div id="hero">
                <div id="owl-main" class="owl-carousel owl-theme">

                    @foreach($Goods as $val)
                    <div class="item">
                        <div class="container">
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                        <div class="book-in-shelf">
                                            <div class="book-shelf">
                                                <div class="book-cover slider-book-cover bk-cover m-t-20">
                                                    <img class="img-responsive" alt="" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('/Libs/Uploads/goodsPic/'.$val['gimg'])}}" >
                                                    <div class="fade"></div>
                                                </div> <!-- /.book-cover -->
                                            </div><!-- /.book-shelf -->
                                        </div><!-- /.book-in-shelf -->
                                    </div><!-- /.col -->

                                    <div class="col-md-5 col-sm-12 col-xs-12">
                                        <div class="clearfix caption vertical-center text-left">
                                            <div class="slider-caption-heading">
                                                <h1 class="slider-title">
                                                    <span class="fadeInDown-1 main">{{$val['gauthor']}}:</span>
                                                    <span class="fadeInDown-2 sub">{{$val['gname']}}</span>
                                                </h1>
                                            </div><!-- /.slider-caption-heading -->
                                            <div class="clearfix slider-button hidden-xs fadeInDown-3">
                                                <a class="btn btn-primary btn-uppercase" role="button" href="#">查看更多</a>
                                            </div> <!-- /.slider-price -->
                                        </div><!-- /.slider-caption -->
                                    </div><!-- /.col -->


                                </div><!-- /.row -->

                            </div><!-- /.content.caption -->
                        </div><!-- /.container -->
                    </div><!-- /.item -->
                    @endforeach

                </div><!-- /# owl-main -->
            </div><!-- /#hero -->
            <!-- ========================================== SECTION â€?HERO : END ========================================= -->		</div><!-- /.home-slider -->

        <div class="container">
            <!-- ============================================== BANNERS ============================================== -->
            <div class="wide-banners wow fadeInUp">
                <div class="row">

                    <div class="col-md-4 col-sm-6">
                        <div class="wide-banner cnt-strip">
                            <div class="strip strip-text">
                                <div class="strip-inner text-center">
                                    <h2 class="title">店铺销售</h2>
                                    <p class='subtitle'>最低7.5折销售</p>
                                </div><!-- /.strip-inner -->
                            </div><!-- /.strip -->
                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->

                    <div class="col-md-4 hidden-sm">

                        <div class="wide-banner cnt-strip">
                            <div class="image">
                                <img class="img-responsive" src="{{URL::asset('assets/images/wide-banners/banner1.png')}}" alt="">
                            </div>
                            <div class="strip on-strip strip-text">
                                <div class="strip-inner text-center">
                                    <h2 class="title">最新上架</h2>
                                    <p class='subtitle'>新品推荐</p>
                                </div><!-- /.strip-inner -->
                            </div><!-- /.strip -->

                        </div><!-- /.wide-banner -->

                    </div><!-- /.col -->

                    <div class="col-md-4 col-sm-6">
                        <div class="wide-banner cnt-strip">
                            <div class="strip strip-text">
                                <div class="strip-inner text-center">
                                    <h2 class="title">博客</h2>
                                    <p class='subtitle'>最新消息</p>
                                </div><!-- /.strip-inner -->
                            </div><!-- /.strip -->

                        </div><!-- /.wide-banner -->
                    </div><!-- /.col -->



                </div><!-- /.row -->
            </div><!-- /.wide-banners -->
            <!-- ============================================== BANNERS : END ============================================== -->
            <div class="divider inner-vs">
                <img class="img-responsive" src="{{URL::asset('assets/images/shadow.png')}}" alt="">
            </div><!-- /.divider -->

            <!-- ============================================== BEST SELLER ============================================== -->
            <section class="best-seller wow fadeInUp">
                <div id="best-seller" class="module">
                    <div class="module-heading home-page-module-heading">
                        <h2 class="module-title home-page-module-title"><span>畅销书</span></h2>
                    </div><!-- /.module-heading -->
                    <div class="module-body">
                        <div class="row books full-width">
                            <div class="clearfix text-center">
                                @foreach($hotbooks as $book)
                                <div class="col-md-3 col-sm-6">
                                    <div class="book">
                                        <a href="single-book.html">
                                            <div class="book-cover">
                                                <img width="140" height="212" alt="" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('/Libs/Uploads/goodsPic/'.$book['gimg'])}}">
                                                <div class="tag">
                                                    <span>sale</span>
                                                </div>
                                            </div>
                                        </a>
                                        <div class="book-details clearfix">
                                            <div class="book-description">
                                                <h3 class="book-title"><a href="single-book.html">{{$book['gname']}}</a></h3>
                                                <p class="book-subtitle">by <a href="single-book.html"> {{$book['gauthor']}}</a></p>
                                            </div>
                                            <div class="text-center">
                                                <div class="actions">
                                                    <span class="book-price price">￥{{$book['gPrise']}}</span>
                                                    <div class="cart-action">
                                                        <a class="add-to-cart" title="加入购物车" href="javascript:void(0);">Add to Cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="view-more-holder col-md-12 center-block text-center inner-top-xs">
                                <a role="button" class="btn btn-primary btn-uppercase" href="#">查看更多

                                </a>
                            </div>



                        </div>
                    </div>
                </div>
            </section>
            <!-- ============================================== BEST SELLER : END ============================================== -->		</div><!-- /.container -->

        <!-- ============================================== TESTIMONIAL ============================================== -->
        <section class="customer-testimonial wow fadeInUp outer-bottom-xs light-bg">
            <div id="testimonial" class="module container inner-top-xs">
                <div class="module-heading home-page-module-heading">
                    <h2 class="module-title home-page-module-title"><span>顾客推荐</span></h2>
                </div><!-- /.module-heading -->
                <div class="module-body">
                    <div class="row">
                        <div class="col-md-10 center-block">
                            <div class="row">
                                <div class="col-md-6 col-sm-6">
                                    <div class="testimonial-block">
                                        <div class="inner-testimonial-block">
                                            <div class="blockquote">
                                                <div class="inner-left-xl">
                                                    <blockquote>
                                                        <p>Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. </p>
                                                    </blockquote>
                                                </div><!-- /.inner-left-xl -->
                                            </div><!-- /.blockquote -->
                                        </div><!-- /.inner-testimonial-block -->
                                        <div class="row m-t-20">
                                            <div class="col-md-10 author-block center-block">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-5">
                                                        <div class='image'>
                                                            <img class="img-responsive" src="{{URL::asset('assets/images/testimonials/author1.png')}}" alt="">
                                                        </div><!-- /.image -->
                                                    </div><!-- /.col -->
                                                    <div class="col-md-8 col-xs-7">
                                                        <h5 class="author-name outer-top-xs">Philip Anthony Hopkins</h5>
                                                        <span>Coca-Cola</span>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.testimonial-block -->
                                </div><!-- /.col -->

                                <div class="col-md-6 col-sm-6">
                                    <div class="testimonial-block">
                                        <div class="inner-testimonial-block">
                                            <div class="blockquote">
                                                <div class="inner-left-xl">
                                                    <blockquote>
                                                        <p>Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus.
                                                        </p>
                                                    </blockquote>
                                                </div><!-- /.inner-left-xl -->
                                            </div><!-- /.blockquote -->
                                        </div><!-- /.inner-testimonial-block -->
                                        <div class="row m-t-20">
                                            <div class="col-md-10 author-block center-block">
                                                <div class="row">
                                                    <div class="col-md-4 col-xs-5">
                                                        <div class='image'>
                                                            <img class="img-responsive" src="{{URL::asset('assets/images/testimonials/author2.png')}}" alt="">
                                                        </div><!-- /.image -->
                                                    </div><!-- /.col -->
                                                    <div class="col-md-8 col-xs-7">
                                                        <h5 class="author-name outer-top-xs">Steve Jobs</h5>
                                                        <span>Coca-Cola</span>
                                                    </div><!-- /.col -->
                                                </div><!-- /.row -->
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.testimonial-block -->

                                </div><!-- /.col -->
                            </div><!-- /.row -->
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.module-body -->
            </div><!-- /.module -->
        </section>
        <!-- ============================================== TESTIMONIAL : END ============================================== -->

        <section class="latest-product wow fadeInUp">
            <div id="latest-product" class="module container inner-top-xs">
                <div class="module-heading home-page-module-heading inner-bottom-vs">
                    <h2 class="module-title home-page-module-title"><span>最新上架</span></h2>
                </div>
                <div class="module-body">
                    <!-- ============================================== LATEST PRODUCT ============================================== -->

                    <div class="book-shelf inner-bottom glass-shelf">
                        <div class="row">
                            <div class="col-md-10 col-sm-10 center-block clearfix">
                                @foreach($newbooks as $book)
                                <div class="col-md-3 col-sm-4">
                                    <div class="book-cover bk-cover product-book-cover">
                                        <img class="img-responsive" alt="" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('/Libs/Uploads/goodsPic/'.$book['gimg'])}}" width="182" height="273" >
                                        <div class="fade"></div>
                                    </div> <!-- /.book-cover -->
                                </div><!-- /.col -->
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-10 center-block marketing-block">
                            <h2 class="text-center">
                                <span>We Empower WordPress Developers With Design-Driven</span>
                                <span>Themes And A Classy Experience Their Clients</span>
                                <span> Will Just Love</span>
                            </h2>

                            <div class="divider inner-xs">
                                <img class="img-responsive" src="{{URL::asset('assets/images/shadow.png')}}" alt="">
                            </div><!-- /.divider -->

                            <div class="row wow fadeInUp features-block">
                                <div class="col-xs-12 col-sm-6 feature-block">
                                    <div class="media inner-bottom-xs">
                                        <div class="media-body">
                                            <h4 class="media-heading">Post-ironic sweater</h4>
                                            <p>Vinyl carles 3 wolf moon put a bird on it post ironic  authentic single-origin coffee quinoa chillwave. Irony fingerstache thundercats.</p>
                                            <a href="#" class="find-more">Find out more  &rarr;</a>
                                        </div>
                                        <div class="media-right media-middle icon-media">
                                            <div class="icon-block">
                                                <span class="fa-stack fa-lg">
                                                  <i class="fa fa-circle fa-stack-2x"></i>
                                                  <i class="fa fa-eye fa-stack-1x fa-inverse text-center"></i>
                                                </span>
                                            </div><!-- /.icon-block -->
                                        </div><!-- /.media-right -->
                                    </div><!-- /.media -->
                                    <hr/>
                                </div><!-- /.feature-block -->

                                <div class="col-xs-12 col-sm-6 feature-block">
                                    <div class="media inner-bottom-xs">
                                        <div class="media-body">
                                            <h4 class="media-heading">Lorem ipsum</h4>
                                            <p>Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum.</p>
                                            <a href="#" class="find-more">Find out more  &rarr;</a>
                                        </div>
                                        <div class="media-right media-middle icon-media">
                                            <div class="icon-block">
                                                <span class="fa-stack fa-lg">
                                                  <i class="fa fa-circle fa-stack-2x"></i>
                                                  <i class="fa fa-mobile fa-stack-1x fa-inverse text-center"></i>
                                                </span>
                                            </div><!-- /.icon-block -->
                                        </div><!-- /.media-right -->
                                    </div><!-- /.media -->
                                    <hr/>
                                </div><!-- /.feature-block -->

                                <div class="col-xs-12 col-sm-6 feature-block">
                                    <div class="media inner-top-xs inner-bottom-xs">
                                        <div class="media-body">
                                            <h4 class="media-heading">Brunch vegan 8-bit</h4>
                                            <p>Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac.</p>
                                            <a href="#" class="find-more">Find out more  &rarr;</a>
                                        </div>
                                        <div class="media-right media-middle icon-media">
                                            <div class="icon-block">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-lightbulb-o fa-stack-1x fa-inverse text-center"></i>
                                                </span>
                                            </div><!-- /.icon-block -->
                                        </div><!-- /.media-right -->
                                    </div><!-- /.media -->
                                    <hr class="visible-xs"/>
                                </div><!-- /.feature-block -->


                                <div class="col-xs-12 col-sm-6 feature-block">
                                    <div class="media inner-top-xs inner-bottom-xs">
                                        <div class="media-body">
                                            <h4 class="media-heading">Donec pede justo</h4>
                                            <p>Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.</p>
                                            <a href="#" class="find-more">Find out more  &rarr;</a>
                                        </div>
                                        <div class="media-right media-middle icon-media">
                                            <div class="icon-block">
                                                <span class="fa-stack fa-lg">
                                                    <i class="fa fa-circle fa-stack-2x"></i>
                                                    <i class="fa fa-sliders fa-stack-1x fa-inverse text-center"></i>
                                                </span>
                                            </div><!-- /.icon-block -->
                                        </div><!-- /.media-right -->
                                    </div><!-- /.media -->
                                    <hr class="visible-xs"/>
                                </div><!-- /.feature-block -->
                            </div><!-- /.features-block -->
                        </div>
                    </div>

                    <!-- ============================================== LATEST PRODUCT : END ============================================== -->
                    <!-- ============================================== IMAGE BLOCK ============================================== -->
                    <div class="image-block wow fadeInUp inner-top-sm">
                        <div class='row'>
                            <div class="col-md-4 col-sm-6">
                                <div class="banners">
                                    <div class="banner green-banner">
                                        <div class='image'>
                                            <img class="img-responsive" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/product1.jpg')}}" alt="">
                                        </div><!-- /.image -->
                                        <div class='caption'>
                                            <h2 class='title'>sale</h2>
                                            <hr>
                                            <p>The sale don't stop up to 75% off!</p>
                                        </div><!-- /.caption -->
                                    </div><!-- /.banner -->
                                </div><!-- /.banners -->
                            </div><!-- /.col -->

                            <div class="col-md-4 col-sm-6 hidden-xs">
                                <div class="banners">
                                    <div class="banner black-banner">
                                        <div class='image'>
                                            <img class="img-responsive" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/product2.jpg')}}" alt="">
                                        </div><!-- /.image -->
                                        <div class='caption'>
                                            <h2 class='title'>Games</h2>
                                            <hr>
                                            <p>The sale don't stop up to 75% off!</p>
                                        </div><!-- /.caption -->
                                    </div><!-- /.banner -->
                                </div><!-- /.banners -->
                            </div><!-- /.col -->

                            <div class="col-md-4 hidden-xs hidden-sm">
                                <div class="banners">
                                    <div class="banner orange-banner">
                                        <div class='image'>
                                            <img class="img-responsive" src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/product3.jpg')}}" alt="">
                                        </div><!-- /.image -->
                                        <div class='caption'>
                                            <h2 class='title'>lookbook</h2>
                                            <hr>
                                            <p>Take a look at the upcoming trends</p>
                                        </div><!-- /.caption -->
                                    </div><!-- /.banner -->
                                </div><!-- /.banners -->
                            </div><!-- /.col -->
                        </div><!-- /.row -->
                    </div><!-- /.image-block -->
                    <!-- ============================================== IMAGE BLOCK : END ============================================== -->				</div>
            </div>
        </section>

        <!-- ============================================== FROM BLOG ============================================== -->
        <section class="blog wow fadeInUp">
            <div id="blog" class="module container">
                <div class="module-heading home-page-module-heading">
                    <h2 class="module-title home-page-module-title"><span>From the blog</span></h2>
                </div><!-- /.module-heading -->
                <div class="module-body inner-top-50">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 blog-image"><a href="#"><img src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/blog/1.jpg')}}" alt="" class="blog1" width="199" height="177"></a></div>
                                <div class="col-md-7 col-sm-7 blog-info">
                                    <h4 class="blog-heading"><a href="#">Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend</a></h4>
                                    <p class="comment-count">12 comments</p>
                                    <p class="text">Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    </p>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div><!-- /.col -->

                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-5 col-sm-5 blog-image"><a href="#"><img src="{{URL::asset('assets/images/blank.gif')}}" data-echo="{{URL::asset('assets/images/blog/2.jpg')}}" alt="" class="blog2" width="199" height="177"></a></div>
                                <div class="col-md-7 col-sm-7 blog-info">
                                    <h4 class="blog-heading"><a href="#">Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend</a></h4>
                                    <p class="comment-count">12 comments</p>
                                    <p class="text">Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus.
                                    </p>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                        </div><!-- /.col -->


                    </div><!-- /.row -->
                </div><!-- /.module-body -->
            </div><!-- /.module -->
        </section>
        <!-- ============================================== FROM BLOG : END ============================================== -->
    </div><!-- /.content -->
@endsection