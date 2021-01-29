@extends('admin.admin')

@section('title', 'Thêm danh mục sản phẩm')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.layouts.content_header', ['name'=>'Danh mục', 'key'=>'Chỉnh sửa','name_title'=>'Chỉnh sửa danh mục sản phẩm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Chỉnh sửa</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('categories.update', ['id' => $category->id])}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên danh mục</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên danh mục"
                                               name="name"
                                               value="{{ $category->name }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn danh mục cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">Chọn danh mục cha</option>
                                            {!! $htmlOption !!}
                                        </select>
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


