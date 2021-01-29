<div class="content-product-bottom bottom-product clearfix">
    <ul class="nav nav-tabs">
        @if (count($related_product) > 0)
            <li class="active"><a data-toggle="tab" href="#product-related">SẢN PHẨM LIÊN QUAN</a></li>
        @endif

        @if (count($sale_product) > 0)
            <li><a data-toggle="tab" href="#product-upsell">SẢN PHẨM ĐANG SALE</a></li>
        @endif

    </ul>
    <div class="tab-content">
        <div id="product-related" class="tab-pane fade in active">
            <div class="clearfix module horizontal">
                <div class="products-category">
                    <div class="category-slider-inner products-list yt-content-slider releate-products grid" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="3" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                        @foreach($related_product as $pro)
                        <div class="product-layout">
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container">
                                        <a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">
                                            <img src="{{asset('public'.$pro->avata_image_path)}}"  class="img-1 img-responsive">
                                        </a>
                                    </div>
                                </div>
                                @if ($pro->pro_hot == 0 )

                                @else
                                    <div class="box-label">
                                                    <span class="label-product label-sale">
                                                        New
                                                    </span>
                                    </div>
                                @endif
                                <div class="right-block">
                                    <div class="caption">
                                        <h4><a href={{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">{{$pro->name}}</a></h4>
                                        <div class="total-price clearfix" style="visibility: hidden; display: block;">
                                            @if ($pro->pro_sale == 0 )
                                                <div class="price price-left">
                                                    <span class="price-new">{{ number_format($pro->price) }}đ </span>
                                                </div>
                                            @else
                                                <div class="price price-left">
                                                    <span class="price-new">{{ number_format($pro->price-($pro->price * $pro->pro_sale/ 100)) }}đ </span> <span class="price-old">{{ number_format($pro->price) }}đ </span>
                                                </div>
                                            @endif
                                            @if ($pro->pro_sale == 0 )

                                            @else
                                                <div class="price-sale price-right">
                                                                <span class="discount">-{{$pro->pro_sale}}%
                                                                    <strong>Sale</strong>
                                                                </span>
                                                </div>
                                            @endif
                                        </div>
{{--                                        <div class="button-group">--}}
{{--                                            <div class="button-inner so-quickview">--}}
{{--                                                <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title=""--}}
{{--                                                   data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> Xem sản phẩm </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="product-upsell" class="tab-pane fade in">
            <div class="clearfix module horizontal">
                <div class="products-category">
                    <div class="category-slider-inner products-list yt-content-slider releate-products grid"releate-products products-list grid contentslider" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column0="3" data-items_column1="3" data-items_column2="2" data-items_column3="2" data-items_column4="1" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                    @foreach($sale_product as $pro)
                        <div class="product-layout">
                            <div class="product-item-container">
                                <div class="left-block">
                                    <div class="product-image-container">
                                        <a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">
                                            <img src="{{asset('public'.$pro->avata_image_path)}}"  class="img-1 img-responsive">
                                        </a>
                                    </div>
                                </div>
                                @if ($pro->pro_hot == 0 )

                                @else
                                    <div class="box-label">
                                                    <span class="label-product label-sale">
                                                        New
                                                    </span>
                                    </div>
                                @endif
                                <div class="right-block">
                                    <div class="caption">
                                        <h4><a href={{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">{{$pro->name}}</a></h4>
                                        <div class="total-price clearfix" style="visibility: hidden; display: block;">
                                            @if ($pro->pro_sale == 0 )
                                                <div class="price price-left">
                                                    <span class="price-new">{{ number_format($pro->price) }}đ </span>
                                                </div>
                                            @else
                                                <div class="price price-left">
                                                    <span class="price-new">{{ number_format($pro->price-($pro->price * $pro->pro_sale/ 100)) }}đ </span> <span class="price-old">{{ number_format($pro->price) }}đ </span>
                                                </div>
                                            @endif
                                            @if ($pro->pro_sale == 0 )

                                            @else
                                                <div class="price-sale price-right">
                                                                <span class="discount">-{{$pro->pro_sale}}%
                                                                    <strong>Sale</strong>
                                                                </span>
                                                </div>
                                        @endif
                                    </div>
                                    {{--                                        <div class="button-group">--}}
                                    {{--                                            <div class="button-inner so-quickview">--}}
                                    {{--                                                <a class="quickview iframe-link visible-lg btn-button" data-toggle="tooltip" title=""--}}
                                    {{--                                                   data-fancybox-type="iframe" href="quickview.html" data-original-title="Quickview "> Xem sản phẩm </a>--}}
                                    {{--                                            </div>--}}
                                    {{--                                        </div>--}}
                                </div>
                            </div>
                        </div>
                </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
