@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class="container product-detail">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="{{ route('home.index') }}"><i class="fa fa-home"></i></a></li>
                <li><a>{{ $title }}</a></li>
            </ul>
        </div>
        <div class="row">
            <div id="content" class="col-sm-12">
                <h1>Giỏ hàng của bạn
                </h1>
                @if (Cart::count() == 0)
                    <div class="text-center">
                        <img src="image/empty-cart.png">
                    </div>
                    <div class="buttons clearfix">
                        <div class="pull-left"><a href="{{ route('home.index') }}" class="btn btn-default">Tiếp tục mua hàng</a></div>
                    </div>
                @else


                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td class="text-center">Ảnh sản phẩm</td>
                            <td class="text-left">Thông tin sản phẩm</td>
                            <td class="text-left">Số lượng</td>
                            <td class="text-right">Giá sản phẩm</td>
                            <td class="text-right">Tổng giá</td>
                            <td class="text-center"></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $row)
                            <tr>
                                <td class="text-center"> <a href="product.html"><img src="{{asset('public'.$row->options->avatar_product)}}" width="90" alt="Bougainvilleas on Lombard Street,  San Francisco, Tokyo" title="Bougainvilleas on Lombard Street,  San Francisco, Tokyo" class="img-thumbnail" "=""></a> </td>
                                <td class="text-left">
                                    <a href="#">{{$row->name}}</a>
                                    <br>
                                    <small>Mã sản phẩm: MSP{{$row->id}}</small>
                                    <br>
                                    <small>Tình trạng sản phẩm : Mới</small>
                                    <br>
                                    <small>Loại sản phẩm: {{$row->options->category_name}}</small>
                                </td>
                                <td class="text-left">
                                    <div class="input-group btn-block" style="max-width: 200px;">
                                        <input type="text" name="" value="{{$row->qty}}" size="1" class="form-control" >
                                    </div>
                                </td>
                                <td class="text-right">{{ number_format($row->price) }}đ</td>
                                <td class="text-right">{{ number_format($row->price * $row->qty) }}đ</td>
                                <td class="text-center">
                                    <button type="submit" data-toggle="tooltip" title="Cập nhật số lượng" class="btn btn-primary" ><i class="fa fa-save"></i></button>
                                    <a href="{{ route('shopping-cart.destroy',$row->rowId) }}" type="button" data-toggle="tooltip" title="Xóa" class="btn btn-danger">
                                        <i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <thead>
                        <tr>
                            <td colspan="6"  class="text-right">
                                <a href="{{ route('shopping-cart.deleteAll') }}" type="button" data-toggle="tooltip" title="" class="btn btn-danger">Xóa toàn bộ sản phẩm</a>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </div>

                <div class="row">
                    <div class="col-sm-4 col-sm-offset-8">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <td class="text-right"><strong>Tạm tính:</strong></td>
                                <td class="text-right">{{Cart::subtotal(0, ",", ",")}}đ</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Phí vận chuyển:</strong></td>
                                <td class="text-right">30,000đ</td>
                            </tr>
                            <tr>
                                <td class="text-right"><strong>Tổng tiền phải thanh toán:</strong></td>
                                <td class="text-right">{{number_format(Cart::subtotal(0, ",", "") + 30000)}}đ</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="buttons clearfix">
                    <div class="pull-left"><a href="{{ route('home.index') }}" class="btn btn-default">Tiếp tục mua hàng</a></div>
                    <div class="pull-right"><a href="{{ route('checkout.index') }}" class="btn btn-primary">Tiến hành thanh toán</a></div>
                </div>
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
@push('style')

@endpush
@push('scripts')


@endpush
