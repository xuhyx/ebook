@if($page>1)
    <div class="col-md-12">
        <ul class="pagination pagination-split pagination-md pagination-contact pull-right" >
            <li><a href="{{$res->url(1).$url}}">首页</a></li>
            <li class="{{$res->currentPage()==1?'disabled':''}}"><a href="{{$res->previousPageUrl().$url}}"><i class="fa fa-angle-left"></i></a></li>
            @if($page<=6)
                @for ($i = 1; $i < $page+1; $i++)
                    <li class='{{$i==$res->currentPage()?"active":" "}}'><a href="{{$res->url($i).$url}}">{{$i}}</a></li>
                @endfor

            @elseif($res->currentPage()<=3)
                @for($i=1;$i<6;$i++)
                    <li class='{{$i==$res->currentPage()?"active":" "}}'><a href="{{$res->url($i).$url}}">{{$i}}</a></li>
                @endfor
                <li class="disabled"><a href="##" style="cursor: default;">...</a></li>
            @elseif($res->currentPage()>=$page-3)
                <li class="disabled"><a href="##" style="cursor: default;">...</a></li>
                @for($i=$page-5;$i<=$page;$i++)
                    <li class='{{$i==$res->currentPage()?"active":" "}}'><a href="{{$res->url($i).$url}}">{{$i}}</a></li>
                @endfor

            @else
                <li class="disabled"><a href="##" style="cursor: default;">...</a></li>
                @for($i=$res->currentPage()-2;$i<$res->currentPage()+3;$i++)
                    <li class='{{$i==$res->currentPage()?"active":" "}}'><a href="{{$res->url($i).$url}}">{{$i}}</a></li>
                @endfor
                <li class="disabled"><a href="##" style="cursor: default;">...</a></li>
            @endif
            <li class="{{$res->currentPage()==$page?'disabled':''}}"><a href="{{$res->nextPageUrl().$url}}"><i class="fa fa-angle-right"></i></a></li>
            <li><a href="{{$res->url($res->lastPage()).$url}}">尾页</a></li>
            <li class="disabled"><a href="##" style="cursor: default;">共{{$page}}页</a></li>
        </ul>
    </div>
@endif