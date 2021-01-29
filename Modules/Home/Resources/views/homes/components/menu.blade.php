
<div class="col-lg-8 col-md-8 col-sm-1 col-xs-3 header-menu">
    <div class="megamenu-style-dev megamenu-dev">
        <div class="responsive">
            <nav class="navbar-default">
                <div class="container-megamenu horizontal">
                    <div class="navbar-header">
                        <button type="button" id="show-megamenu" data-toggle="collapse" class="navbar-toggle">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="megamenu-wrapper">
                        <span id="remove-megamenu" class="fa fa-times"></span>
                        <div class="megamenu-pattern">
                            <div class="container">
                                <ul class="megamenu" data-transition="slide" data-animationtime="500">
                                    <li class="">
                                        <p class="close-menu"></p>
                                        <a href="{{route('home.index')}}" class="clearfix">
                                            <strong>
                                                Trang chủ
                                            </strong>
                                        </a>
                                    </li>
                                    @foreach($categories as $category )
                                        @if(count($category->categoryChildrent) == 0)
                                            <li class="">
                                                <p class="close-menu"></p>
                                                <a href="{{ route('home.product_list', [$category->slug, '0','0', $category->id])}}" class="clearfix">
                                                    <strong>
                                                        {{ $category->name }}
                                                    </strong>
                                                </a>
                                            </li>
                                        @else

                                            <li class="full-width option2 with-sub-menu hover">
                                                <p class="close-menu"></p>
                                                <a href="{{ route('home.product_list', [$category->slug, '0','0', $category->id])}}" class="clearfix">
                                                    <strong>
                                                        {{ $category->name }}
                                                    </strong>
                                                    <span class="labelopencart"></span>
                                                    <b class="caret"></b>
                                                </a>
                                                <div class="sub-menu" style="width: 100%;">
                                                    <div class="content" >
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="html ">
                                                                    <div class="row">
                                                                        @foreach($category->categoryChildrent as $categoryChildrent)
                                                                        <div class="col-md-3">
                                                                            <div class="column">
                                                                                <a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug,'00', $categoryChildrent->id])}}" class="title-submenu">{{ $categoryChildrent->name }}</a>
                                                                                <div>
                                                                                    <ul class="row-list">
                                                                                        @foreach($categoryChildrent->categoryChildrent as $categoryChildrent2)
                                                                                            <li><a href="{{route('home.product_list',[$category->slug, $categoryChildrent->slug, $categoryChildrent2->slug, $categoryChildrent2->id])}}">{{ $categoryChildrent2->name }}</a></li>
                                                                                        @endforeach
                                                                                    </ul>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        @endif
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
