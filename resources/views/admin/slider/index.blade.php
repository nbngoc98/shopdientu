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
    <script src="{{asset('vendor/slider/index.js')}}"></script>
@endpush
@extends('admin.admin')

@section('title', 'Slider')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Slider', 'key'=>'Danh sách','name_title'=>'Danh sách Slider'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools mr-1">
                                    <a href="{{route('slider.add')}}"><button type="button" class="btn btn-block btn-success">Thêm slider</button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                  <th style="width:10px">#</th>
                                  <th>Tên Slider</th>
                                  <th style="width:100px">Sale</th>
                                  <th>Hình ảnh</th>
                                  <th>Mô tả</th>
                                  <th style="width:100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($sliders as $slider)
                                <tr>
                                  <td>{{$slider->id}}</td>
                                  <td>{{$slider->name}}</td>
                                  <td>{{$slider->percent_sale}}</td>
                                  <td><img src="{{asset('public'.$slider->image_path)}}" width="120px" height="80px"></img> </td>
                                  <td>{{$slider->description}}</td>
                                  <td>
                                    <a href=""
                                        class="btn  btn-info"><i class="fas fa-eye"></i></a>
                                     <a href="{{ route('slider.edit',['id'=>$slider->id]) }}"
                                        class="btn  btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-toggle=""
                                           data-url="{{ route('slider.delete',['id'=>$slider->id]) }}"
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


