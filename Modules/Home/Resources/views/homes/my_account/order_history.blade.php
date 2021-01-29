@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class=" container ">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="{{route('home.index')}}"><i class="fa fa-home"></i></a></li>
                <li><a href="{{route('home.profile')}}">My Account</a></li>
                <li><a href="#">{{ $title }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div id="content main-container" >
                <div class="col-md-9">
                    <h3 class="title">Trạng thái đơn hàng</h3>

                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td colspan="2" class="text-left">Chi tiết đơn hàng</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td style="width: 50%;" class="text-left"> <b>Order ID:</b> #{{$transactions->id}}
                                <br>
                                <b>Ngày đặt:</b> {{$transactions->created_at}}</td>
                            <td style="width: 50%;" class="text-left"> <b>Phương thức thanh toán:</b> {{ $transactions->method_payment == 0 ? " Tiền mặt" : "Chuyển khoản ngân hàng" }}
                                <br>
                                <b>Hình thức:</b> Thanh toán toàn bộ đơn hàng </td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td style="width: 50%; vertical-align: top;" class="text-left">Địa chỉ thanh toán</td>
                            <td style="width: 50%; vertical-align: top;" class="text-left">Địa chỉ nhận hàng</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-left">{{$transactions->province_city}}, ,
                                <br>{{$transactions->district}}
                                <br>{{$transactions->village}}
                                <br>{{$transactions->hamlet}}</td>
                            <td class="text-left">{{$transactions->province_city}}, ,
                                <br>{{$transactions->district}}
                                <br>{{$transactions->village}}
                                <br>{{$transactions->hamlet}}</td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <td class="text-left">Tên sản phẩm</td>
                                <td class="text-right">Số lượng</td>
                                <td class="text-right">Giá</td>
                                <td class="text-right">Sale</td>
                                <td class="text-right">Tổng giá</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($order as $item)
                            <tr>
                                <td class="text-left">{{$item->product->name}} </td>
                                <td class="text-right">{{$item->qty}}</td>
                                <td class="text-right">{{number_format($item->product_price + ($item->product_price*$item->product_sale/100)*$item->qty)}}đ</td>
                                <td class="text-right">{{$item->product_sale}}%</td>
                                <td class="text-right">{{number_format($item->product_price)}}đ</td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right"><b>Phí vận chuyển</b>
                                </td>
                                <td class="text-right">30,000đ</td>
                            </tr>
                            <tr>
                                <td colspan="3"></td>
                                <td class="text-right"><b>Tổng thanh toán</b>
                                </td>
                                <td class="text-right">{{number_format($transactions->total+30000)}}đ</td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                    <div class="buttons clearfix">
                        <div class="pull-right"><a class="btn btn-primary" href="{{route('home.profile')}}">Quay lại</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <h3>Lịch sử đơn hàng</h3>
                    <table class="table table-bordered table-hover">
                        <thead>
                        <tr>
                            <td class="text-left">Ngày</td>
                            <td class="text-left">Trạng thái</td>
                        </tr>
                        </thead>
                        <tbody>
                        @if ($transactions->updated_at == '')
                            <tr>
                                <td class="text-left">{{ $transactions->created_at }}</td>
                                <td class="text-left">Chờ xử lý</td>
                            </tr>
                        @else
                            <tr>
                                <td class="text-left">{{ $transactions->updated_at }}</td>
                                <td class="text-left">Đợi lấy hàng</td>
                            </tr>
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('style')


@endpush
@push('scripts')


@endpush
