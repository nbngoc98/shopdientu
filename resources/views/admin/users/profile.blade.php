@push('style')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('admins/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
@endpush
@push('scripts')
    <!-- DataTables -->
    <script src="{{asset('admins/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admins/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    {{--Ajax--}}
    <script src="{{asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('vendor/users/index.js')}}"></script>
@endpush
@extends('admin.admin')

@section('title', 'User')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Profile', 'key'=>'Account','name_title'=>'Thông tin tài khoản'])

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-3">

              <!-- Profile Image -->
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <div class="text-center">
                    <img class="profile-user-img img-fluid img-circle"
                         src="{{asset('admins/dist/img/user8-128x128.jpg')}}"
                         alt="User profile picture">
                  </div>

                  <h3 class="profile-username text-center">{{ Auth::guard('admin-web')->user()->name }}</h3>

                  {{--  <p class="text-muted text-center">Software Engineer</p>  --}}

                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Đánh giá</b> <a class="float-right">1,322</a>
                    </li>
                    <li class="list-group-item">
                      <b>Duyệt đơn</b> <a class="float-right">543</a>
                    </li>
                    <li class="list-group-item">
                      <b>Điểm tích lỹ</b> <a class="float-right">13,287</a>
                    </li>
                  </ul>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->

              <!-- /.card -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
              <div class="card">
                <div class="card-header p-2">
                  <ul class="nav nav-pills">
                    <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Thông tin</a></li>
                    <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Đổi mật khẩu</a></li>

                  </ul>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">

                    <div class="tab-pane active" id="settings">
                      <form class="form-horizontal">
                        <div class="form-group row">
                          <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-10">
                            <input type="email" value="{{ Auth::guard('admin-web')->user()->name }}" class="form-control" id="inputName" placeholder="Name">
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                            <input type="email" value="{{ Auth::guard('admin-web')->user()->email }}" class="form-control" id="inputEmail" placeholder="Email">
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="inputSkills" class="col-sm-2 col-form-label">Vai trò quản trị</label>
                          <div class="col-sm-10">
                            <input type="text" value="Admin" class="form-control" id="inputSkills" placeholder="Skills">
                          </div>
                        </div>
                        <div class="form-group row">
                          <div class="offset-sm-2 col-sm-10">
                            <button type="submit" class="btn btn-danger">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- /.tab-pane -->
                    <div class="tab-pane" id="timeline">
                        <form class="form-horizontal">
                            <div class="form-group row">
                              <label for="inputName" class="col-sm-2 col-form-label">Mật khẩu cũ</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputName" placeholder="Mời nhập">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="inputEmail" class="col-sm-2 col-form-label">Mật khẩu mới</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="inputEmail" placeholder="Mời nhập">
                              </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail" class="col-sm-2 col-form-label">Nhập lại mật khẩu</label>
                                <div class="col-sm-10">
                                  <input type="password" class="form-control" id="inputEmail" placeholder="Mời nhập">
                                </div>
                              </div>

                            <div class="form-group row">
                              <div class="offset-sm-2 col-sm-10">
                                <button type="submit" class="btn btn-danger">Submit</button>
                              </div>
                            </div>
                          </form>
                      </div>
                  </div>
                  <!-- /.tab-content -->
                </div><!-- /.card-body -->
              </div>
              <!-- /.nav-tabs-custom -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
    </div>
    <!-- /.content-wrapper -->
@endsection


