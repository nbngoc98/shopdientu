@extends('home::homes.layouts.master')

@section('title')
    <title>{{ $title }}</title>
@endsection
@section('content')
    <div class="container product-detail">
        <div class="row">
            <ul class="breadcrumb">
                <li><a href="#"><i class="fa fa-home"></i></a></li>
                <li><a href="{{ route('home.product_list', [$name_cate_parent->slug, '0','0', $name_cate_parent->id])}}">{{ $name_cate_parent->name }}</a></li>
                <li><a href="{{route('home.product_list',[$name_cate_parent->slug, $brand->slug,'00', $brand->id])}}">{{ $brand->name }}</a></li>
                <li><a href="{{route('home.product_list',[$name_cate_parent->slug, $brand->slug,$products->category->slug, $products->category->id])}}">{{ $products->category->name }}</a></li>
                <li><a>{{ $products->name }}</a></li>
            </ul>
        </div>
        <div class="row">
            <aside class="col-md-3 col-sm-4 col-xs-12 content-aside left_column sidebar-offcanvas">
                <span id="close-sidebar" class="fa fa-times"></span>
                @include('home::homes.product_detail.category')
                @include('home::homes.product_detail.product_hot')
            </aside>
            <div id="content" class="col-md-9 col-sm-12 col-xs-12">
                <a href="javascript:void(0)" class="open-sidebar hidden-lg hidden-md"><i class="fa fa-bars"></i>Sidebar</a>
                <div class="sidebar-overlay "></div>
                @include('home::homes.product_detail.view_product')
                @include('home::homes.product_detail.dess_review')
                @include('home::homes.product_detail.pro_hot_pro_new')

            </div>
        </div>
    </div>
    </div>
@endsection
@push('style')
{{--    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">--}}
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.7.3/dist/alpine.min.js" defer></script>
{{--    <script src="js/rateit/src/jquery.rateit.js" type="text/javascript"></script>--}}

@endpush
@push('scripts')

    <script type="text/javascript">
        $('[name="filter_sort"]').change(function(event) {
            $('#filter_sort').submit();
        });
    </script>
{{--    <script>--}}
{{--        function setup() {--}}
{{--            return {--}}
{{--                products: [--}}
{{--                    {--}}
{{--                        price: {{ $price->price }},--}}
{{--                        quantity: {{ $price->amount }}--}}
{{--                    }--}}
{{--                ]--}}
{{--            }--}}
{{--        }--}}
{{--    </script>--}}

@endpush
