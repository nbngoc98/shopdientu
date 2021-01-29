@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
@push('scripts')
    <!-- DataTables -->
    <script src="{{asset('admins/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
@endpush
@extends('admin.admin')

@section('title', 'Đơn hàng')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Đơn hàng', 'key'=>'Danh sách','name_title'=>'Danh sách đơn hàng'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group " style="margin-left: 10px;margin-right: 10px; ">
                        <select name="day " id=" " class="form-control ">
                            <option value=" ">Tất cả</option>
                            <option value="1 ">Đã xử lý</option>
                            <option value="0">Chưa xử lý</option>

                        </select>
                    </div>
                    <div class="form-group " style=" ">
                        <button type="submit " class="btn btn-success "><i class="fa fa-search "> Search</i></button>
                    </div>
                    <div class="form-group " style="">
                        <button style="margin-left: 10px; " type="submit " name="export " value="true " class="btn btn-info "><i class="fa fa-save "> Export</i></button>
                    </div>

                    <div class="col-md-12">

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-striped projects">
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
                                        <th style="width: 20%"> </th>
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
                                            <td class="project-actions text-right">
                                                <a class="btn btn-primary btn-sm" href="{{route('order.view', ['id'=>$item->id] )}}">
                                                    <i class="fas fa-folder">
                                                    </i>
                                                    View
                                                </a>
                                                <a class="btn btn-info btn-sm" href="">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Export
                                                </a>
                                                <a class="btn btn-danger btn-sm" href="{{route('order.delete', ['id'=>$item->id] )}}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
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


