@extends('admin.admin')

@section('title', 'Danh mục sản phẩm')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Danh mục', 'key'=>'Danh sách','name_title'=>'Danh sách danh mục sản phẩm'])

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục sản phẩm</h3>
                                <div class="card-tools mr-1">
                                    @can('list-category')
                                    <a href="{{route('categories.add')}}"><button type="button" class="btn btn-block btn-success">Thêm mới</button></a>
                                    @endcan
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên danh mục</th>
                                        <th>Ngày tạo</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $category)
                                    <tr>
                                        <td>{{$category->id}}</td>
                                        <td>{{$category->name}}</td>
                                        <td>{{date('d-m-Y', strtotime($category->created_at))}}</td>
                                        <td>
                                            {{--dùng @CAN để ẩn hiện theo quyền--}}
                                            @can('edit-category')
                                            <a href="{{route('categories.edit',['id'=> $category->id])}}"
                                               class="btn  btn-default">Edit</a>
                                            @endcan
                                            @can('delete-category')
                                            <a href="{{route('categories.delete',['id'=> $category->id])}}"
                                               class="btn  btn-danger">Delete</a>
                                            @endcan
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
{{--                                <ul class="pagination pagination-sm m-0 float-right">--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">1</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                                    <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>--}}
{{--                                </ul>--}}
                                {{ $categories->links() }}
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


