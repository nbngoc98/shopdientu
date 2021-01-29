@extends('admin.admin')

@section('title', 'Sửa sản phẩm')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Sản phẩm', 'key'=>'Chỉnh sửa','name_title'=>'Chỉnh sửa sản phẩm'])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Form sửa sản phẩm</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form role="form" action="{{route('product.update', ['id' => $products->id])}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập tên sản phẩm</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Tên sản phẩm"
                                               name="name"
                                               value="{{$products->name}}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập giá sản phẩm</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Giá sản phẩm"
                                               name="price"
                                               value="{{$products->price}}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập % sale</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="% sale"
                                               name="sale"
                                               value="{{$products->pro_sale}}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nhập số lượng sản phẩm</label>
                                        <input type="text"
                                               class="form-control"
                                               placeholder="Số lượng sản phẩm"
                                               name="amount"
                                               value="{{$products->amount}}"
                                        >
                                    </div>

                                    <div class="form-group">
                                        <label>Hiện thị sản phẩm :</label>
                                        @if ($products->status === 1)
                                            <input  type="checkbox" name="status"  checked data-bootstrap-switch >
                                        @else
                                            <input  type="checkbox" name="status"   data-bootstrap-switch >
                                        @endif

                                    </div>

                                    <div class="form-group">
                                        <label>File Ảnh đại diện sản phẩm</label>
                                        <input type="file"
                                               class="form-control-file"
                                               name="avata_image_path"
                                        >
                                        <div>
                                            <img src="{{asset('public'.$products->avata_image_path)}}" alt="" height="80px" width="100px">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>File Ảnh chi tiết</label>
                                        <input type="file"
                                               multiple
                                               class="form-control-file"
                                               name="image_path[]"
                                        >
                                        <div>
                                            @foreach($products->images as $imageDetail)
                                            <img src="{{asset('public'.$imageDetail->image_path)}}" alt="" height="80px" width="100px">
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Chọn danh mục</label>
                                        <select class="form-control select_init" name="category_id">
                                            <option value="">Chọn danh mục</option>
                                            {!! $htmlOption !!}
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nhập tags</label>
                                        <select  name="tags[]" class="form-control tags_select_choose" multiple="multiple">
                                            @foreach($products->tags as $tagItem)
                                                <option value="{{$tagItem->name}}" selected="selected">{{$tagItem->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Nội dung</label>
                                        <textarea name="contents" class="form-control tinymce_editor" placeholder="Nhập nội dung" rows="9"> {{$products->content}}</textarea>
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
    {{--    {{asset('admin/')}}--}}
    <link href="{{asset('vendor/select2/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('vendor/product/add.css')}}" rel="stylesheet" />
@push('scripts')
    <script src="{{asset('vendor/select2/select2.js')}}"></script>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script src="{{asset('vendor/product/add.js')}}"></script>
    <!-- Bootstrap Switch -->
    <script src="{{asset('admins/plugins/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
    <script>
        $(function () {
            $("input[data-bootstrap-switch]").each(function () {
                $(this).bootstrapSwitch('state', $(this).prop('checked'));
            });
        })
    </script>
@endpush

