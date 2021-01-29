<!-- Header Container  -->
<header id="header" class=" typeheader-1">
    <!-- Header Top -->
    <div id="header" class=" typeheader-2">
        <div class="header-top2 hidden-compact">
            <div class="container">
                <div class="row">
                    <div class="header-top2-left  col-lg-6  col-sm-7 col-md-6 hidden-xs">
                        <div class="list-contact">
                            <div class="contact-html clearfix">
                                <span style="margin-right: 20px;"><i class="fa fa-envelope"></i> {{$e_email->config_value}}</span>
                                <span><i class="fa fa-location-arrow"></i> {{$e_location->config_value}}</span>
                            </div>
                        </div>
                    </div>
                    <div class="header-top2-right collapsed-block col-lg-6 col-sm-5 col-md-6 col-xs-12 ">
                        <div class="tabBlock" id="TabBlock-1">
                            <ul class="top-link list-inline">
                                @if(Auth::check())
                                    <li id="my_account">
                                        <a href="#" title="My Account" class="btn-xs dropdown-toggle " data-toggle="dropdown"> <i class="fa fa-user-circle"></i><span> {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span> <span class="fa fa-angle-down"></span></a>
                                        <ul class="dropdown-menu ">

                                            <li><a href="{{ route('home.profile') }}">My Account</a></li>
                                            <li class="checkout"><a href="{{ route('checkout.index') }}" class="btn-link" title="Checkout "><span >Checkout </span></a></li>
                                            <li><a href={{ route('home.logout') }}#">Đăng xuất</a></li>


                                        </ul>
                                    </li>
                                @else
                                    <li class="login">

                                        <a class="link-lg" href="{{ route('home.register') }}">Đăng ký </a> /
                                        <a class="link-lg" href="{{ route('home.getlogin') }}">Đăng nhập </a>
                                    </li>
                                @endif
                                <!-- LANGUAGE CURENTY -->
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="header-top hidden-compact">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-xs-6 header-logo ">
                    <div class="navbar-logo">
                        <a href="#"><img src="image/logo/logo.png" alt="Your Store" width="210" height="35" title="Your Store"></a>
                    </div>
                </div>
                <div class="col-lg-7 header-sevices">
                    <div class="module html--sevices ">
                        <div class="clearfix sevices-menu sevices-info">
                            <ul>
                                <li class="col-md-4">
                                    <div class="media-icon">
                                        <div class="media-left">
                                            <i class="fa fa-home"></i>
                                        </div>
                                        <div class="media-body">
                                            <p>{{$e_location->config_value}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="media-icon">
                                        <div class="media-left">
                                            <i class="fa fa-envelope"></i>
                                        </div>
                                        <div class="media-body">
                                            <p>{{$e_email->config_value}}<br>+84 {{$e_phone->config_value}}</p>
                                        </div>
                                    </div>
                                </li>
                                <li class="col-md-4">
                                    <div class="media-icon">
                                        <div class="media-left">
                                            <i class="fa fa-paper-plane"></i>
                                        </div>
                                        <div class="media-body">
                                            <p>Miễn phí ship tại  Đà Nẵng<br>
                                                Với đơn hàng trên 100,000đ</p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-xs-6 header-cart">
                    <div class="shopping_cart">
                        <div id="cart" class="btn-shopping-cart">
                            <a data-loading-text="Loading... " class="btn-group top_cart dropdown-toggle" data-toggle="dropdown">
                                <div class="shopcart">
                                    <i class="handle pull-left"></i>
                                    <span class="cart-quantity">{{ Cart::content()->count()}}</span>
                                    <div class="cart-info">
                                        <h2 class="title-cart">Giỏ hàng của bạn</h2>
                                        <span class="total-shopping-cart cart-total-full">
																			<span class="items_cart">Total: </span>
																		<span class="items_cart2">{{Cart::subtotal(0, ",", ",")}}đ</span>
																		</span>
                                    </div>
                                </div>
                            </a>
                            @if (Cart::content()->count() == 0)
                                <div class="dropdown-menu pull-right shoppingcart-box">
                                    <div class="text-center">
                                        <img width="150" src="image/empty-cart.png">
                                    </div>
                                </div>
                            @else
                                <ul class="dropdown-menu pull-right shoppingcart-box">
                                    <li class="content-item">
                                        @foreach(Cart::content() as $cartItem)
                                            <table class="table table-striped" style="margin-bottom:10px;">
                                                <tbody>
                                                <tr>
                                                    <td class="text-center size-img-cart">
                                                        <a href="product.html"><img src="{{asset('public'.$cartItem->options->avatar_product)}}" alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo" title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo" class="img-thumbnail"></a>
                                                    </td>
                                                    <td class="text-left"><a href="product.html">{{$cartItem->name}}</a>
                                                        <br> - <small>Size M</small> </td>
                                                    <td class="text-right">x{{$cartItem->qty}}</td>
                                                    <td class="text-right">{{number_format($cartItem->price)}}</td>
                                                    <td class="text-center">
                                                        <a href="{{ route('shopping-cart.destroy',$cartItem->rowId) }}" title="Xóa" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        @endforeach
                                    </li>
                                    <li>
                                        <div class="checkout clearfix">
                                            <a href="{{ route('shopping-cart.index') }}" class="btn btn-view-cart inverse"> Giỏ hàng</a>
                                            <a href="{{ route('checkout.index') }}" class="btn btn-checkout pull-right">Thanh toán</a>
                                        </div>
                                    </li>
                                </ul>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- //Header Top -->
    <!-- Header center -->
    <div class="header-center">
        <div class="container">
            <div class="row">
                <!-- Menuhome -->
                 @include('home::homes.components.menu')
                <!--Searchhome-->
                <div class="col-lg-4 col-md-4 col-sm-11 col-xs-9 header-search">
                    <div id="sosearchpro" class="sosearchpro-wrapper so-search ">
                        <form method="GET" action="{{URL::to('search')}}">
                            <div id="search0" class="search input-group form-group">
                                <div class="select_category filter_type  icon-select">
                                    <select class="no-border" name="category">
                                        <option value="">Tất cả</option>
                                        {!! $htmlOption !!}
                                    </select>
                                </div>
                                <input class="autosearch-input form-control" type="text" value="" size="50" autocomplete="off" placeholder="Search" name="keyword">

                                <span class="input-group-btn">
                                 <button type="submit" class="button-search btn btn-default btn-lg" ><i class="fa fa-search"></i><span class="hidden">Search</span></button>
                                 </span>
                            </div>
                            <input type="hidden">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</header>
<!-- //Header Container  -->
