@extends('admin.admin')

@section('title', 'Thêm sản phẩm')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.layouts.content_header', ['name'=>'Sản phẩm', 'key'=>'Thêm mới','name_title'=>'Thêm sản phẩm mới'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form thêm sản phẩm</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên sản phẩm</label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Tên sản phẩm"
                                               name="name"
                                               value="{{ old('name') }}"
                                        >
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập giá sản phẩm</label>
                                        <input type="text"
                                               class="form-control @error('price') is-invalid @enderror"
                                               placeholder="Giá sản phẩm"
                                               name="price"
                                               value="{{ old('price') }}"
                                        >
                                        @error('price')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập % sale</label>
                                        <input type="text"
                                               class="form-control @error('sale') is-invalid @enderror"
                                               placeholder="% sale"
                                               name="sale"
                                               value="{{ old('sale') }}"
                                        >
                                        @error('sale')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập số lượng sản phẩm</label>
                                        <input type="text"
                                               class="form-control @error('amount') is-invalid @enderror"
                                               placeholder="Số lượng sản phẩm"
                                               name="amount"
                                               value="{{ old('amount') }}"
                                        >
                                        @error('amount')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Hiện thị sản phẩm :</label>
                                        <input  type="checkbox" name="status" checked data-bootstrap-switch >
                                    </div>

                                    <div class="form-group">
                                        <label>File Ảnh đại diện sản phẩm</label>
                                        <input type="file"
                                        class="form-control-file"
                                        name="avata_image_path"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>File Ảnh chi tiết</label>
                                        <input type="file"
                                               multiple
                                               class="form-control-file"
                                               name="image_path[]"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn danh mục</label>
                                        <select class="form-control select_init @error('category_id') is-invalid @enderror"
                                                name="category_id">
                                            <option value="">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                        @error('category_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập tags</label>
                                        <select name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea name="contents"
                                                  class="form-control tinymce_editor @error('contents') is-invalid @enderror"
                                                  placeholder="Nhập nội dung"
                                                  rows="9"
                                        >{{ old('contents') }}</textarea>
                                        @error('contents')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
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
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendor/product/add.css')}}" rel="stylesheet" />
@endpush
@push('scripts')
    <script src="{{asset('vendor/select2/select2.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('vendor/product/add.js')}}"></script>
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

