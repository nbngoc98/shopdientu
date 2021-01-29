<div class="product-attribute module">
    <div class="row content-product-midde clearfix">
        <div class="col-xs-12">
            <div class="producttab ">
                <div class="tabsslider  ">
                    <ul class="nav nav-tabs font-sn">
                        <li class="active"><a data-toggle="tab" href="#tab-description">Giới thiệu sản phẩm</a></li>
                        <li><a href="#tab-review" data-toggle="tab">Đánh giá ({{count($ratings)}})</a></li>
                    </ul>
                    <div class="tab-content ">
                        <div class="tab-pane active" id="tab-description">
                            <div>
                                {!! $products->content !!}
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-review">
                            @if (count($ratings) > 0)
                                @foreach($ratings as $review)
                                    <div>
                                        <strong>{{$review->users->firstname}} {{$review->users->lastname}}</strong>
                                        <em>{{ $review->created_at }}</em>
                                        <div class="pro-rating">
                                            <?php $s= $review->number; ?>
                                            @for($count = 1; $count <= $s; $count++)
                                                <a href="#"><i class="fa fa-star"></i></a>
                                            @endfor
                                        </div>
                                        <p>
                                            {{ $review->content }}
                                        </p>
                                    </div
                                @endforeach
                            @else
                                <h5 style="color: red">Sản phẩm chưa có đánh giá nào.</h5>
                            @endif

{{--                            <!-- BEGIN FORM-->--}}
                            <form action="#" class="reviews-form" role="form">
                                <h2>Đánh giá sản phẩm</h2>
                                <div class="form-group">
                                    <label for="review">Nhập đánh giá của bạn ở đây <span class="require">*</span></label>
                                    <textarea class="form-control" rows="8" id="review"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="email">Đánh giá </label>
                                    <div class="pro-rating">
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star"></i></a>
                                        <a href="#"><i class="fa fa-star-o"></i></a>
                                    </div>
                                </div>
                                <div class="padding-top-20">
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
