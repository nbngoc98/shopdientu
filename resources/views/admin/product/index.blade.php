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
    <script src="{{asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('vendor/product/index.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('admins/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script>
        $(function () {
            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>
@endpush
@extends('admin.admin')

@section('title', 'Product')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Sản phẩm', 'key'=>'Danh sách','name_title'=>'Danh Sách Sản Phẩm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-tools mr-1">
                                    <a href="{{route('product.add')}}"><button type="button" class="btn btn-block btn-success">Thêm sản phẩm mới</button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                              <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th style="width:10px">#</th>
                                    <th>Tên sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Hình ảnh</th>
                                    <th>Category</th>
                                    <th style="width:60px">Đã bán</th>
                                    <th style="width:60px">Hiện thị</th>
                                    <th style="width:70px">SP Hot</th>
                                    <th style="width:100px">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $stt = 1;?>
                                @foreach($products as $product)
                                <tr>
                                    <td>{{$stt++}}</td>
                                    <td><h4>{{$product->name}}</h4>
                                        <small><b>Mã Sản phẩm:</b> #{{$product->id}}</small><br>
                                        <small><b>Số lượng nhập kho:</b> {{$product->amount}}</small><br>
                                        <small><b>Số lượt xem:</b> {{$product->pro_view}}</small><br>
                                        <small><b>Đánh giá:</b> </small><br>
                                        <small><b>Sale(%):</b> {{$product->pro_sale > 0 ? $product->pro_sale : "Không có chương trình giảm giá" }}</small><br>
                                        <small><b>Ngày nhập kho:</b> {{date('d-m-Y', strtotime($product->created_at))}}</small>
                                    </td>
                                    <td>{{number_format($product->price)}}đ</td>
                                    <td><img src="{{asset('public'.$product->avata_image_path)}}" width="120px" height="80px"></img></td>
                                    <td>{{optional($product->category)->name}}</td>
                                    <td>{!! $product->pro_sold == $product->amount ? '<span class="text-danger ">Hết hàng</span>' :  $product->pro_sold!!}</td>
                                    <td>
                                        @if ($product->status === 1)
                                            <a  href="{{ route('product.offstatus',['id'=>$product->id]) }}"
                                                data-url=""
                                                title="Đang hiển thị"
                                                class="btn btn-sm btn-primary ">
                                                Hiển thị
                                            </a>
                                        @else
                                            <a  href="{{ route('product.onstatus',['id'=>$product->id]) }}"
                                                data-url=""
                                                title="Đang ẩn"
                                                class="btn btn-sm btn-default ">
                                                Đang ẩn
                                            </a>
                                        @endif

                                    </td>
                                    <td>
                                        @if ($product->pro_hot === 1)
                                            <a  href="{{ route('product.off_pro_hot',['id'=>$product->id]) }}"
                                                data-url=""
                                                title="Đang bật"
                                                class="btn btn-sm btn-primary ">
                                                Đang bật
                                            </a>
                                        @else
                                            <a  href="{{ route('product.on_pro_hot',['id'=>$product->id]) }}"
                                                data-url=""
                                                title="Đang tắt"
                                                class="btn btn-sm btn-default ">
                                                Đang tắt
                                            </a>
                                        @endif
                                    </td>
                                    <td>
                                    <a href=""
                                        class="btn  btn-info"><i class="fas fa-eye"></i></a>
                                     <a href="{{ route('product.edit',['id'=>$product->id]) }}"
                                        class="btn  btn-primary"><i class="fas fa-edit"></i></a>
                                        <a href=""
                                           data-toggle="{{$product}}"
                                           data-url="{{ route('product.delete',['id'=>$product->id]) }}"
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


