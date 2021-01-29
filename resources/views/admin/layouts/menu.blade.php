<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{asset('admins/logo/logo.png')}}" alt="AdminLTE Logo" class="brand-image "
             style="opacity: 0.8"><br>
{{--        <span class="brand-text font-weight-light">Eletronics</span>--}}
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admins/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::guard('admin-web')->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{route('admin.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dasboard</p>
                    </a>
                </li>

                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-area"></i>
                        <p>
                            Thống kê
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('thongke.day')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Theo ngày</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('thongke.month')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Theo tháng</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('thongke.year')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Theo năm</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('product.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>
                            Sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('categories.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-bookmark"></i>
                        <p>
                            Danh mục sản phẩm
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('review.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-heart"></i>
                        <p>
                            Đánh giá
                        </p>
                    </a>

                </li>
{{--                <li class="nav-item has-treeview">--}}
{{--                    <a href="tintuc.html" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-file"></i>--}}
{{--                        <p>--}}
{{--                            Tin tức--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item has-treeview">
                    <a href="{{route('order.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>
                            Đơn hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('user_guest.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Thành viên
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="{{route('users.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Nhân viên
                        </p>
                    </a>
                </li>
{{--                <li class="nav-item">--}}
{{--                    <a href="{{route('menus.index')}}" class="nav-link">--}}
{{--                        <i class="nav-icon fas fa-th"></i>--}}
{{--                        <p>--}}
{{--                            Quản lý Menus--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </li>--}}
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Giao diện người dùng
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('slider.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản lý Slider
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('setting.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản lý Settings
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            Quản lý ADMIN
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('roles.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản lý vai trò
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('permission.index')}}" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Quản lý quyền
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
