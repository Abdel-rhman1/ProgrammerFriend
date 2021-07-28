<div>
    <div class="row">
    @foreach ($items as $item)
    
    <div class='col-sm-4'>
        <div class='allProject'>
        <div class='caption'>
            <a class='' href="{{route('showProject' , $item->ID)}}">
            <div class='inner'>
                <img src="{{asset('images/Items/'.$item->photo)}}" width="200px" height="200px">
            </div>
        </a>
        </div>
            <div class='head'>
                <a href='{{route('showProject' , $item->ID)}}'>
                    <p data-toggle="tooltip" data-placement="bottom" title="{{$item->Name}}">{{$item->Name}}</p>
                </a>
            </div>
    </div>
</div>

@endforeach
@if (count($items) == 0)
        <div class="ThereNomatches alert alert-danger text-center" style="height:50px;width:100%">
            <span>
                There No Results mathes Your Searches
            </span>
      </div>

</div>
@endif
@if ($items->hasMorePages())
        <div text-align="center" style="margin:20px auto ; display:block">
            <button wire:click.prevent="loadMore" class="text-center btn btn-success">Load More</button>
        </div>
@endif
</div>
