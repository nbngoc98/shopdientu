@push('style')

@endpush
@push('scripts')

@endpush
@extends('admin.admin')

@section('title', 'Chi tiết đơn hàng')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Đơn hàng', 'key'=>'Chi tiết','name_title'=>'Chi tiết đơn hàng'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped projects">
                                    <thead>
                                    <tr>
                                        <th style="width: 1%">#</th>
                                        <th style="">Tên sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Giá Sale</th>
                                        <th>Số lượng</th>
                                        <th class="text-right">Thành tiền</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt=1; ?>
                                    @foreach($order as $item)
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td> {{$item->product->name}}</td>
                                            <td><img src="{{$item->product->avata_image_path}}" width="120px" height="80px"></img></td>
                                            <td> {{number_format($item->product_price + ($item->product_price *$item->product_sale / 100))}}đ</td>
                                            <td> {{number_format($item->product_price )}}đ</td>
                                            <td> {{$item->qty}}</td>
{{--                                            <td>{{$item->province_city}}, {{$item->district}}, {{$item->village}}, {{$item->hamlet}}</td>--}}
{{--                                            <td>{{$item->user->phone}}</td>--}}
{{--                                            <td>{{number_format($item->total)}}đ</td>--}}
                                            <td class="text-right">
                                                {{number_format($item->qty*($item->product_price))}}đ
                                            </td>

                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <div class="text-right"> <h3>Tổng số tiền thanh toán: {{ number_format($transactions->total+30000) }}đ</h3>
                                <span style="color: green">Phí ship: 30,000đ</span></div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <a href="{{route('order.index')}}" class="btn btn-primary float-right">Trở lại</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


