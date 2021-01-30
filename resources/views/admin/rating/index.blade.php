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
    {{--Ajax--}}
    <script src="{{asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('vendor/users/index.js')}}"></script>
@endpush
@extends('admin.admin')

@section('title', 'User')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Đánh giá', 'key'=>'Danh sách','name_title'=>'Danh sách đánh giá của khách hàng'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h5> Danh sách đánh giá của khách hàng</h5>
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
                                        <th>Nội dung</th>
                                        <th>Số sao</th>
                                        <th>Ngày tạo</th>
                                        <th style="width:100px">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($review as $item)
                                        <tr>
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->users->firstname}} {{$item->users->lastname}}</td>
                                            <td>{{$item->content}}</td>
                                            <td>{{$item->number}}</td>
                                            <td>{{date('d-m-Y', strtotime($item->created_at))}}</td>
                                            <td>
                                                <a href="{{route('review.reply', ['id'=>$item->id] )}}" title="Trả lời" class="btn  btn-info"><i class="fas fa-share"></i></a>
                                                <a href=""
                                                   data-url="{{route('review.delete', ['id'=>$item->id] )}}"
                                                   class="btn  btn-danger action_delete"><i class="fas fa-trash"></i></a>
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


