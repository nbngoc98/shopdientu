<div class="moduletable module so-extraslider-ltr best-seller best-seller-custom">
    <h3 class="modtitle"><span>Sản phẩm nổi bật</span></h3>
    <div class="modcontent">
        <div id="so_extra_slider" class="so-extraslider buttom-type1 preset00-1 preset01-1 preset02-1 preset03-1 preset04-1 button-type1">
            <div class="extraslider-inner owl2-carousel owl2-theme owl2-loaded extra-animate" data-effect="none">
                <div class="item">
                    @foreach($products_hot as $pro_hot)
                        <div class="item-wrap style1 ">
                            <div class="item-wrap-inner">
                                <div class="media-left">
                                    <div class="item-image">
                                        <div class="item-img-info product-image-container ">
                                            <div class="box-label">
                                            </div>
                                            <a class="lt-image" data-product="104" href="{{route('home.product_detail',['slug'=> $pro_hot->slug, 'id'=> $pro_hot->id])}}" target="_self" title="">
                                                <img src="{{asset('public'.$pro_hot->avata_image_path)}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="item-info">
                                        <!-- Begin title -->
                                        <div class="item-title">
                                            <a href="{{route('home.product_detail',['slug'=> $pro_hot->slug, 'id'=> $pro_hot->id])}}" target="_self" title="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2) ">
                                                {{ $pro_hot->name }}
                                            </a>
                                        </div>
                                        <!-- Begin ratting -->
                                        <div class="pro-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </div>
                                        <!-- Begin item-content -->
                                        @if ($pro_hot->pro_sale == 0 )
                                            <div class="price">
                                                <span class="old-price product-price">{{ number_format($pro_hot->price) }}đ</span>
                                            </div>
                                        @else
                                            <div class="price">
                                                <span class="old-price product-price">{{ number_format($pro_hot->price-($pro_hot->price * $pro_hot->pro_sale/ 100)) }}đ</span>
                                                <span class="price-old">{{ number_format($pro_hot->price) }}đ</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <!-- End item-info -->
                            </div>
                            <!-- End item-wrap-inner -->
                        </div>
                    @endforeach
                </div>
                <div class="item">
                    @foreach($products_new as $pro_hot)
                        <div class="item-wrap style1 ">
                            <div class="item-wrap-inner">
                                <div class="media-left">
                                    <div class="item-image">
                                        <div class="item-img-info product-image-container ">
                                            <div class="box-label">
                                            </div>
                                            <a class="lt-image" data-product="104" href="{{route('home.product_detail',['slug'=> $pro_hot->slug, 'id'=> $pro_hot->id])}}" target="_self" title="">
                                                <img src="{{asset('public'.$pro_hot->avata_image_path)}}" alt="">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="media-body">
                                    <div class="item-info">
                                        <!-- Begin title -->
                                        <div class="item-title">
                                            <a href="{{route('home.product_detail',['slug'=> $pro_hot->slug, 'id'=> $pro_hot->id])}}" target="_self" title="Toshiba Pro 21&quot;(21:9) FHD  IPS LED 1920X1080 HDMI(2) ">
                                                {{ $pro_hot->name }}
                                            </a>
                                        </div>
                                        <!-- Begin ratting -->
                                        <div class="pro-rating">
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star"></i></a>
                                            <a href="#"><i class="fa fa-star-o"></i></a>
                                        </div>
                                        <!-- Begin item-content -->
                                        @if ($pro_hot->pro_sale == 0 )
                                            <div class="price">
                                                <span class="old-price product-price">{{ number_format($pro_hot->price) }}đ</span>
                                            </div>
                                        @else
                                            <div class="price">
                                                <span class="old-price product-price">{{ number_format($pro_hot->price-($pro_hot->price * $pro_hot->pro_sale/ 100)) }}đ</span>
                                                <span class="price-old">{{ number_format($pro_hot->price) }}đ</span>
                                            </div>
                                        @endif

                                    </div>
                                </div>
                                <!-- End item-info -->
                            </div>
                            <!-- End item-wrap-inner -->
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
