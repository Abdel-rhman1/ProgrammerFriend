@if (count($jobs) == 0)
    <div class="alert alert-danger text-center">
        <span>
            There No Job Matches You Searches
        </span>
    </div>
@else
<div class="row">
@foreach ($jobs as $job)
 <a  href="{{route('JobDetails' , $job->ID)}}">
    <div class='col-lg-3 col-md-4 col-sm-6 col-12'>
        <div class="jobDiv">
            <p class="JobName float-left">{{$job->Name}}</p>
            <p class="float-right">Remote</p>
            <div class="UserJob">
                <a href="mailto:{{$job->Posteremail}}">
                    {{$job->Posteremail}}
                </a>
            </div>
            <p class="JobDate float-left" style="color:green">{{$job->InValidUpTo}}</p>
            <p class="float-right">Easy To apply</p>
        </div>
    </div>
</a>
@endforeach
@endif
</div>