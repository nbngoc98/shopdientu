@extends('home::homes.layouts.master')

@section('title')
    <title>{{$title}}</title>
@endsection
@section('content')
{{--    @include('homes.components.content_header', ['name'=> $products->name, 'category'=> $products->category->name])--}}
<div class="content-wraper pt-60 pb-60 pt-sm-30">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="images/bg-banner/2.jpg" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-top-bar start -->
                <div class="shop-top-bar mt-30">
                    <div class="shop-bar-inner">
                        <div class="product-view-mode">
                            <!-- shop-item-filter-list start -->
                            <ul class="nav shop-item-filter-list" role="tablist">
                                <li class="active" role="presentation"><a aria-selected="true" class="active show" data-toggle="tab" role="tab" aria-controls="grid-view" href="#grid-view"><i class="fa fa-th"></i></a></li>
                                <li role="presentation"><a data-toggle="tab" role="tab" aria-controls="list-view" href="#list-view"><i class="fa fa-th-list"></i></a></li>
                            </ul>
                            <!-- shop-item-filter-list end -->
                        </div>
                        <div class="toolbar-amount">
                            {{ $products->links('home::homes.pagination.show') }}
                        </div>
                    </div>
                    <!-- product-select-box start -->
                    <div class="product-select-box">
                        <form action="" method="GET" id="filter_sort">
                        @php
                            $queries = request()->except(['filter_sort','page']);
                        @endphp
                        @foreach ($queries as $key => $query)
                            <input type="hidden" name="{{ $key }}" value="{{ $query }}">
                        @endforeach
                        <div class="product-short">
                            <p>Sort By:</p>
                            <select class="nice-select" name="filter_sort">
                                <option value="">Tất cả sản phẩm</option>
                                <option value="price_asc" {{ ($filter_sort =='price_asc')?'selected':'' }}>Theo giá tăng dần</option>
                                <option value="price_desc" {{ ($filter_sort =='price_desc')?'selected':'' }}>Theo giá giảm dần</option>
{{--                                <option value="name_desc" >Theo tên (z-a)</option>--}}
{{--                                <option value="name_asc" >Theo tên (a-z)</option>--}}
{{--                                <option value="sort_desc" {{ ($filter_sort =='sort_asc')?'selected':'' }}>Theo thứ tự ưu tiên (desc)</option>--}}
{{--                                <option value="sort_asc" {{ ($filter_sort =='sort_desc')?'selected':'' }}>Theo thứ tự ưu tiên (asc)</option>--}}
                                <option value="id_desc" {{ ($filter_sort =='id_desc')?'selected':'' }}>Sản phẩm mới nhất</option>
                                <option value="id_asc" {{ ($filter_sort =='id_asc')?'selected':'' }}>Sản phẩm cũ nhất</option>
                            </select>
                        </div>
                        </form>
                    </div>
                    <!-- product-select-box end -->
                </div>
                <!-- shop-top-bar end -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="grid-view" class="tab-pane fade active show" role="tabpanel">
                            <div class="product-area shop-product-area">
                                <div class="row">
                                    @foreach($products as $pro)
                                        @if (count($products) == 0)
                                            <h3>Dữ liệu data chưa có</h3>
                                        @else
                                            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                                                <!-- single-product-wrap start -->
                                                <div class="single-product-wrap">
                                                    <div class="product-image">
                                                        <a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">
                                                            <img src="{{$pro->avata_image_path}}">
                                                        </a>
                                                        <span class="sticker">New</span>
                                                    </div>
                                                    <div class="product_desc">
                                                        <div class="product_desc_info">
                                                            <div class="product-review">
                                                                <h5 class="manufacturer">
                                                                    <a href="#">{{ $pro->category->name }}</a>
                                                                </h5>
                                                                <div class="rating-box">
                                                                    <ul class="rating">
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <h4><a class="product_name" href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">{{$pro->name}}</a></h4>
                                                            <div class="price-box">
                                                                <span class="new-price">{{ number_format($pro->price) }}đ</span>
                                                            </div>
                                                        </div>
                                                        <div class="add-actions">
                                                            <ul class="add-actions-link">
                                                                <li class="add-cart active"><a href="shopping-cart.html">Thêm giỏ hàng</a></li>
                                                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-eye"></i></a></li>
                                                                <li><a class="links-details" href="wishlist.html"><i class="fa fa-heart-o"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- single-product-wrap end -->
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div id="list-view" class="tab-pane fade product-list-view" role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    @if (count($products) == 0)
                                            <h3>Dữ liệu data chưa có</h3>
                                    @else
                                        <div class="row product-layout-list">
                                            <div class="col-lg-3 col-md-5 ">
                                                <div class="product-image">
                                                    <a href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">
                                                        <img src="{{$pro->avata_image_path}}" alt="Li's Product Image">
                                                    </a>
                                                    <span class="sticker">New</span>
                                                </div>
                                            </div>
                                            <div class="col-lg-5 col-md-7">
                                                <div class="product_desc">
                                                    <div class="product_desc_info">
                                                        <div class="product-review">
                                                            <h5 class="manufacturer">
                                                                <a href="product-details.html">{{ $pro->category->name }}</a>
                                                            </h5>
                                                            <div class="rating-box">
                                                                <ul class="rating">
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <h4><a class="product_name" href="{{route('home.product_detail',['slug'=> $pro->slug, 'id'=> $pro->id])}}">
                                                                {{$pro->name}}</a></h4>
                                                        <div class="price-box">
                                                            <span class="new-price">{{ number_format($pro->price) }}</span>
                                                        </div>
                                                        <p>Beach Camera Exclusive Bundle - Includes Two Samsung Radiant 360 R3 Wi-Fi Bluetooth Speakers. Fill The Entire Room With Exquisite Sound via Ring Radiator Technology. Stream And Control R3 Speakers Wirelessly With Your Smartphone. Sophisticated, Modern Desig</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="shop-add-action mb-xs-30">
                                                    <ul class="add-actions-link">
                                                        <li class="add-cart"><a href="#">Thêm giỏ hàng</a></li>
                                                        <li class="wishlist"><a href="wishlist.html"><i class="fa fa-heart-o"></i>Add to wishlist</a></li>
                                                        <li><a class="quick-view" data-toggle="modal" data-target="#exampleModalCenter" href="#"><i class="fa fa-eye"></i>Quick view</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                            </div>
                        </div>
                        <div class="paginatoin-area">
                            <div class="row">
                                {{ $products->links('home::homes.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                @if ($listProductTypes == '')

                @else
                    <div class="sidebar-categores-box mt-sm-30 mt-xs-30">
                        <div class="sidebar-title">
                            <h2>{{$dataParentCategory-> name}}</h2>
                        </div>
                        @if ($discriminate == 1)
                            <div class="category-sub-menu">
                                <ul>
                                    @foreach($listProductTypes as $typePro)
                                        <li class="has-sub"><a href="#_">{{ $typePro->name }}</a>
                                            <ul>
                                                @foreach($typePro->categoryChildrent as $typeProChildrent)
                                                    <li><a href="{{request()->fullUrlWithQuery(['parent_id' => $typeProChildrent->id])}}">{{ $typeProChildrent->name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @else
                            <ul>
                                @foreach($listProductTypes as $typePro)
                                    <li class="has-sub"><a href="{{request()->fullUrlWithQuery(['parent_id' => $typePro->id])}}">{{ $typePro->name }}</a></li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                @endif

                <!--sidebar-categores-box end  -->
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Tùy chọn lọc</h2>
                    </div>
                    <!-- btn-clear-all start -->
                    <button class="btn-clear-all mb-sm-30 mb-xs-30">Clear all</button>
                    <!-- btn-clear-all end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area">
                        <h5 class="filter-sub-titel">Thương hiệu</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Prime Video (13)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Computers (12)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Electronics (11)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
                    <!-- filter-sub-area start -->
                    <div class="filter-sub-area pt-sm-10 pt-xs-10">
                        <h5 class="filter-sub-titel">Hãng sản xuất</h5>
                        <div class="categori-checkbox">
                            <form action="#">
                                <ul>
                                    <li><input type="checkbox" name="product-categori"><a href="#">Graphic Corner (10)</a></li>
                                    <li><input type="checkbox" name="product-categori"><a href="#"> Studio Design (6)</a></li>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <!-- filter-sub-area end -->
{{--                    <!-- filter-sub-area start -->--}}
{{--                    <div class="filter-sub-area pt-sm-10 pt-xs-10">--}}
{{--                        <h5 class="filter-sub-titel">Size</h5>--}}
{{--                        <div class="size-checkbox">--}}
{{--                            <form action="#">--}}
{{--                                <ul>--}}
{{--                                    <li><input type="checkbox" name="product-size"><a href="#">S (3)</a></li>--}}
{{--                                    <li><input type="checkbox" name="product-size"><a href="#">M (3)</a></li>--}}
{{--                                    <li><input type="checkbox" name="product-size"><a href="#">L (3)</a></li>--}}
{{--                                    <li><input type="checkbox" name="product-size"><a href="#">XL (3)</a></li>--}}
{{--                                </ul>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- filter-sub-area end -->--}}
{{--                    <!-- filter-sub-area start -->--}}
{{--                    <div class="filter-sub-area pt-sm-10 pt-xs-10">--}}
{{--                        <h5 class="filter-sub-titel">Color</h5>--}}
{{--                        <div class="color-categoriy">--}}
{{--                            <form action="#">--}}
{{--                                <ul>--}}
{{--                                    <li><span class="white"></span><a href="#">White (1)</a></li>--}}
{{--                                    <li><span class="black"></span><a href="#">Black (1)</a></li>--}}
{{--                                    <li><span class="Orange"></span><a href="#">Orange (3) </a></li>--}}
{{--                                    <li><span class="Blue"></span><a href="#">Blue  (2) </a></li>--}}
{{--                                </ul>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <!-- filter-sub-area end -->--}}
{{--                    <!-- filter-sub-area start -->--}}
                    <div class="filter-sub-area pt-sm-10 pb-sm-15 pb-xs-15">
                        <form action="" method="GET" id="range_price">
                            <h5 class="filter-sub-titel">Giá</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" name="min_price"
                                           style="font-size: 11px; width: 80%;height: 25px; text-align: right;"
                                           id="min_price"
                                           class="form-control float-left mr-1"
                                           value="{{Request::get('min_price') != '' ? Request::get('min_price') : $price_min}}" /> <b>đ</b>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="max_price"
                                           style="font-size: 11px; width: 80%;height: 25px; text-align: right;"
                                           id="max_price"
                                           class="form-control float-left mr-1 "
                                           value="{{Request::get('max_price') != '' ? Request::get('max_price') : $price_max}}" /><b>đ</b>
                                </div>
                                <div class="col-md-12" style="padding-top:12px">
                                    <div id="price_range"></div>
                                </div>
                                <div class="col-md-12" style="padding-top:12px">
                                    <button class="btn bg-dark float-right" id="mc-submit" type="submit">Lọc giá</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- filter-sub-area end -->
                </div>
                <!--sidebar-categores-box end  -->
                <!-- category-sub-menu start -->
                @if ($discriminate != 1 & $discriminate2 != 2)

                @else
                    <div class="sidebar-categores-box mb-sm-0 mb-xs-0">
                        <div class="sidebar-title">
                            <h2>Tags phổ biến</h2>
                        </div>
                        <div class="category-tags">
                            <ul>
                                @foreach($products as $pro)
                                    @foreach($pro->tags as $tagItem)
                                        {{--                                    {{$tagItem->Products->}}--}}
                                        <li><a href="{{request()->fullUrlWithQuery(['tag_id' => $tagItem->id])}}">{{ $tagItem->name }}</a></li>
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <!-- category-sub-menu end -->
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
@push('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
@endpush
@push('scripts')
    <script type="text/javascript">
        $('[name="filter_sort"]').change(function(event) {
            $('#filter_sort').submit();
        });
    </script>
    <script>
        $(document).ready(function(){
            @if( (Request::get('max_price') & Request::get('min_price')) || Request::get('max_price') || Request::get('min_price') )
                $( "#price_range" ).slider({
                    range: true,
                    min: {{$price_min}},
                    max: {{$price_max}},
                    values: [ {{Request::get('min_price')}}, {{Request::get('max_price')}} ],
                    slide:function(event, ui){
                        $("#min_price").val(ui.values[0]);
                        $("#max_price").val(ui.values[1]);
                        // load_product(ui.values[0], ui.values[1]);
                    }
                });
            @else
            $( "#price_range" ).slider({
                range: true,
                min: {{$price_min}},
                max: {{$price_max}},
                values: [ {{$price_min}}, {{$price_max}} ],
                slide:function(event, ui){
                    $("#min_price").val(ui.values[0]);
                    $("#max_price").val(ui.values[1]);
                    // load_product(ui.values[0], ui.values[1]);
                }
            });
            @endif



        });
    </script>
@endpush
