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
                <li><a href="#">Đăng Ký</a></li>
            </ul>
            <div id="content">
                <div class="container main-container" class="col-md-9">
                    <h2 class="title">ĐĂNG KÝ TÀI KHOẢN</h2>
                    <p>‎Nếu bạn đã có tài khoản với chúng tôi, vui lòng đăng nhập tại ‎‎trang ‎<a href="#">đăng nhập</a>.</p>
                    <form action="{{ route('home.register') }}"  method="POST" class="form-horizontal account-register clearfix">
                        @csrf
                        <fieldset id="account">
                            <legend>Thông tin cá nhân</legend>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-firstname">First Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="first_name" placeholder="First Name" value="{{ old('first_name') }}" id="input-firstname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-lastname">Last Name</label>
                                <div class="col-sm-10">
                                    <input type="text" name="last_name" placeholder="Last Name" value="{{ old('last_name') }}" id="input-lastname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-email">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" placeholder="Email Address" value="{{ old('email') }}" id="input-email" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset>
                            <legend>Mật khẩu của bạn</legend>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-password">Password</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" value="" placeholder="Password" id="input-password" class="form-control">
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-sm-2 control-label" for="input-confirm">Password Confirm</label>
                                <div class="col-sm-10">
                                    <input type="password" name="confirm_password" value="" placeholder="Password Confirm" id="input-confirm" class="form-control">
                                </div>
                            </div>
                        </fieldset>
                        <div class="buttons">
                            <div class="pull-right">
                                <input type="submit" value="Đăng ký" class="btn btn-primary" style="margin-bottom: 10px;">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

{{--            @include('home::homes.components.menu_account')--}}
        </div>

    </div>
@endsection
