<div class="product-view product-detail">
    <div class="product-view-inner clearfix">
        <div class="content-product-left  col-md-5 col-sm-6 col-xs-12">
            <div class="so-loadeding"></div>
            <div class="large-image  class-honizol">
                @if($products->pro_sale == 0)
                @else
                <div class="box-label">
                  <span class="label-product label-sale">
                  -{{ $products->pro_sale }}%
                  </span>
                </div>
                @endif
                <img class="product-image-zoom" src="{{asset('public'.$products->avata_image_path)}}" data-zoom-image="{{asset('public'.$products->avata_image_path)}}" title="">
            </div>
            <div id="thumb-slider" class="full_slider category-slider-inner products-list yt-content-slider" data-rtl="no" data-autoplay="no" data-pagination="no" data-delay="4" data-speed="0.6" data-margin="10" data-items_column0="3" data-items_column1="3" data-items_column2="3" data-items_column3="3" data-items_column4="2" data-arrows="yes" data-lazyload="yes" data-loop="no" data-hoverpause="yes">
                @foreach($products->images as $key => $imageDetail)
                    <div class="owl2-item " >
                        <div class="image-additional">
                            <a data-index="0" class="img thumbnail" data-image="{{asset('public'.$imageDetail->image_path)}}" title="o">
                                <img src="{{asset('public'.$imageDetail->image_path)}}" title="">
                            </a>
                        </div>
                    </div>
                @endforeach



            </div>
        </div>
        <div class="content-product-right col-md-7 col-sm-6 col-xs-12">
            <form action="{{ route('shopping-cart.add',$products->id) }}" method="POST" class="cart-quantity">
                @csrf
                <div class="title-product">
                    <h1>{{ $products->name }}</h1>
                </div>
                <div class="box-review">
                    <div class="pro-rating">
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star"></i></a>
                        <a href="#"><i class="fa fa-star-o"></i></a>
                    </div>
                    <a class="reviews_button" >{{$products->pro_view}} lượt xem</a> / <a class="write_review_button">{{count($ratings)}} đánh giá</a>
                </div>
                <div class="product_page_price price" itemscope="" itemtype="http://data-vocabulary.org/Offer">
                    @if($products->pro_sale == 0)
                        <span class="price-new"><span id="price-special"></span> {{ number_format($products->price) }}</span>đ
                    @else
                        <span class="price-new"><span id="price-special"></span> {{  number_format($products->price-($products->price * $products->pro_sale/100)) }}</span>đ
                        <span class="price-old" id="price-old">{{ number_format($products->price) }}đ</span>
                    @endif
                </div>
{{--                <div class="table" x-data="setup()">--}}
{{--                    <template x-for="(item, index) in products" :key="index">--}}
{{--                        <ul>--}}
{{--                            <li>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="sel1">Lựa chọn:</label>--}}
{{--                                    <select class="form-control" id="sel1" x-model="item.price" name="properties">--}}
{{--                                        @foreach($products->prices as $prices)--}}
{{--                                        <option value="{{ $prices->price }}">{{ $prices->properties }}</option>--}}
{{--                                        @endforeach--}}

{{--                                    </select>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li >--}}
{{--                                <div class="product_page_price price" itemscope="" itemtype="http://data-vocabulary.org/Offer">--}}
{{--                                    <span class="price-new"><span id="price-special" x-text="item.price-(item.price*{{ $products->pro_sale }}/100)"></span></span>đ--}}
{{--                                    <span class="price-old" id="price-old" x-text="item.price"></span>--}}
{{--                                </div>--}}
{{--                            </li>--}}
{{--                            <li>--}}
{{--                                <div class="reward" x-model="item.quantity" ><span>Số lượng còn: </span><span x-text="item.quantity"></span></div>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </template>--}}
{{--                </div>--}}

                <div class="product-box-desc">
                    <div class="inner-box-desc">
                        <div class="brand"><span>Loại sản phẩm: </span><a href="#">{{ $products->category->name }}</a></div>
                        <div class="stock"><span>Thương hiệu:</span> {{ $brand->name }}</div>
                        <div class="model"><span>Mã sản phẩm: </span> ABC{{ $products->id }}</div>
                        <div class="model"><span>Số lượng còn: </span> {!! $products->amount - $products->pro_sold > 0 ?  $products->amount - $products->pro_sold : '<span class="price-new" style="color:red"><b> Hết hàng - Vui lòng liên hệ với chúng tôi để đặt trước hàng</b></span>' !!}</div>
                    </div>
                </div>
                <div class="short_description form-group">
                    <h3>OverView</h3>
                </div>
                <div id="product">
                    <div class="box-cart clearfix">
                        <div class="form-group box-info-product">
                            <div class="option quantity">
                                <div class="input-group quantity-control" unselectable="on" style="user-select: none;">
                                    <input class="form-control" type="text" name="quantity" value="1">
                                    <input type="hidden" name="product_id" value="108">
                                    <span class="input-group-addon product_quantity_down fa fa-caret-down"></span>
                                    <span class="input-group-addon product_quantity_up fa fa-caret-up"></span>
                                </div>
                            </div>
                            <div class="cart">
                                <input type="submit" value="Thêm vào giỏ hàng"
                                        class="addToCart btn btn-mega btn-lg " >
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
