@extends('admin.admin')

@section('title', 'Edit role')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Vai trò', 'key'=>'Chỉnh sửa','name_title'=>'Chỉnh sửa vai trò'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form chỉnh sửa vai trò users</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('roles.update', ['id' => $role->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên vài trò </label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên vai trò"
                                               name="name"
                                               value="{{ $role->name }}"
                                        >
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Mô tả vai trò </label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="mô tả vai trò"
                                               name="display_name"
                                               value="{{$role->display_name}}"
                                        >
                                    </div>
                                    <div class="col-md-12">
                                        <label>
                                            <input type="checkbox" class="checkall">
                                            Chọn tất cả
                                        </label>
                                    </div>
                                    @foreach($permissionsParent as $permissionsParentItem)
                                        <div class="card card-success checkbox_parent">
                                            <div class="card-header">
                                                <div class="icheck">
                                                    <input type="checkbox" value="" class="checkbox_wrapper">
                                                    <label>Module {{$permissionsParentItem->name}}</label>
                                                </div>
                                            </div>
                                            <div class="card-body row">
                                                @foreach($permissionsParentItem->permissionChildrent as $permissionsChildrentItem)
                                                    <div class="col-md-3">
                                                        <div class="icheck">
                                                            <input class="checkbox_childrent"
                                                                   type="checkbox"
                                                                   name="permission_id[]"
                                                                   {{ $pemissionsChecked->contains('id', $permissionsChildrentItem->id) ? 'checked' : '' }}
                                                                   value="{{$permissionsChildrentItem->id}}">
                                                            <label>Chức năng {{$permissionsChildrentItem->name}}</label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    @endforeach
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

@endpush
@push('scripts')
    <script>
        $(function () {
            $('.checkbox_wrapper').on('click', function () {
                $(this).parents('.checkbox_parent').find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
            });

            $('.checkall').on('click', function () {
                $(this).parents().find('.checkbox_childrent').prop('checked', $(this).prop('checked'));
                $(this).parents().find('.checkbox_wrapper').prop('checked', $(this).prop('checked'));

            });
        });
    </script>

@endpush

