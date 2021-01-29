<header>
    <!-- Begin Header Top Area -->
    <div class="header-top">
        <div class="container">
            <div class="row">
                <!-- Begin Header Top Left Area -->
                <div class="col-lg-3 col-md-4">
                    <div class="header-top-left">
                        <ul class="phone-wrap">
                            <li><span>Telephone Enquiry:</span><a href="#">(+123) 123 321 345</a></li>
                        </ul>
                    </div>
                </div>
                <!-- Header Top Left Area End Here -->
                <!-- Begin Header Top Right Area -->
                <div class="col-lg-9 col-md-8">
                    <div class="header-top-right">
                        <ul class="ht-menu">
                            <!-- Begin Setting Area -->
                            <li>
                                @if(Auth::check())
                                    <div class="ht-setting-trigger"><span>{{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span></div>
                                    <div class="setting ht-setting">
                                        <ul class="ht-setting-list">
                                            <li><a href="{{ route('home.profile') }}">My Account</a></li>
                                            <li><a href="{{ route('checkout.index') }}">Thanh toán</a></li>
                                            <li><a href="{{ route('home.logout') }}">Đăng xuất</a></li>
                                        </ul>
                                    </div>
                                @else
                                    <a href="{{ route('home.getlogin') }}">Đăng nhập/ Đăng ký</a>
                                @endif

                            </li>
                            <!-- Setting Area End Here -->
                            <!-- Begin Currency Area -->
                            <li>
                                <span class="currency-selector-wrapper">Currency :</span>
                                <div class="ht-currency-trigger"><span>USD $</span></div>
                                <div class="currency ht-currency">
                                    <ul class="ht-setting-list">
                                        <li><a href="#">EUR €</a></li>
                                        <li class="active"><a href="#">USD $</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Currency Area End Here -->
                            <!-- Begin Language Area -->
                            <li>
                                <span class="language-selector-wrapper">Language :</span>
                                <div class="ht-language-trigger"><span>English</span></div>
                                <div class="language ht-language">
                                    <ul class="ht-setting-list">
                                        <li class="active"><a href="#"><img src="images/menu/flag-icon/1.jpg" alt="">English</a></li>
                                        <li><a href="#"><img src="images/menu/flag-icon/2.jpg" alt="">Français</a></li>
                                    </ul>
                                </div>
                            </li>
                            <!-- Language Area End Here -->
                        </ul>
                    </div>
                </div>
                <!-- Header Top Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Top Area End Here -->
    <!-- Begin Header Middle Area -->
    <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
        <div class="container">
            <div class="row">
                <!-- Begin Header Logo Area -->
                <div class="col-lg-3">
                    <div class="logo pb-sm-30 pb-xs-30">
                        <a href="index.html">
                            <img src="images/menu/logo/1.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- Header Logo Area End Here -->
                <!-- Begin Header Middle Right Area -->
                <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                    <!-- Begin Header Middle Searchbox Area -->
                    <form action="{{URL::to('search')}}" class="hm-searchbox" method="GET">
                        <select class="nice-select select-search-category" name="category">
                            <option value="0">Tất cả</option>
                            {!! $htmlOption !!}
                        </select>
                        <input type="text" name="keyword" placeholder="Enter your search key ...">
                        <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    <!-- Header Middle Searchbox Area End Here -->
                    <!-- Begin Header Middle Right Area -->
                    <div class="header-middle-right">
                        <ul class="hm-menu">
                            <!-- Begin Header Middle Wishlist Area -->
                            <li class="hm-wishlist">
                                <a href="wishlist.html">
                                    <span class="cart-item-count wishlist-item-count">0</span>
                                    <i class="fa fa-heart-o"></i>
                                </a>
                            </li>
                            <!-- Header Middle Wishlist Area End Here -->
                            <!-- Begin Header Mini Cart Area -->
                            <li class="hm-minicart">
                                <div class="hm-minicart-trigger">
                                    <span class="item-icon"></span>
                                    <span class="item-text">{{Cart::subtotal(0, ",", ",")}}đ
                                                    <span class="cart-item-count">{{Cart::count()}}</span>
                                                </span>
                                </div>
                                <span></span>
                                <div class="minicart">
                                    <ul class="minicart-product-list">
                                        @foreach(Cart::content() as $cartItem)
                                        <li>
                                            <a href="single-product.html" class="minicart-product-image">
                                                <img src="{{$cartItem->options->avatar_product}}" alt="cart products">
                                            </a>
                                            <div class="minicart-product-details">
                                                <h6><a href="single-product.html">{{$cartItem->name}}</a></h6>
                                                <span>{{number_format($cartItem->price)}} x {{$cartItem->qty}}</span>
                                            </div>
                                            <a class="close" title="Remove" href="{{ route('shopping-cart.destroy',$cartItem->rowId) }}">
                                                <i class="fa fa-close"></i>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>
                                    <p class="minicart-total">SUBTOTAL: <span>{{Cart::subtotal(0, ",", ",")}}đ</span></p>
                                    <div class="minicart-button">
                                        <a href="{{ route('shopping-cart.index') }}" class="li-button li-button-fullwidth li-button-dark">
                                            <span>Xem giỏ hàng</span>
                                        </a>
                                        <a href="{{ route('checkout.index') }}" class="li-button li-button-fullwidth">
                                            <span>Thanh toán</span>
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <!-- Header Mini Cart Area End Here -->
                        </ul>
                    </div>
                    <!-- Header Middle Right Area End Here -->
                </div>
                <!-- Header Middle Right Area End Here -->
            </div>
        </div>
    </div>
    <!-- Header Middle Area End Here -->
    <!-- Begin Header Bottom Area -->
    <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Begin Header Bottom Menu Area -->
                   @include('home::homes.components.menu')
                    <!-- Header Bottom Menu Area End Here -->
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End Here -->
    <!-- Begin Mobile Menu Area -->
    <div class="mobile-menu-area d-lg-none d-xl-none col-12">
        <div class="container">
            <div class="row">
                <div class="mobile-menu">
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu Area End Here -->
</header>
