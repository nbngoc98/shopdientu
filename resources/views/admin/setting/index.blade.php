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
    <script src="{{asset('vendor/setting/index.js')}}"></script>
@endpush
@extends('admin.admin')

@section('title', 'Settings')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Setting', 'key'=>'Danh sách','name_title'=>'Danh sách setting'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools float-sm-left">
                                    <div class="btn-group float-right">
                                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                                            Add setting
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li class="ml-4"><a href="{{ route('setting.add') . '?type=Text' }}">Text</a></li>
                                            <li class="ml-4"><a href="{{ route('setting.add') . '?type=Textarea' }}">Textarea</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th style="width:10px">#</th>
                                  <th>Config key</th>
                                  <th>Config value</th>
                                  <th>Type</th>
                                  <th style="width:100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($settings as $setting)
                                <tr>
                                  <td>{{$setting->id}}</td>
                                  <td>{{$setting->config_key}}</td>
                                  <td>{{$setting->config_value}}</td>
                                  <td>{{$setting->type}}</td>
                                  <td>
                                    <a href=""
                                        class="btn  btn-info"><i class="fas fa-eye"></i></a>
                                     <a href="{{ route('setting.edit',['id'=>$setting->id]) }}"
                                        class="btn  btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-toggle=""
                                           data-url="{{ route('setting.delete',['id'=>$setting->id]) }}"
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


