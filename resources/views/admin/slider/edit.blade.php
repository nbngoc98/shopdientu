@extends('admin.admin')

@section('title', 'Sửa slider')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Slider', 'key'=>'Chỉnh sửa','name_title'=>'Chỉnh sửa Slider'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form sửa slider</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('slider.update', ['id' => $slider->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên slider</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên sản phẩm"
                                               name="name"
                                               value="{{$slider->name}}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập phần trăm sale</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Giá sản phẩm"
                                               name="percent_sale"
                                               value="{{$slider->percent_sale}}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>File Ảnh slider</label>
                                        <input type="file"
                                               class="form-control-file"
                                               name="image_path"
                                        >
                                        <div>
                                            <img src="{{asset('public'.$slider->image_path)}}" alt="" height="80px" width="100px">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập mô tả</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Giá sản phẩm"
                                               name="description"
                                               value="{{$slider->description}}"
                                        >
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
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

@push('style')
    {{--    {{asset('admin/')}}--}}
{{--    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />--}}
{{--    <link href="{{asset('vendor/product/add.css')}}" rel="stylesheet" />--}}
@push('scripts')
{{--    <script src="{{asset('vendor/select2/select2.js')}}"></script>--}}
{{--    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>--}}
{{--    <script src="{{asset('vendor/product/add.js')}}"></script>--}}

@endpush

