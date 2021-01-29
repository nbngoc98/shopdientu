@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Đăng Nhập</a></li>
            </ul>
            <div id="content">
                    <div class="row" >
                        <div class="col-sm-6">
                            <div class="well "  style="background: white;">
                                <h2>Khách hàng mới</h2>
                                <p><strong>Đăng ký tài khoản </strong></p>
                                <p>Bằng cách tạo một tài khoản, bạn sẽ có thể mua sắm nhanh hơn, được cập nhật về trạng thái của đơn đặt hàng và theo dõi các đơn đặt hàng bạn đã thực hiện trước đó.
                                </p>
                                <a href="{{ route('home.register_view') }}" class="btn btn-primary">ĐĂNG KÝ</a></div>
                        </div>
                        <div class="col-sm-6">

                        <div class="well col-sm-12" style="background: white;">

                            <h2>Khách hàng quay trở lại </h2>
                            <p><strong>Đăng nhập tài khoản</strong></p>
                            <form action="{{ route('home.postlogin') }}"  method="POST" >
                                @csrf
                                <div class="form-group">
                                    <label class="control-label" for="input-email">Địa chỉ email</label>
                                    <input type="text"  name="email" placeholder="Email Address" value="{{ old('email') }}" id="input-email" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="control-label" for="input-password">Mật khẩu</label>
                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                    <a href="#">Quên mật khẩu</a></div>

                                <input type="submit" value="ĐĂNG NHẬP" class="btn btn-primary pull-left">
                            </form>
                            <column id="column-login" class="col-sm-8 pull-right">
                                <div class="row">
                                    <div class="social_login pull-right" id="so_sociallogin">
                                        <a href="#" class="btn btn-social-icon btn-sm btn-facebook"><i class="fa fa-facebook fa-fw" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-social-icon btn-sm btn-twitter"><i class="fa fa-twitter fa-fw" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-social-icon btn-sm btn-google-plus"><i class="fa fa-google fa-fw" aria-hidden="true"></i></a>
                                        <a href="#" class="btn btn-social-icon btn-sm btn-linkdin"><i class="fa fa-linkedin fa-fw" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </column>
                        </div>
                    </div>
                </div>
            </div>
{{--            @include('home::homes.components.menu_account')--}}
        </div>

    </div>
@endsection
