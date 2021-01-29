@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home.index') }}"><i class="fa fa-home"></i></a></li>
                <li><a>{{ $title }}</a></li>
            </ul>
        <div class="row">
            <div id="content" class="col-sm-12">
                <h1>Checkout</h1>
                @if (Cart::count() == 0)
                    <div class="text-center">
                        <img src="image/empty-cart.png">
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-left"><a href="{{ route('home.index') }}" class="btn btn-default">Tiếp tục mua hàng</a></div>
                    </div>
                @else
                <div class="so-onepagecheckout layout1">
                    <div class="col-left col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="checkout-content checkout-register">
                            <fieldset id="account">
                                <h2 class="secondary-title"><i class="fa fa-user-plus"></i>HOÀN THÀNH CÁC BƯỚC ĐỂ ĐẶT HÀNG</h2>
                                <div class="payment-new box-inner">

                                    <div class="stepper row">
                                        <ul class="nav nav-tabs nav-justified" role="tablist">
                                            <li role="presentation" class="active">
                                                <a class="persistant-disabled" href="#stepper-step-1" data-toggle="tab" aria-controls="stepper-step-1" role="tab" title="Thông tin">
                                                    <span class="round-tab">1</span>
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a class="persistant-disabled" href="#stepper-step-2" data-toggle="tab" aria-controls="stepper-step-2" role="tab" title="Địa chỉ">
                                                    <span class="round-tab">2</span>
                                                </a>
                                            </li>
                                            <li role="presentation" class="disabled">
                                                <a class="persistant-disabled" href="#stepper-step-3" data-toggle="tab" aria-controls="stepper-step-3" role="tab" title="phương thức thanh toán">
                                                    <span class="round-tab">3</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <form action="{{ route('checkout.post') }}" method="POST">
                                            @csrf
                                            @if (auth()->user())
                                            <div class="tab-content" style="border:0">
                                                <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">
                                                    <h5 >1. THÔNG TIN CÁC NHÂN</h5>
                                                    <div class="form-group input-firstname required" style="width: 49%; float: left;">
                                                        <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" placeholder="First Name *" id="input-payment-firstname" class="form-control">
                                                    </div>
                                                    <div class="form-group input-lastname required" style="width: 49%; float: right;">
                                                        <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" placeholder="Last Name *" id="input-payment-lastname" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="email" value="{{ auth()->user()->email }}" placeholder="E-Mail *" id="input-payment-email" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone *" id="input-payment-telephone" class="form-control">
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <a class="btn btn-primary next-step">Tiếp tục</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                                                    <h5>2. ĐỊA CHỈ THANH TOÁN</h5>
                                                    <div class="form-group company-input">
                                                        <input type="text" name="province_city" value="{{ auth()->user()->province_city }}" placeholder="Thành phố" id="input-payment-company" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="district" value="{{ auth()->user()->district }}" placeholder="Quận huyện" id="input-payment-address-1" class="form-control">
                                                    </div>
                                                    <div class="form-group address-2-input">
                                                        <input type="text" name="village" value="{{ auth()->user()->village }}" placeholder="Phường, Xã" id="input-payment-address-2" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="hamlet" value="{{ auth()->user()->hamlet }}" placeholder="Số đường, nhà, ngõ,..." id="input-payment-city" class="form-control">
                                                    </div>
                                                    <fieldset id="shipping-address" style="display: none">
                                                        <h5 >2. ĐỊA CHỈ GIAO HÀNG</h5>
                                                        <div class=" checkout-shipping-form">
                                                            <div class="">
                                                                <form class="form-horizontal form-shipping">
                                                                    <div id="shipping-new" style="display: block">
                                                                        <div class="form-group company-input">
                                                                            <input type="text" name="shipping_province_city" value="" placeholder="Thành phố" id="input-payment-company" class="form-control">
                                                                        </div>
                                                                        <div class="form-group required">
                                                                            <input type="text" name="shipping_district" value="" placeholder="Quận huyện" id="input-payment-address-1" class="form-control">
                                                                        </div>
                                                                        <div class="form-group address-2-input">
                                                                            <input type="text" name="shipping_village" value="" placeholder="Phường, Xã" id="input-payment-address-2" class="form-control">
                                                                        </div>
                                                                        <div class="form-group required">
                                                                            <input type="text" name="shipping_hamlet" value="" placeholder="Số đường, nhà, ngõ,..." id="input-payment-city" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="default_zone_id" id="default_zone_id" value="3655">
                                                    </fieldset>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="shipping_address" value="1" checked="checked"> Địa chỉ giao hàng và thanh toán của tôi giống nhau.
                                                        </label>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <a class="btn btn-default prev-step">Trở lại</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-primary next-step">Tiếp tục</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                                                    <h3 class="hs">3. Phương thức thanh toán</h3>
                                                    <p>Mời bạn lựa chọn phương thức thanh toán.</p>
                                                    <div class="form-group">
                                                        <select class="form-control" name="method_pay" id="sel1">
                                                            <option value=""> --- Chọn thương thức thanh toán --- </option>
                                                            <option value="1">Chuyển khoản ngân hàng</option>
                                                            <option value="2">Giao hàng trả tiền mặt</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-company" class="control-label">Ghi chú:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <a class="btn btn-default prev-step">Trở lại</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('home.index')}}" class="btn btn-default cancel-stepper">Hủy bỏ</a>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="btn btn-primary next-step">Đồng ý</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @else
                                            <div class="tab-content" style="border:0">
                                                <div class="tab-pane fade in active" role="tabpanel" id="stepper-step-1">
                                                    <h5 >1. THÔNG TIN CÁC NHÂN</h5>
                                                    <div class="form-group input-firstname required" style="width: 49%; float: left;">
                                                        <input type="text" name="firstname" value="" placeholder="First Name *" id="input-payment-firstname" class="form-control">
                                                    </div>
                                                    <div class="form-group input-lastname required" style="width: 49%; float: right;">
                                                        <input type="text" name="lastname" value="" placeholder="Last Name *" id="input-payment-lastname" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="email" value="" placeholder="E-Mail *" id="input-payment-email" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="phone" value="" placeholder="Phone *" id="input-payment-telephone" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-company" class="control-label">Để tạo tài khoản hãy điền mật khẩu:</label>
                                                        <input placeholder="password" type="password" name="Password" class="form-control">
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <a class="btn btn-primary next-step">Tiếp tục</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-2">
                                                    <h5>2. ĐỊA CHỈ THANH TOÁN</h5>
                                                    <div class="form-group company-input">
                                                        <input type="text" name="province_city" value="" placeholder="Thành phố" id="input-payment-company" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="district" value="" placeholder="Quận huyện" id="input-payment-address-1" class="form-control">
                                                    </div>
                                                    <div class="form-group address-2-input">
                                                        <input type="text" name="village" value="" placeholder="Phường, Xã" id="input-payment-address-2" class="form-control">
                                                    </div>
                                                    <div class="form-group required">
                                                        <input type="text" name="hamlet" value="" placeholder="Số đường, nhà, ngõ,..." id="input-payment-city" class="form-control">
                                                    </div>
                                                    <fieldset id="shipping-address" style="display: none">
                                                        <h5 >2. ĐỊA CHỈ GIAO HÀNG</h5>
                                                        <div class=" checkout-shipping-form">
                                                            <div class="">
                                                                <form class="form-horizontal form-shipping">
                                                                    <div id="shipping-new" style="display: block">
                                                                        <div class="form-group company-input">
                                                                            <input type="text" name="shipping_province_city" value="" placeholder="Thành phố" id="input-payment-company" class="form-control">
                                                                        </div>
                                                                        <div class="form-group required">
                                                                            <input type="text" name="shipping_district" value="" placeholder="Quận huyện" id="input-payment-address-1" class="form-control">
                                                                        </div>
                                                                        <div class="form-group address-2-input">
                                                                            <input type="text" name="shipping_village" value="" placeholder="Phường, Xã" id="input-payment-address-2" class="form-control">
                                                                        </div>
                                                                        <div class="form-group required">
                                                                            <input type="text" name="shipping_hamlet" value="" placeholder="Số đường, nhà, ngõ,..." id="input-payment-city" class="form-control">
                                                                        </div>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="default_zone_id" id="default_zone_id" value="3655">
                                                    </fieldset>
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" name="shipping_address" value="1" checked="checked"> Địa chỉ giao hàng và thanh toán của tôi giống nhau.
                                                        </label>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <a class="btn btn-default prev-step">Trở lại</a>
                                                        </li>
                                                        <li>
                                                            <a class="btn btn-primary next-step">Tiếp tục</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="tab-pane fade" role="tabpanel" id="stepper-step-3">
                                                    <h3 class="hs">3. Phương thức thanh toán</h3>
                                                    <p>Mời bạn lựa chọn phương thức thanh toán.</p>
                                                    <div class="form-group">
                                                        <select class="form-control" name="method_pay" id="sel1">
                                                            <option value=""> --- Chọn thương thức thanh toán --- </option>
                                                            <option value="1">Chuyển khoản ngân hàng</option>
                                                            <option value="0">Giao hàng trả tiền mặt</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="input-company" class="control-label">Ghi chú:</label>
                                                        <textarea class="form-control" id="exampleFormControlTextarea1" name="note" rows="3"></textarea>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <a class="btn btn-default prev-step">Trở lại</a>
                                                        </li>
                                                        <li>
                                                            <a href="{{route('home.index')}}" class="btn btn-default cancel-stepper">Hủy bỏ</a>
                                                        </li>
                                                        <li>
                                                            <button type="submit" class="btn btn-primary next-step">Đồng ý</button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </fieldset>

                        </div>
                    </div>

                    <div class="col-right col-lg-6 col-md-6 col-sm-6 col-xs-12">

                        <section class="section-right">
                            <div class="checkout-content checkout-cart">
                                <h2 class="secondary-title"><i class="fa fa-shopping-cart"></i>ĐƠN HÀNG CỦA BẠN</h2>
                                <div class="box-inner">
                                    <div class="table-responsive checkout-product">
                                        <table class="table table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th class="text-left name" colspan="2">Sản phẩm</th>
                                                <th class="text-center quantity">số lượng</th>
                                                <th colspan="2"class="text-right total">Tổng</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($items as $row)
                                                <tr>
                                                    <td class="text-left name" colspan="2">
                                                        <a href="#"><img src="{{asset('public'.$row->options->avatar_product)}}" width="60" class="img-thumbnail"></a>
                                                        <a href="#" class="product-name">{{$row->name}}<br>
                                                            <small class="text-right total">Giá: {{ number_format($row->price) }}đ</small>
                                                        </a>
                                                    </td>
                                                    <td class="text-left quantity">
                                                        <div class="input-group">
                                                            <input type="text" name="quantity[317]" value="{{$row->qty}}" size="1" class="form-control">
                                                            <span class="input-group-btn">
																<span data-toggle="tooltip" title="Xóa" class="btn-delete"><i class="fa fa-trash-o"></i></span>
																<span data-toggle="tooltip" title="Update" class="btn-update"><i class="fa fa-refresh"></i></span>
															</span>
                                                        </div>
                                                    </td>
                                                    <td colspan="2" class="text-right total">{{ number_format($row->price * $row->qty) }}đ</td>
                                                </tr>
                                            @endforeach

                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <td colspan="4" class="text-left">TẠM TÍNH:</td>
                                                <td class="text-right">{{Cart::subtotal(0, ",", ",")}}đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-left">VẬN CHUYỂN:</td>
                                                <td class="text-right">30,000đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-left">KHUYẾN MÃI:</td>
                                                <td class="text-right">0đ</td>
                                            </tr>
                                            <tr>
                                                <td colspan="4" class="text-left">TỔNG THANH TOÁN:</td>
                                                <td class="text-right price">{{number_format(Cart::subtotal(0, ",", "") + 30000)}}đ</td>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="coupon_voucher_reward">
                                <div class="checkout-content coupon-voucher">
                                    <h2 class="secondary-title"><i class="fa fa-gift"></i>BẠN CÓ PHIẾU GIẢM GIÁ KHÔNG?</h2>
                                    <div class="box-inner">

                                        <div class="panel-body checkout-voucher">
                                            <label class="col-sm-2 control-label" for="input-voucher">Nhập mã giảm giá</label>
                                            <div class="input-group">
                                                <input type="text" name="voucher" value="" placeholder="Nhập mã giảm giá" id="input-voucher" class="form-control">
                                                <span class="input-group-btn">
													<input type="button" value="Áp dụng" id="button-voucher" data-loading-text="Loading..." class="btn-primary button">
												</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>


                        </section>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@push('style')

    <link href="css/themecss/so_onepagecheckout.css" rel="stylesheet">
    <link href="css/step.css" rel="stylesheet">
@endpush
@push('scripts')
    <!-- Placed at the end of the document so the pages load faster -->
    <script type="text/javascript" src="js/jquery-2.2.4.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <script>
        /*jslint browser: true*/
        /*global $, jQuery, alert*/
        (function($) {
            'use strict';

            $(function() {

                $(document).ready(function() {
                    function triggerClick(elem) {
                        $(elem).click();
                    }
                    var $progressWizard = $('.stepper'),
                        $tab_active,
                        $tab_prev,
                        $tab_next,
                        $btn_prev = $progressWizard.find('.prev-step'),
                        $btn_next = $progressWizard.find('.next-step'),
                        $tab_toggle = $progressWizard.find('[data-toggle="tab"]'),
                        $tooltips = $progressWizard.find('[data-toggle="tab"][title]');

                    // To do:
                    // Disable User select drop-down after first step.
                    // Add support for payment type switching.

                    //Initialize tooltips
                    $tooltips.tooltip();

                    //Wizard
                    $tab_toggle.on('show.bs.tab', function(e) {
                        var $target = $(e.target);

                        if (!$target.parent().hasClass('active, disabled')) {
                            $target.parent().prev().addClass('completed');
                        }
                        if ($target.parent().hasClass('disabled')) {
                            return false;
                        }
                    });

                    // $tab_toggle.on('click', function(event) {
                    //     event.preventDefault();
                    //     event.stopPropagation();
                    //     return false;
                    // });

                    $btn_next.on('click', function() {
                        $tab_active = $progressWizard.find('.active');

                        $tab_active.next().removeClass('disabled');

                        $tab_next = $tab_active.next().find('a[data-toggle="tab"]');
                        triggerClick($tab_next);

                    });
                    $btn_prev.click(function() {
                        $tab_active = $progressWizard.find('.active');
                        $tab_prev = $tab_active.prev().find('a[data-toggle="tab"]');
                        triggerClick($tab_prev);
                    });
                });
            });

        }(jQuery, this));
    </script>

@endpush
