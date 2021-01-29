<div class="container page-builder-ltr">
    <div class="row row_a90w  row-style ">
        <!-- Menu left-->
        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 col_vnxd  menu-left">
            <div class="row row_f8gy  ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_gafz col-style megamenu-style-dev megamenu-dev">
                    <div class="responsive">
                        <div class="so-vertical-menu no-gutter">
                            <nav class="navbar-default">
                                <div class=" container-megamenu  container   vertical  ">
                                    <div id="menuHeading">
                                        <div class="megamenuToogle-wrapper">
                                            <div class="megamenuToogle-pattern">
                                                <div class="container">
                                                    <div><span></span><span></span><span></span></div>
                                                    <span class="title-mega">
                                                                Danh mục
                                                                </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="navbar-header">
                                        <span class="title-navbar hidden-lg hidden-md">  Danh mục  </span>
                                        <button type="button" id="show-verticalmenu" data-toggle="collapse" class="navbar-toggle">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="vertical-wrapper">
                                        <span id="remove-verticalmenu" class="fa fa-times"></span>
                                        <div class="megamenu-pattern">
                                            <div class="container">
                                                <ul class="megamenu" data-transition="slide" data-animationtime="300">
                                                    @foreach($categories_menu as $category )
                                                        @if(count($category->categoryChildrent) == 0)
                                                            <li class="item-vertical  style1">
                                                                <p class="close-menu"></p>
                                                                <a href="{{ route('home.product_list', [$category->slug, '0','0', $category->id])}}" class="clearfix">
                                                             <span>
                                                             <strong>{{ $category->name }}</strong>
                                                             </span>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="item-vertical  css-menu with-sub-menu hover">
                                                                <p class="close-menu"></p>
                                                                <a href="{{ route('home.product_list', [$category->slug, '0','0', $category->id])}}" class="clearfix">
                                                             <span>
                                                             <strong>{{ $category->name }}</strong>
                                                             </span>
                                                                    <b class="fa fa-caret-right"></b>
                                                                </a>
                                                                <div class="sub-menu" style="width: 250px;">
                                                                    <div class="content">
                                                                        <div class="row">
                                                                            <div class="col-sm-12">
                                                                                <div class="categories ">
                                                                                    <div class="row">
                                                                                        <div class="col-sm-12 hover-menu">
                                                                                            <div class="menu">
                                                                                                <ul>
                                                                                                    @foreach($category->categoryChildrent as $categoryChildrent)
                                                                                                        @if(count($categoryChildrent->categoryChildrent) == 0)
                                                                                                            <li><a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug,'00', $categoryChildrent->id])}}" onclick="window.location = '#';" class="main-menu">{{ $categoryChildrent->name }}</a></li>
                                                                                                        @else
                                                                                                            <li>
                                                                                                                <a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug,'00', $categoryChildrent->id])}}" onclick="window.location = '#';" class="main-menu">{{ $categoryChildrent->name }}<b class="fa fa-angle-right"></b></a>
                                                                                                                <ul>
                                                                                                                    @foreach($categoryChildrent->categoryChildrent as $categoryChildrent2)
                                                                                                                        <li><a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug, $categoryChildrent2->slug, $categoryChildrent2->id])}}" onclick="window.location = '#';">{{ $categoryChildrent2->name }}</a></li>
                                                                                                                    @endforeach


                                                                                                                </ul>
                                                                                                            </li>
                                                                                                        @endif
                                                                                                    @endforeach

                                                                                                </ul>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        @endif

                                                    @endforeach

{{--                                                    <li class="loadmore"><i class="fa fa-plus-square"></i><span class="more-view"> More Categories</span></li>--}}
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--- SLider right-->
        <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 col_anla  slider-right">
            <div class="row row_ci4f  ">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_dg1b block block_1">
                    <div class="module sohomepage-slider so-homeslider-ltr  ">
                        <div class="modcontent">
                            <div id="sohomepage-slider1">
                                <div class="so-homeslider yt-content-slider full_slider owl-drag" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column00="1" data-items_column0="1" data-items_column1="1" data-items_column2="1"  data-items_column3="1" data-items_column4="1" data-arrows="yes" data-pagination="yes" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                    @foreach($sliders as $key => $slider)
                                    <div class="item">
                                        <a href=" #   " title="slide 1 - 1" target="_self">
                                            <img class="responsive" src="{{asset('public'.$slider->image_path)}}" alt="slide 1 - 1">
                                        </a>
{{--                                        <div class="sohomeslider-description">--}}
{{--                                        </div>--}}
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
