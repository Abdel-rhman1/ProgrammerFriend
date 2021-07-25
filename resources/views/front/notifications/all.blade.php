@include('front.index')
@section('title')
    All Programmers
@endsection
<div class="container">
    <div class="all-Notificationa">
       @foreach ($notifications as $item)
            <div class="notification">
                <div class="contents" style="padding:10px">
                    <span class="float:left">
                    {{$item->notifi_content}}
                    </span>
                    @if($item->viewd == 0)
                        <span class="" style="float:right;width:10px;height:10px;border-radius:50%;background-color:green"></span>
                    @else
                      
                    @endif
                    
                </div>
                
            </div>
           
       @endforeach
    </div>
</div>
@include('front.layouts.foot')