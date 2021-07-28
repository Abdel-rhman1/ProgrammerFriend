<div class="postsInProfile">
    <div class="row">
        @foreach ($jobs as $job)
            <div class='col-sm-12'>
                <div class="jobDiv">
                    <p class="JobName float-left">{{$job->Name}}</p>
                    <p class="float-right">Remote</p>
                    <p style="clear: both"></p>
                    <div class="job-des">
                        <p>{{$job->description}}</p>
                    </div>
                    <div class="UserJob" style="margin-top: -10px !important">
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
        <div class="text-cenetr" style="width: 100%;
        text-align: center; margin-top:10px;margin-bottom:20px">
            <button wire:click.prevent="loadMore" class="btn btn-success">Load More</button>
        </div>
        @endif
</div>