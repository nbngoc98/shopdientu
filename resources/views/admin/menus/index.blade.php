@extends('admin.admin')

@section('title', 'Menus')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'menus', 'key'=>'List'])
    @include('errors.success')
        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Danh mục sản phẩm</h3>
                                <div class="card-tools mr-1">
                                    <a href="{{route('menus.add')}}"><button type="button" class="btn btn-block btn-success">ADD</button></a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>Tên menus</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($menus as $menu)
                                    <tr>
                                        <td>{{$menu->id}}</td>
                                        <td>{{$menu->name}}</td>
                                        <td>
                                            <a href="{{route('menus.edit',['id'=> $menu->id])}}"
                                               class="btn  btn-default">Edit</a>
                                            <a href="{{route('menus.delete',['id'=> $menu->id])}}"
                                               class="btn  btn-danger">Delete</a>
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
                                 {{ $menus->links() }}
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


