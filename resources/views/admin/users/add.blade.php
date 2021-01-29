@extends('admin.admin')

@section('title', 'Thêm users')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.layouts.content_header', ['name'=>'Nhân viên', 'key'=>'Thêm mới','name_title'=>'Thêm nhân viên'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form thêm USER-ADMIN</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên user </label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên user"
                                               name="name"
                                               value="{{ old('name') }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập email </label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên user"
                                               name="email"
                                               value="{{ old('email') }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập password </label>
                                        <input type="password"
                                               class="form-control"
                                               placeholder="Password"
                                               name="password"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn vai trò</label>
                                        <select name="role_id[]" class="form-control tags_select_choose" multiple="multiple">
                                            <option value=""></option>
                                            @foreach($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Lưu lại</button>
                                    <a href="{{route('users.index')}}" class="btn btn-default float-right">Trở lại</a>
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
@endpush
@push('scripts')
    <script src="{{asset('vendor/select2/select2.js')}}"></script>
    <script>
        $(".tags_select_choose").select2({
            tags: true,
            tokenSeparators: [',']
        })
    </script>

@endpush

