@if ($paginator->hasPages())
    <div class="col-lg-6 col-md-6 pt-xs-15">
        <p>hiển thị 1 đến {{$paginator->count()}} của {{$paginator->total()}} Sản phẩm</p>
    </div>
    <div class="col-lg-6 col-md-6">
        <!-- Pagination -->
        <ul class="pagination-box pt-xs-20 pb-xs-15">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled"><i class="fa fa-chevron-left"></i> Previous
                </li>
                {{--                <li class="disabled">--}}
                {{--                    <span><i class="fa fa-angle-double-left"></i></span>--}}
                {{--                </li>--}}
            @else
                <li class="disabled"><a href="{{ $paginator->previousPageUrl() }}" class="Previous"><i class="fa fa-chevron-left"></i> Previous</a>
                </li>
                {{--                <li>--}}
                {{--                    <a href="{{ $paginator->previousPageUrl() }}">--}}
                {{--                        <span><i class="fa fa-angle-double-left"></i></span>--}}
                {{--                    </a>--}}
                {{--                </li>--}}
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active">{{ $page }}</li>
                        @elseif (($page == $paginator->currentPage() + 1 || $page == $paginator->currentPage() + 2) || $page == $paginator->lastPage())
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @elseif ($page == $paginator->lastPage() - 1)
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                            {{--                            <li class="disabled"><span><i class="fa fa-ellipsis-h"></i></span></li>--}}
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li>
                    <a href="{{ $paginator->nextPageUrl() }}" class="Next"> Next <i class="fa fa-chevron-right"></i></a>
                </li>
            @else
                <li class="disabled">
                    Next <i class="fa fa-chevron-right"></i>
                </li>
            @endif
        </ul>
        <!-- Pagination -->
    </div>

@endif
