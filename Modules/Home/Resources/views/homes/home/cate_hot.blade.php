
<section id="box-link3" class="section-style">
    <div class="container page-builder-ltr">
        <div class="row row-style row_a3">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_nvxr  block block_6 title_neo3">
                <div class="module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                    <div class="head-title font-ct background2">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                                <h2 class="modtitle"><i class="fas fa-mobile-alt"></i> Điện thoại</h2>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                <a class="xemthem" href="{{ route('home.product_list', ['dien-thoai', '0','0', '1'])}}">Xem thêm <i class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modcontent">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content">
                                    <div class="products-list grid row number-col-4 so-filter-gird">
                                        @foreach($dienthoai as $item)
                                        <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                            <div class="product-item-container">
                                                <div class="left-block">
                                                    <div class="product-image-container  second_img  ">
                                                        <a href="{{route('home.product_detail',['slug'=> $item->slug, 'id'=> $item->id])}}" title=" ">
                                                            <img src="{{asset('public'.$item->avata_image_path)}}" alt="" title="" class="">
                                                        </a>
                                                    </div>
{{--                                                    <div class="countdown_box">--}}
{{--                                                        <div class="countdown_inner">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    @if ($item->pro_hot == 0 )

                                                    @else
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">
                                                                New
                                                            </span>
                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="{{route('home.product_detail',['slug'=> $item->slug, 'id'=> $item->id])}}">{{ $item->name }}</a></h4>
                                                        <div class="total-price">
                                                            @if ($item->pro_sale == 0 )
                                                                <div class="price price-left">
                                                                    <span class="price-new">{{ number_format($item->price) }}đ </span>
                                                                </div>
                                                            @else
                                                                <div class="price price-left">
                                                                    <span class="price-new">{{ number_format($item->price-($item->price * $item->pro_sale/ 100)) }}đ </span> <span class="price-old">{{ number_format($item->price) }}đ </span>
                                                                </div>
                                                            @endif

                                                            @if ($item->pro_sale == 0 )

                                                            @else
                                                                <div class="price-sale price-right">
                                                                <span class="discount">-{{$item->pro_sale}}%
                                                                    <strong>Sale</strong>
                                                                </span>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="description item-desc hidden">
                                                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
                                                        </div>
                                                        <div class="list-block hidden">
                                                            <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><span>Add to Cart </span></button>
                                                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                                                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                                                        </div>
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


                </div>
            </div>
        </div>
    </div>
</section>
<section id="box-link4" class="section-style">
    <div class="container page-builder-ltr">
        <div class="row row-style row_a4">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_mfpr  block block_7 title_neo4">
                <div class="module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                    <div class="head-title font-ct background2">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                                <h2 class="modtitle"> Lapptop</h2>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                <a class="xemthem" href="{{ route('home.product_list', ['lapptop', '0','0', '2'])}}">Xem thêm <i class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modcontent">
                        <div class="row">

                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="tab-content">
                                    <div class="products-list grid row number-col-3 so-filter-gird">
                                        @foreach($lapptop as $item)
                                            <div class="product-layout col-lg-3 col-md-3 col-sm-6 col-xs-6">
                                                <div class="product-item-container">
                                                    <div class="left-block">
                                                        <div class="product-image-container  second_img  ">
                                                            <a href="{{route('home.product_detail',['slug'=> $item->slug, 'id'=> $item->id])}}" title=" ">
                                                                <img src="{{asset('public'.$item->avata_image_path)}}" alt="" title="" class="">
                                                            </a>
                                                        </div>
                                                        {{--                                                    <div class="countdown_box">--}}
                                                        {{--                                                        <div class="countdown_inner">--}}
                                                        {{--                                                        </div>--}}
                                                        {{--                                                    </div>--}}
                                                        @if ($item->pro_hot == 0 )

                                                        @else
                                                            <div class="box-label">
                                                            <span class="label-product label-sale">
                                                                New
                                                            </span>
                                                            </div>
                                                        @endif

                                                    </div>

                                                    <div class="right-block">
                                                        <div class="caption">
                                                            <h4><a href="{{route('home.product_detail',['slug'=> $item->slug, 'id'=> $item->id])}}">{{ $item->name }}</a></h4>
                                                            <div class="total-price">
                                                                @if ($item->pro_sale == 0 )
                                                                    <div class="price price-left">
                                                                        <span class="price-new">{{ number_format($item->price) }}đ </span>
                                                                    </div>
                                                                @else
                                                                    <div class="price price-left">
                                                                        <span class="price-new">{{ number_format($item->price-($item->price * $item->pro_sale/ 100)) }}đ </span> <span class="price-old">{{ number_format($item->price) }}đ </span>
                                                                    </div>
                                                                @endif

                                                                @if ($item->pro_sale == 0 )

                                                                @else
                                                                    <div class="price-sale price-right">
                                                               <span class="discount">-{{$item->pro_sale}}%
                                                                    <strong>Sale</strong>
                                                                </span>
                                                                    </div>
                                                                @endif

                                                            </div>
                                                            <div class="description item-desc hidden">
                                                                <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
                                                            </div>
                                                            <div class="list-block hidden">
                                                                <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><span>Add to Cart </span></button>
                                                                <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                                                                <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                                                            </div>
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
                </div>
            </div>
        </div>
    </div>
</section>
<section id="box-link5" class="section-style">
    <div class="container page-builder-ltr">
        <div class="row row-style row_a2">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 col_1bi4  col-style block block_5 title_neo2">
                <div class="module so-listing-tabs-ltr default-nav clearfix img-float label-1 home-lt1">
                    <div class="head-title font-ct background2">
                        <div class="row">
                            <div class="col-lg-10 col-md-10 col-sm-9 col-xs-9">
                                <h2 class="modtitle"><i class="far fa-clock"></i> Đồng hồ</h2>
                            </div>
                            <div class="col-lg-2 col-md-2 col-sm-3 col-xs-3">
                                <a class="xemthem" href="{{ route('home.product_list', ['dong-ho', '0','0', '5'])}}">Xem thêm <i class="fa fa-caret-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="modcontent">
                        <div class="tab-content">
                            <div class="so-deal modcontent products-list grid clearfix clearfix preset00-3 preset01-3 preset02-2 preset03-2 preset04-1  button-type1  style2">
                                <div class="category-slider-inner products-list yt-content-slider" data-rtl="yes" data-autoplay="yes" data-autoheight="no" data-delay="4" data-speed="0.6" data-margin="30" data-items_column00="3" data-items_column0="3" data-items_column1="3" data-items_column2="2"  data-items_column3="2" data-items_column4="1" data-arrows="no" data-pagination="no" data-lazyload="yes" data-loop="yes" data-hoverpause="yes">
                                    @foreach($clock as $item)
                                    <div class="item">
                                        <div class="transition product-layout">
                                            <div class="product-item-container">
                                                <div class="left-block">
                                                    <div class="product-image-container  second_img  ">
                                                        <a href="{{route('home.product_detail',['slug'=> $item->slug, 'id'=> $item->id])}}" title=" ">
                                                            <img src="{{asset('public'.$item->avata_image_path)}}" alt="" title="" class="">
                                                        </a>
                                                    </div>
{{--                                                    <div class="countdown_box">--}}
{{--                                                        <div class="countdown_inner">--}}
{{--                                                        </div>--}}
{{--                                                    </div>--}}
                                                    @if ($item->pro_hot == 0 )

                                                    @else
                                                        <div class="box-label">
                                                            <span class="label-product label-sale">
                                                                New
                                                            </span>
                                                        </div>
                                                    @endif

                                                </div>

                                                <div class="right-block">
                                                    <div class="caption">
                                                        <h4><a href="{{route('home.product_detail',['slug'=> $item->slug, 'id'=> $item->id])}}">{{ $item->name }}</a></h4>
                                                        <div class="total-price">
                                                            @if ($item->pro_sale == 0 )
                                                                <div class="price price-left">
                                                                    <span class="price-new">{{ number_format($item->price) }}đ </span>
                                                                </div>
                                                            @else
                                                                <div class="price price-left">
                                                                    <span class="price-new">{{ number_format($item->price-($item->price * $item->pro_sale/ 100)) }}đ </span> <span class="price-old">{{ number_format($item->price) }}đ </span>
                                                                </div>
                                                            @endif

                                                            @if ($item->pro_sale == 0 )

                                                            @else
                                                                <div class="price-sale price-right">
                                                                <span class="discount">-{{$item->pro_sale}}%
                                                                    <strong>Sale</strong>
                                                                </span>
                                                                </div>
                                                            @endif

                                                        </div>
                                                        <div class="description item-desc hidden">
                                                            <p>The 30-inch Apple Cinema HD Display delivers an amazing 2560 x 1600 pixel resolution. Designed specifically for the creative professional, this display provides more space for easier access to all the.. </p>
                                                        </div>
                                                        <div class="list-block hidden">
                                                            <button class="addToCart" type="button" data-toggle="tooltip" title="" onclick="cart.add('30 ', '1 ');" data-original-title="Add to Cart "><span>Add to Cart </span></button>
                                                            <button class="wishlist btn-button" type="button" data-toggle="tooltip" title="" onclick="wishlist.add('30 ');" data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>
                                                            <button class="compare btn-button" type="button" data-toggle="tooltip" title="" onclick="compare.add('30 ');" data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>
                                                        </div>
                                                    </div>
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
            </div>
        </div>
    </div>
</section>
