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
    <script src="{{asset('vendor/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('vendor/product/index.js')}}"></script>
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
@extends('admin.admin')

@section('title', 'Product')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
    @include('admin.layouts.content_header', ['name'=>'Thống kê ngày', 'key'=>'Danh sách','name_title'=>'Danh Sách Thống Kê Theo Ngày '])

    <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row " style="margin-bottom: 30px ">
                    <div class="col-md-6 ">
                        <form class="form-inline " method="get " action=" ">
                            <div class="form-group " style="margin-left: 10px;margin-right: 10px; ">
                                <select name="day " id=" " class="form-control ">
                                    <option value=" ">Chọn ngày</option>
                                    <option value="1 ">01</option>
                                    <option value="2 ">02</option>
                                    <option value="3 ">03</option>
                                    <option value="4 ">04</option>
                                    <option value="5 ">05</option>
                                    <option value="6 ">06</option>
                                    <option value="7 ">07</option>
                                    <option value="8 ">08</option>
                                    <option value="9 ">09</option>
                                    <option value="10 ">10</option>
                                    <option value="11 ">11</option>
                                    <option value="12 ">12</option>
                                    <option value="13 ">13</option>
                                    <option value="14 ">14</option>
                                    <option value="15 ">15</option>
                                    <option value="16 ">16</option>
                                    <option value="17 ">17</option>
                                    <option value="18 ">18</option>
                                    <option value="19 ">19</option>
                                    <option value="20 ">20</option>
                                    <option value="21 ">21</option>
                                    <option value="22 ">22</option>
                                    <option value="23 ">23</option>
                                    <option value="24 ">24</option>
                                    <option value="25 ">25</option>
                                    <option value="26 ">26</option>
                                    <option value="27 ">27</option>
                                    <option value="28 ">28</option>
                                    <option value="29 ">29</option>
                                    <option value="30 ">30</option>
                                    <option value="31 ">31</option>
                                </select>
                            </div>
                            <div class="form-group " style="margin-left: 10px;margin-right: 10px; ">
                                <select name="month " id=" " class="form-control ">
                                    <option value=" ">Chọn tháng</option>
                                    <option value="1 ">01</option>
                                    <option value="2 ">02</option>
                                    <option value="3 ">03</option>
                                    <option value="4 ">04</option>
                                    <option value="5 ">05</option>
                                    <option value="6 ">06</option>
                                    <option value="7 ">07</option>
                                    <option value="8 ">08</option>
                                    <option value="9 ">09</option>
                                    <option value="10 ">10</option>
                                    <option value="11 ">11</option>
                                    <option value="12 ">12</option>
                                </select>
                            </div>
                            <div class="form-group " style="margin-left: 10px;margin-right: 10px; ">
                                <select name="year " id=" " class="form-control ">
                                    <option value=" ">Chọn năm</option>
                                    <option value="2010 ">2010</option>
                                    <option value="2011 ">2011</option>
                                    <option value="2012 ">2012</option>
                                    <option value="2013 ">2013</option>
                                    <option value="2014 ">2014</option>
                                    <option value="2015 ">2015</option>
                                    <option value="2016 ">2016</option>
                                    <option value="2017 ">2017</option>
                                    <option value="2018 ">2018</option>
                                    <option value="2019 ">2019</option>
                                    <option value="2020 ">2020</option>
                                    <option value="2020 ">2021</option>
                                </select>
                            </div>
                            <button type="submit " class="btn btn-success "><i class="fa fa-search "> Search</i></button>
                            <button style="margin-left: 10px; " type="submit " name="export " value="true " class="btn btn-info "><i class="fa fa-save "> Export</i></button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-15 " style="background-color: white; ">
                    <!-- /.card-header -->
                    <div class="card-body p-0 ">
                        <div class="table-responsive ">
                            <table class="table m-0 ">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Ngày </th>
                                    <th>Lượt mua</th>
                                    <th>Tổng tiền</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td><a href="# ">1</a></td>
                                    <td>11-12-2020</td>
                                    <td>1 lượt</td>
                                    <td>
                                        12.214.500 vnđ
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="# ">2</a></td>
                                    <td>11-12-2020</td>
                                    <td>1 lượt</td>
                                    <td>
                                        12.214.500 vnđ
                                    </td>
                                </tr>
                                <tr>
                                    <td><a href="# ">3</a></td>
                                    <td>11-12-2020</td>
                                    <td>1 lượt</td>
                                    <td>
                                        12.214.500 vnđ
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
@endsection
