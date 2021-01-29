@extends('admin.admin')

@section('title', 'Thêm permission')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'permission', 'key'=>'Add'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form thêm permission</h3>
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
                                <!-- /.card-body -->
{{--                                <div class="card-body">--}}
{{--                                        <div class="card card-success checkbox_parent">--}}
{{--                                            <div class="form-group">--}}
{{--                                                <label>Chọn tên module</label>--}}
{{--                                                <select class="form-control" name="module_parent">--}}
{{--                                                    <option value="">Chọn tên module</option>--}}
{{--                                                    @foreach(config('permissions.table_module') as $moduleItem)--}}
{{--                                                    <option value="{{$moduleItem}}">{{$moduleItem}}</option>--}}
{{--                                                    @endforeach--}}
{{--                                                </select>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-header">--}}
{{--                                                <div class="icheck">--}}
{{--                                                    <input type="checkbox" value="" class="checkbox_wrapper">--}}
{{--                                                    <label>Chọn tất cả</label>--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="card-body row">--}}
{{--                                                @foreach(config('permissions.module_childrent') as $module_childrentItem)--}}
{{--                                                <div class="col-md-3">--}}
{{--                                                    <div class="icheck">--}}
{{--                                                        <input class="checkbox_childrent"--}}
{{--                                                               type="checkbox"--}}
{{--                                                               name="module_chilrent[]"--}}
{{--                                                               value="{{$module_childrentItem}}">--}}
{{--                                                        <label>{{$module_childrentItem}}</label>--}}
{{--                                                    </div>--}}
{{--                                                </div>--}}
{{--                                                @endforeach--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                </div>--}}
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

        });
    </script>

@endpush

