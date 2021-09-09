
    <div class="row">
    @foreach ($items as $item)
    
    <div class='col-xl-4 col-lg-4 col-md-6 col-sm-6 col-6'>
        <div class='allProject' >
        <div class='caption'>
            <a class='' href="{{route('showProject' , $item->id)}}">
            <div class='inner'>
                <img src="{{asset('images/Items/'.$item->photo)}}" class="w-100">
            </div>
        </a>
        </div>
            <div class='head'>
                <a href='{{route('showProject' , $item->id)}}'>
                    <p data-toggle="tooltip" data-placement="bottom" title="{{$item->Name}}">{{$item->Name}}</p>
                </a>
            </div>
    </div>
</div>

@endforeach
</div>
@if (count($items) == 0)
        <div class="ThereNomatches alert alert-danger text-center" style="height:50px;width:100%">
            <span>
                There No Results mathes Your Searches
            </span>
      </div>

@endif
@if ($items->hasMorePages())
        <div text-align="center" style="margin:20px auto ; display:block">
            <button wire:click.prevent="loadMore" class="text-center btn btn-success">Load More</button>
        </div>
@endif
