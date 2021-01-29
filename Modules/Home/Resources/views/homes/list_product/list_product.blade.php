@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class="container product-detail">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                @if($data_cate2 !== null)
                    @if ($data_cate3 == '')
                        <li><a href="{{ route('home.product_list', [$data_cate1->slug, '0','0', $data_cate1->id])}}">{{$data_cate1->name}}</a></li>
                        <li><a >{{$data_cate2->name}}</a></li>
                    @else
                        <li><a href="{{ route('home.product_list', [$data_cate1->slug, '0','0', $data_cate1->id])}}">{{$data_cate1->name}}</a></li>
                        <li><a href="{{route('home.product_list',[$data_cate1->slug, $data_cate2->slug,'00', $data_cate2->id])}}">{{$data_cate2->name}}</a></li>
                        <li><a>{{$data_cate3->name}}</a></li>
                    @endif
                @else
                    @if ($data_cate3 == '' && $data_cate2 == null)
                        <li><a>{{$data_cate1->name}}</a></li>
                    @else
                        <li><a href="{{ route('home.product_list', [$data_cate1->slug, '0','0', $data_cate1->id])}}">{{$data_cate1->name}}</a></li>
                        <li><a href="{{route('home.product_list',[$data_cate1->slug, $data_cate2->slug,'00', $data_cate2->id])}}">{{$data_cate2->name}}</a></li>
                        <li><a>{{$data_cate3->name}}</a></li>
                    @endif
                @endif



            </ul>
        </div>
        <div class="row">
            <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas">
                <span id="close-sidebar" class="fa fa-times"></span>
                <div class="module so_filter_wrap filter-horizontal">
                    <h3 class="modtitle"><span>SHOP BY</span></h3>
                    <div class="modcontent">
                        <ul>
                            <li class="so-filter-options" data-option="search">
                                <div class="so-filter-heading">
                                    <div class="so-filter-heading-text">
                                        <span>Search</span>
                                    </div>
                                    <i class="fa fa-chevron-down"></i>
                                </div>

                                <div class="so-filter-content-opts">
                                    <div class="so-filter-content-opts-container">
                                        <div class="so-filter-option" data-type="search">
                                            <div class="so-option-container">
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="text_search" id="text_search" value="">
                                                    <div class="input-group-btn">
                                                        <button class="btn btn-default" type="button" id="submit_text_search"><i class="fa fa-search"></i></button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            @if ($listProductTypes == '')

                            @else
                            <li class="so-filter-options" data-option="Manufacturer">
                                    <div class="so-filter-heading">
                                        <div class="so-filter-heading-text">
                                            <span>Thương hiệu</span>
                                        </div>
                                        <i class="fa fa-chevron-down"></i>
                                    </div>

                                    <div class="so-filter-content-opts">
                                        <div class="so-filter-content-opts-container">
                                            @foreach($listProductTypes as $typePro)
                                                <div class="so-filter-option opt-select  opt_enable" data-type="manufacturer" data-manufacturer_value="8" data-count_product="4" data-list_product="30,58,61,105">
                                                    <div class="so-option-container">
                                                        <div class="option-input">
													<span class="fa fa-square-o">
													</span>
                                                        </div>
                                                        <label><a href="{{request()->fullUrlWithQuery(['parent_id' => $typePro->id])}}">{{ $typePro->name }}</a></label>
{{--                                                        <div class="option-count ">--}}
{{--                                                            <span>{{ $typePro->products->count() }}</span>--}}
{{--                                                            <i class="fa fa-times"></i>--}}
{{--                                                        </div>--}}
                                                    </div>
                                                </div>
                                            @endforeach

                                        </div>
                                    </div>
                            </li>
                            @endif
                            <li class="so-filter-options" data-option="Price">
                                <div class="so-filter-heading">
                                    <div class="so-filter-heading-text">
                                        <span>Giá</span>
                                    </div>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="so-filter-content-opts">
                                    <div class="so-filter-content-opts-container">
                                        <div class="so-filter-content-wrapper so-filter-iscroll">
                                            <div class="so-filter-options">
                                                <form action="" method="GET" id="range_price">
                                                    <div class="so-filter-option so-filter-price">
                                                        <div class="content_min_max">
                                                            <div class="put-min put-min_max">
                                                                <input
                                                                        style="width: max-content;"
                                                                        type="number"
                                                                        name="min_price"
                                                                        class="input_min form-control"
                                                                        value="{{Request::get('min_price') != '' ? (int)Request::get('min_price') : (int)$price_min}}"
                                                                        min="{{$price_min}}" max="{{$price_max}}">
                                                            </div>
                                                            <div class="put-max put-min_max">
                                                                <input type="number"
                                                                       style="width: max-content;"
                                                                           name="max_price"
                                                                           class="input_max form-control"
                                                                           value="{{Request::get('max_price') != '' ? (int)Request::get('max_price') : (int)$price_max}}"
                                                                           min="{{$price_min}}" max="{{$price_max}}">
                                                            </div>
                                                        </div>
                                                        <div class="content_scroll">
                                                            <div id="slider-range"></div>
                                                        </div>
                                                        <button class="btn btn-default inverse" id="mc-submit" type="submit">
                                                            <span class="hidden fa fa-times" aria-hidden="true"></span> Áp dụng
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </li>
                             <li class="so-filter-options" data-option="Price">
                                <div class="so-filter-heading">
                                    <div class="so-filter-heading-text">
                                        <span>Đánh Giá</span>
                                    </div>
                                    <i class="fa fa-chevron-down"></i>
                                </div>
                                <div class="so-filter-content-opts">
                                    <div class="so-filter-content-opts-container">
                                        <div class="so-filter-content-wrapper so-filter-iscroll">
                                            <div class="so-filter-options">
                                                <form action="" method="GET" id="range_price">
                                                    <div class="so-filter-option so-filter-price">
                                                        <div class="checkbox">
                                                            <label><input type="checkbox">
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                </div>
                                                            </label>
                                                          </div>
                                                          <div class="checkbox">
                                                            <label><input type="checkbox">
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                </div>
                                                            </label>
                                                          </div>
                                                          <div class="checkbox">
                                                            <label><input type="checkbox">
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                </div>
                                                            </label>
                                                          </div>
                                                          <div class="checkbox">
                                                            <label><input type="checkbox">
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                </div>
                                                            </label>
                                                          </div>
                                                          <div class="checkbox">
                                                            <label><input type="checkbox">
                                                                <div class="pro-rating">
                                                                    <a href="#"><i class="fa fa-star"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                    <a href="#"><i class="fa fa-star-o"></i></a>
                                                                </div>
                                                            </label>
                                                          </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                             </li>
                        </ul>
{{--                    <div class="clear_filter">--}}
{{--                        <a href="javascript:;" class="btn btn-default inverse" id="btn_resetAll">--}}
{{--                            <span class="hidden fa fa-times" aria-hidden="true"></span> Reset All--}}
{{--                        </a>--}}
{{--                    </div>--}}
                </div>
        </div>
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
        </aside>
        <div id="content" class="col-md-9 col-sm-12 col-xs-12">
            <a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i>Sidebar</a>

            <div class="products-category">
                <div class="form-group clearfix">
                    <h3 class="title-category ">Có tổng tất cả {{$products_count}} sản phẩm</h3>
                </div>
                <div class="products-category">
                    <div class="product-filter filters-panel">
                        <div class="row">
                            <div class="col-sm-2 view-mode hidden-sm hidden-xs">
                                <div class="list-view">
                                    <button class="btn btn-default grid active" data-view="grid" data-toggle="tooltip"  data-original-title="Grid"><i class="fa fa-th"></i></button>
                                    <button class="btn btn-default list" data-view="list" data-toggle="tooltip" data-original-title="List"><i class="fa fa-th-list"></i></button>
                                </div>
                            </div>

                            <div class="short-by-show form-inline text-right col-md-10 col-sm-12">
                                <div class="form-group">
                                    {{ $products->links('home::homes.pagination.show') }}
                                </div>
                                    @php
                                        $queries = request()->except(['filter_sort','page']);
                                    @endphp
                                    @foreach ($queries as $key => $query)
                                        <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                                    @endforeach
                                    <div class="form-group short-by">
                                        <form action="" method="GET" id="filter_sort">
                                        <label class="control-label" for="input-sort">Sắp xếp:</label>
                                        <select id="input-sort" class="form-control" name="filter_sort">
                                            <option value="">Tất cả sản phẩm</option>
                                            <option value="price_asc" {{ ($filter_sort =='price_asc')?'selected':'' }}>Theo giá tăng dần</option>
                                            <option value="price_desc" {{ ($filter_sort =='price_desc')?'selected':'' }}>Theo giá giảm dần</option>
                                            <option value="id_desc" {{ ($filter_sort =='id_desc')?'selected':'' }}>Sản phẩm mới nhất</option>
                                            <option value="id_asc" {{ ($filter_sort =='id_asc')?'selected':'' }}>Sản phẩm cũ nhất</option>
                                        </select>
                                        </form>
                                    </div>


                            </div>

                        </div>
                    </div>
                    <div class="products-list grid row number-col-3 so-filter-gird">
                        @foreach($products as $pro)
                            @if (count($products) == 0)
                                <h3>Dữ liệu data chưa có</h3>
                            @else
                                <div class="product-layout col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                    <div class="product-item-container">
                                        <div class="left-block">
                                            <div class="product-image-container  second_img  ">
                                                <a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}" >
                                                    <img src="{{asset('public'.$pro->avata_image_path)}}"  class="img-1 img-responsive">
                                                    <img src="{{asset('public'.$pro->avata_image_path)}}" class="img-2 img-responsive">
                                                </a>
                                            </div>
                                            @if ($pro->pro_hot == 0 )

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
                                                <h4><a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">{{ $pro->name }}</a></h4>
                                                <div class="total-price">
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
                                                <div class="description item-desc hidden">
                                                    <p>Mô tả</p>
                                                </div>
                                                <div class="list-block hidden">
                                                    <a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">
                                                        <button class="addToCart" type="button"  data-toggle="tooltip" title="" data-original-title="Xem chi tiết sản phẩm"><span>Xem chi tiết sản phẩm </span></button>
                                                    </a>

{{--                                                    <button class="wishlist btn-button" type="button" data-toggle="tooltip" title=""  data-original-title="Add to Wish List "><i class="fa fa-heart-o"></i></button>--}}
{{--                                                    <button class="compare btn-button" type="button" data-toggle="tooltip" title=""  data-original-title="Compare this Product "><i class="fa fa-retweet"></i></button>--}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>

                    <div class="product-filter product-filter-bottom filters-panel">
                        <div class="col-sm-6 text-left">
                            {{ $products->links() }}
                        </div>
                        <div class="col-sm-6 text-right">{{ $products->links('home::homes.pagination.show') }}</div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
@push('style')
{{--    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>--}}
{{--    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>--}}
@endpush
@push('scripts')
    <script type="text/javascript">
        $('[name="filter_sort"]').change(function(event) {
            $('#filter_sort').submit();
        });
    </script>
    <script>

        $(window).load(function($){
            $ = typeof($ !== 'funtion') ? jQuery : $;
            @if( (Request::get('max_price') & Request::get('min_price')) || Request::get('max_price') || Request::get('min_price') )
                var $minPrice			= {{$price_min}},
                    $maxPrice 			= {{$price_max}},
                    $minPrice_new 		= {{(int)Request::get('min_price')}},
                    $maxPrice_new 		= {{(int)Request::get('max_price')}}
            @else
                var $minPrice			= {{$price_min}},
                    $maxPrice 			= {{$price_max}},
                    $minPrice_new 		= {{(int)$price_min}},
                    $maxPrice_new 		= {{(int)$price_max}}
                @endif


            var range = document.getElementById('slider-range');
            noUiSlider.create(range, {
                start: [$minPrice_new, $maxPrice_new],
                step: 1,
                connect: true,
                range: {
                    'min': {{$price_min}},
                    'max': {{$price_max}}
                },
                slide: function(event, ui) {
                    if ($minPrice == $maxPrice) {
                        return false;
                    }
                }
            });

            var valueMin = $('.content_min_max .input_min'),
                valueMax = $('.content_min_max .input_max');

            range.noUiSlider.on('change', function( values, handle ) {
                if ( handle ) {

                    valueMax.val(values[handle]);
                    $maxPrice_new = values[handle];

                } else {
                    valueMin.val(values[handle]);
                    $minPrice_new = values[handle];

                }


            });




        });
    </script>
@endpush
