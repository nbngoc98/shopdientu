@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class=" container ">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">{{ $title }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="main-container container">
                <h2>My Account</h2>
                <p>Dưới đây là thông tin tài khoản của bạn, bạn có thể xem hoặc chỉnh sửa thông tin. </p>

                <ul class="nav nav-tabs">
                    <li class="active"><a data-toggle="tab" href="#profile">Thông tin</a></li>
                    <li><a data-toggle="tab" href="#password">Thay đổi mật khẩu</a></li>
                    <li><a data-toggle="tab" href="#order">Lịch sử đơn hàng</a></li>
                </ul>

                <div class="tab-content row" style="background: white">

                    <div id="profile" class="tab-pane fade in active">
                        <form action="{{ route('home.profile-edit', ['id' => auth()->user()->id] ) }}" method="POST">
                            @csrf
                        <div class="col-sm-6">
                                <h3>Thông tin cá nhân</h3>
                                <div class="form-group ">
                                    <label for="input-firstname" class="control-label">Họ</label>
                                    <input type="text" name="firstname" value="{{ auth()->user()->firstname }}" placeholder="First Name *" id="input-payment-firstname" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <label for="input-lastname" class="control-label">Tên</label>
                                    <input type="text" name="lastname" value="{{ auth()->user()->lastname }}" placeholder="Last Name *" id="input-payment-lastname" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <label for="input-email" class="control-label">E-Mail</label>
                                    <input type="text" name="email" value="{{ auth()->user()->email }}" placeholder="E-Mail *" id="input-payment-email" class="form-control">
                                </div>
                                <div class="form-group ">
                                    <label for="input-telephone" class="control-label">Số điện thoại</label>
                                    <input type="text" name="phone" value="{{ auth()->user()->phone }}" placeholder="Phone *" id="input-payment-telephone" class="form-control">
                                </div>

                        </div>
                        <div class="col-md-6">
                            <h3>Địa chỉ giao hàng</h3>
                            <div class="form-group company-input">
                                <label for="input-company" class="control-label">Thành phố / tỉnh</label>
                                <input type="text" name="province_city" value="{{ auth()->user()->province_city }}" placeholder="Thành phố" id="input-payment-company" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="input-address-1" class="control-label">Quận huyện</label>
                                <input type="text" name="district" value="{{ auth()->user()->district }}" placeholder="Quận huyện" id="input-payment-address-1" class="form-control">
                            </div>
                            <div class="form-group address-2-input">
                                <label for="input-city" class="control-label">Phường, Xã</label>
                                <input type="text" name="village" value="{{ auth()->user()->village }}" placeholder="Phường, Xã" id="input-payment-address-2" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="input-country" class="control-label">Số đường, nhà, ngõ,...</label>
                                <input type="text" name="hamlet" value="{{ auth()->user()->hamlet }}" placeholder="Số đường, nhà, ngõ,..." id="input-payment-city" class="form-control">
                            </div>
                            <div class="mt-5 text-right"><button class="btn btn-primary profile-button" type="submit">Save</button></div>
                        </div>
                        </form>
                    </div>

                    <div id="password" class="tab-pane">
                        <div class="col-sm-6">
                            <h3>Thay đổi mật khẩu của bạn</h3>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Nhập mật khẩu cũ</label>
                                <input type="password" class="form-control"  placeholder="Nhập mật khẩu cũ" value="" name="password">
                            </div>
                            <div class="form-group required">
                                <label for="input-password" class="control-label">Nhập mật khẩu mới</label>
                                <input type="password" class="form-control"  placeholder="Nhập mật khẩu mới" value="" name="new-password">
                            </div>
                            <div class="form-group required">
                                <label for="input-confirm" class="control-label">Nhập lại mật khẩu</label>
                                <input type="password" class="form-control" id="input-confirm" placeholder="Nhập lại mật khẩu" value="" name="new-confirm">
                            </div>
                            <div class="buttons">
                                <div class="pull-left"><a href="{{ route('home.index') }}" class="btn btn-default">Lưu Mật Khẩu </a></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-center">
                                <img src="image/doi-pass.png">
                            </div>
                        </div>

                    </div>
                    <div id="order" class="tab-pane">
                        <h3>Lịch sử đơn hàng</h3>
                        <div class="table-responsive">
                            @if (count($transactions) > 0)
                                <table class="table table-bordered table-hover">
                                    <thead>
                                    <tr>
                                        <td class="text-center">STT</td>
                                        <td class="text-left">Địa chỉ</td>
                                        <td class="text-center">Order ID</td>
                                        {{--                                    <td class="text-center">Số lượng</td>--}}
                                        <td class="text-center">Trạng thái</td>
                                        <td class="text-center">Ngày đặt</td>
                                        <td class="text-right">Tổng tiền</td>
                                        <td></td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt = 1; ?>
                                    @foreach($transactions as $item)
                                        <tr>
                                            <td class="text-center">
                                                {{$stt}}
                                            </td>
                                            <td class="text-left">{{$item->province_city}}, {{$item->district}}, {{$item->village}}, {{$item->hamlet}}</a>
                                            </td>
                                            <td class="text-center">#{{$item->id}}</td>
                                            {{--                                    <td class="text-center">{{$item->order->qty}}</td>--}}
                                            <td class="text-center">{!!   $item->status == 0 ? '<button class="btn btn-xs btn-default">Chờ xử lý</button>' : '<button class="btn btn-xs btn-success">Đã xử lý</button>' !!}</td>
                                            <td class="text-center">{{$item->created_at}}</td>
                                            <td class="text-right">{{number_format($item->total + 30000)}}đ</td>
                                            <td class="text-center">
                                                <a class="btn btn-info" title=""
                                                   data-toggle="tooltip" href="{{ route('home.order_history',['id'=>$item->id]) }}"
                                                   data-original-title="Xem"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-info" title="" data-toggle="tooltip"
                                                   href="order-information.html" data-original-title="Hủy"><i class="fa fa-minus-circle"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            @else
                                <h5 style="color: red" >Chưa có đơn hàng nào</h5>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('style')


@endpush
@push('scripts')


@endpush
