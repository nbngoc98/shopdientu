@extends('admin.admin')

@section('title', 'Thêm slider')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.layouts.content_header', ['name'=>'Slider', 'key'=>'Thêm mới','name_title'=>'Thêm mới Slider'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form thêm slider</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('slider.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên slider</label>
                                        <input type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               placeholder="Tên slider"
                                               name="name"
                                               value="{{ old('name') }}"
                                        >
                                        @error('name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập phần trăn sale</label>
                                        <input type="text"
                                               class="form-control @error('percent_sale') is-invalid @enderror"
                                               placeholder="Phần trăm sale"
                                               name="percent_sale"
                                               value="{{ old('percent_sale') }}"
                                        >
                                        @error('percent_sale')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label>File Ảnh slider</label>
                                        <input type="file"
                                        class="form-control-file"
                                        name="image_path"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập mô tả</label>
                                        <input type="text"
                                               class="form-control @error('description') is-invalid @enderror"
                                               placeholder="Mô tả slider"
                                               name="description"
                                               value="{{ old('description') }}"
                                        >
                                        @error('description')
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

@endpush

@push('scripts')

@endpush

