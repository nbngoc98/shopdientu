
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Category Menu Area -->
            <div class="col-lg-3">
                <!--Category Menu Start-->
                <div class="category-menu">
                    <div class="category-heading">
                        <h2 class="categories-toggle"><span>categories</span></h2>
                    </div>
                    <div id="cate-toggle" class="category-menu-list">
                        <ul>
                            @foreach($categories as $category )
                                @if(count($category->categoryChildrent) == 0)
                                    <li><a href="{{ route('home.product_list', [$category->slug, '0','0', $category->id])}}">{{ $category->name }}</a></li>
                                @else
                                    <li class="right-menu"><a href="{{ route('home.product_list', [$category->slug, '0','0', $category->id])}}">{{ $category->name }}</a>
                                        <ul class="cat-mega-menu">
                                            @foreach($category->categoryChildrent as $categoryChildrent)
                                                @if(count($categoryChildrent->categoryChildrent) == 0)
                                                            <li ><a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug,'00', $categoryChildrent->id])}}">{{ $categoryChildrent->name }}</a></li>
                                                @else
                                                    <li class="right-menu cat-mega-title">
                                                        <a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug,'00', $categoryChildrent->id])}}">{{ $categoryChildrent->name }}</a>
                                                        <ul>
                                                            @foreach($categoryChildrent->categoryChildrent as $categoryChildrent2)
                                                                <li><a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug, $categoryChildrent2->slug, $categoryChildrent2->id])}}">{{ $categoryChildrent2->name }}</a></li>
                                                            @endforeach
                                                        </ul>
                                                    </li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </li>
                                @endif

                            @endforeach
                            <li class="rx-child"><a href="#">Mobile & Tablets</a></li>
                            <li class="rx-child"><a href="#">Accessories</a></li>
                            <li class="rx-parent">
                                <a class="rx-default">More Categories</a>
                                <a class="rx-show">Less Categories</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <!--Category Menu End-->
            </div>
            <!-- Category Menu Area End Here -->
            <!-- Begin Slider Area -->
            <div class="col-lg-9">
                <div class="slider-area pt-sm-30 pt-xs-30">
                    <div class="slider-active owl-carousel">
                        {{--                        {{ $key == 0 ? 'active': ''}}--}}
                        @foreach($sliders as $key => $slider)
                        <div class="single-slide align-center-left animation-style-02">
                            <img src="{{$slider->image_path}}" class="girl img-responsive" alt="" width="780" height="480" />
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>{{ $slider->description }}</h5>
                                <h2>{{ $slider->name }}</h2>
                                <h3>Sales  <span>{{ $slider->percent_sale }}% Off</span></h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="shop-left-sidebar.html">Shopping Now</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Slider Area End Here -->
        </div>
    </div>
</div>
<!-- Slider With Category Menu Area End Here -->
<!-- Begin Li's Static Banner Area -->
<div class="li-static-banner pt-20 pt-sm-30 pt-xs-30">
    <div class="container">
        <div class="row">
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4">
                <div class="single-banner pb-xs-30">
                    <a href="#">
                        <img src="images/banner/1_3.jpg" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4">
                <div class="single-banner pb-xs-30">
                    <a href="#">
                        <img src="images/banner/1_4.jpg" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
            <!-- Begin Single Banner Area -->
            <div class="col-lg-4 col-md-4">
                <div class="single-banner">
                    <a href="#">
                        <img src="images/banner/1_5.jpg" alt="Li's Static Banner">
                    </a>
                </div>
            </div>
            <!-- Single Banner Area End Here -->
        </div>
    </div>
</div>
