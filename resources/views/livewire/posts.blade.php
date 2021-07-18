<div>
    <div class="row">
        @foreach ($jobs as $job)
        
        
            <div class='col-sm-3'>
                <div class="jobDiv">
                    <p class="JobName float-left">{{$job->Name}}</p>
                    <p class="float-right">Remote</p>
                    <div class="UserJob">
                        <a href="mailto:{{$job->Posteremail}}">
                                {{$job->Posteremail}}
                        </a>
                    </div>
                    <p class="JobDate float-left" style="color:green">{{$job->InValidUpTo}}</p>
                    <a href="{{route('JobDetails' , $job->ID)}}">
                        <p class="float-right">Easy To apply</p>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
    
    @if ($jobs->hasMorePages())
        <div text-align="center">
            <button wire:click.prevent="loadMore" class="text-center btn btn-success">Load More</button>
        </div>
        @endif
    
</div>
