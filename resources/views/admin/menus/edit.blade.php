@extends('admin.admin')

@section('title', 'Sửa danh mục menus')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.layouts.content_header', ['name'=>'menus', 'key'=>'Edit'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title"></h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('menus.update', ['id' => $menus->id])}}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên menu</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên menu"
                                               name="name"
                                               value="{{ $menus->name }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label>Chọn menu cha</label>
                                        <select class="form-control" name="parent_id">
                                            <option value="0">Chọn menu cha</option>
                                            {!! $optionSelect !!}
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


