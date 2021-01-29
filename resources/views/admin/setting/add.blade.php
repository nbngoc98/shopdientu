@extends('admin.admin')

@section('title', 'Thêm setting')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Setting', 'key'=>'Thêm mới','name_title'=>'Thêm setting'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form thêm setting</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{ route('setting.store') . '?type=' . request()->type }}" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập Config key</label>
                                        <input type="text"
                                               class="form-control @error('config_key') is-invalid @enderror"
                                               placeholder="Nhập Config key"
                                               name="config_key"
                                               value="{{ old('config_key') }}"
                                        >
                                        @error('config_key')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    @if(request()->type === 'Text')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nhập Config value</label>
                                            <input type="text"
                                                   class="form-control @error('config_value') is-invalid @enderror"
                                                   placeholder="Nhập Config value"
                                                   name="config_value"
                                                   value="{{ old('config_value') }}"
                                            >
                                            @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @elseif(request()->type === 'Textarea')
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Nhập Config value</label>
                                            <textarea
                                                class="form-control @error('config_value') is-invalid @enderror"
                                                name="config_value"
                                                placeholder="Nhập config value"
                                                rows="5"
                                            >{{ old('config_value') }}</textarea>
                                            @error('config_value')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    @endif
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

