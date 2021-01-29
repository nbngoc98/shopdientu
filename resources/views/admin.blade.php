@extends('admin.admin')

@section('title', 'Trang chủ')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'', 'key'=>'','name_title'=>'Trang Chủ'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    @if (\Illuminate\Support\Facades\Session::get('success'))
                        @include('errors.success')
                        {{\Illuminate\Support\Facades\Session::put('success',null)}}
                    @endif
                </div>
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{count($user_guest)}}</h3>
                                <p>Thành viên</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-users"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$pro}}</h3>

                                <p>Sản phẩm</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-briefcase"></i>
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$review}}</h3>

                                <p>Đánh giá</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-heart"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{ number_format($doanhthu) }}đ</h3>

                                <p>TỔNG DOANH THU HIỆN TẠI</p>
                            </div>
                            <div class="icon">
                                <i class="nav-icon fas fa-cart-plus"></i>
                            </div>

                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Biểu đồ doanh thu</h3>
                                    <a href="javascript:void(0);">View Report</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="d-flex">
                                    <p class="d-flex flex-column">
                                        <span class="text-bold text-lg">{{ number_format($doanhthu) }}đ</span>
                                        <span>Tổng doanh thu</span>
                                    </p>
                                </div>
                                <!-- /.d-flex -->

                                <div class="position-relative mb-4">
                                    <div class="chartjs-size-monitor">
                                        <div class="chartjs-size-monitor-expand">
                                            <div class=""></div>
                                        </div>
                                        <div class="chartjs-size-monitor-shrink">
                                            <div class=""></div>
                                        </div>
                                    </div>
                                    <canvas id="sales-chart" height="250" width="715" class="chartjs-render-monitor"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                                    <span class="mr-2">
                                      <i class="fas fa-square text-primary"></i> Năm hiện tại
                                    </span>
                                    <span>
                                      <i class="fas fa-square text-gray"></i> Năm trước
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5> Danh sách khách hàng nổi bật</h5>
                                {{--                                <div class="card-tools mr-1">--}}
                                {{--                                    <a href="{{route('users.add')}}"><button type="button" class="btn btn-block btn-success">Thêm User</button></a>--}}
                                {{--                                </div>--}}
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th style="width:10px">#</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Email</th>
                                        <th>Phone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $stt = 1; ?>
                                    @foreach($users as $user)
                                        <tr>
                                            <td>{{$stt++}}</td>
                                            <td>{{$user->firstname}} {{$user->lastname}}</td>
                                            <td>{{$user->email}}</td>
                                            <td>{{$user->phone}}</td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h5> Đơn hàng gần đây</h5>
                            {{--                                <div class="card-tools mr-1">--}}
                            {{--                                    <a href="{{route('users.add')}}"><button type="button" class="btn btn-block btn-success">Thêm User</button></a>--}}
                            {{--                                </div>--}}
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width: 1%">#</th>
                                    <th style="width: 150px">Tên khách hàng</th>
                                    <th>Địa chỉ</th>
                                    <th>Phone</th>
                                    <th>Tổng tiền </th>
                                    <th>Time</th>
                                    <th style="width: 8%" class="text-center">Status</th>
                                    <th style="width: 8%" class="text-center">Yêu cầu hủy</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt=1; ?>
                                @foreach($transactions as $item)
                                    <tr>
                                        <td>{{$stt++}}</td>
                                        <td> {{$item->firstname}} {{$item->lastname}} </td>
                                        <td>{{$item->province_city}}, {{$item->district}}, {{$item->village}}, {{$item->hamlet}}</td>
                                        <td>{{$item->user->phone}}</td>
                                        <td>{{number_format($item->total)}}đ</td>
                                        <td>
                                            {{date('d-m-Y', strtotime($item->created_at))}}
                                        </td>
                                        {{--                                            <td>{{$item->display_name}}</td>--}}
                                        <td class="project-state">
                                            @if ($item->status !== 0)
                                                <button
                                                    data-url=""
                                                    class="btn btn-sm btn-primary ">
                                                    Đã xử lý
                                                </button>
                                            @else
                                                <a  href="{{ route('order.check_order',['id'=>$item->id]) }}"
                                                    data-url=""
                                                    class="btn btn-sm btn-default ">
                                                    Chưa xử lý
                                                </a>
                                            @endif
                                        </td>
                                        <td class="project-state">
                                            @if ($item->customer_status == 0)
                                                <button
                                                    data-url=""
                                                    class="btn btn-sm btn-default ">
                                                    No
                                                </button>
                                            @else
                                                <button
                                                    data-url=""
                                                    class="btn btn-sm btn-primary ">
                                                    Yess
                                                </button>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>

                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


@push('style')

@endpush
@push('scripts')
    <!-- OPTIONAL SCRIPTS -->
    <script src="{{asset('admins/plugins/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('admins/dist/js/demo.js')}}"></script>
    <script src="{{asset('admins/dist/js/pages/dashboard3.js')}}"></script>
@endpush
