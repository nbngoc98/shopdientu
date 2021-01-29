@extends('home::homes.layouts.master')

@section('title')
    <title>Home page</title>
@endsection
@section('content')
    <div id="content">
        <div class="so-page-builder">
            @include('home::homes.home.slider_banner_category')
            @include('home::homes.home.flash_sale')
            @include('home::homes.home.cate_hot')
{{--            @include('home::homes.home.brand')--}}
        </div>
    </div>
@endsection
