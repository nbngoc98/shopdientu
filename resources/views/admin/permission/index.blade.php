@extends('admin.admin')

@section('title', 'Danh sách quyền hạn')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Quyền hạn', 'key'=>'Danh sách','name_title'=>'Danh sách quyền hạn'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Danh sách quyền hạn</h3>
{{--                                <div class="card-tools mr-1">--}}
{{--                                    @can('list-category')--}}
{{--                                        <a href="{{route('permission.add')}}"><button type="button" class="btn btn-block btn-success">ADD</button></a>--}}
{{--                                    @endcan--}}
{{--                                </div>--}}
                            </div>
                            <div class="card-body">
                                <div id="accordion">
                                    @foreach($permission as $per)
                                    <div class="card">
                                        <div class="card-header">
                                            <a class="card-title" data-toggle="collapse" href="#collapse{{$per->id}}">
                                               {{ $per->name }}
                                            </a>
                                            <div class="card-tools mr-1">
                                                <a class="btn btn-info btn-sm" href="#">
                                                    <i class="fas fa-pencil-alt">
                                                    </i>
                                                    Edit
                                                </a>
                                                @can('delete-permission')
                                                <a class="btn btn-danger btn-sm" href="{{route('permission.delete',['id'=> $per->id])}}">
                                                    <i class="fas fa-trash">
                                                    </i>
                                                    Delete
                                                </a>
                                                @endcan
                                            </div>
                                        </div>
                                        <div id="collapse{{$per->id}}" class="collapse" data-parent="#accordion">
                                            <div class="card-body">
                                                @foreach($per->permissionChildrent as $item)
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <p class="text-danger float-left"><b>{{ $item->name }}</b></p>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="float-right">
                                                                <a class="btn btn-info btn-sm" href="#">
                                                                    <i class="fas fa-pencil-alt">
                                                                    </i>
                                                                    Edit
                                                                </a>
                                                                @can('delete-permission')
                                                                    <a class="btn btn-danger btn-sm" href="{{route('permission.delete',['id'=> $item->id])}}">
                                                                        <i class="fas fa-trash">
                                                                        </i>
                                                                        Delete
                                                                    </a>
                                                                @endcan
                                                            </div>

                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    @can('add-permission')
                        <div class="col-md-7">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Form thêm quyền hạn</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form role="form" action="{{route('permission.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nhập permission</label>
                                            <input type="text"
                                                   class="form-control"
                                                   placeholder="Tên permission"
                                                   name="name"
                                            >
                                        </div>
                                        <div class="form-group">
                                            <label>Chọn permission cha</label>
                                            <select class="form-control" name="parent_id">
                                                <option value="0">Chọn permission cha</option>
                                                {!! $htmlOption !!}
                                            </select>
                                        </div>
                                    </div>

                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @endcan
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection


