
<div class="module category-style">
    <h3 class="modtitle"><span>{{ $name_cate_parent->name }} </span></h3>
    <div class="mod-content box-category">
        <ul class="accordion" id="accordion-category">
            <?php $stt = 0; ?>
            @foreach($listProductTypes as $typePro)
                    @if(count($typePro->categoryChildrent) != '')
                        <li class="panel">
                            <a >{{ $typePro->name }}</a>
                            <span class="head"><a class="pull-right accordion-toggle " data-toggle="collapse" data-parent="#accordion-category" href="#category{{$typePro->id}}"></a></span>
                            <div id="category{{$typePro->id}}" class="panel-collapse collapse" style="clear:both">
                                <ul>
                                    @foreach($typePro->categoryChildrent as $typeProChildrent)
                                        <li><a href="{{route('home.product_list',[$name_cate_parent->slug, $name_cate->slug,$typeProChildrent->slug, $typeProChildrent->id])}}">{{ $typeProChildrent->name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                    @else
                        <li class="panel">
                            <a href="{{route('home.product_list',[$name_cate_parent->slug, $typePro->slug,'00', $typePro->id])}}">{{ $typePro->name }}</a>
                        </li>
                    @endif
            @endforeach


        </ul>
    </div>
</div>
