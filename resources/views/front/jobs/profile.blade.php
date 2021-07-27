@include('front.index')
@section('title')
    All Jobs
@endsection
<div class="container" style="margin-top:50px;">
 
    <div class="row">
        <div class="col-sm-6">
            <div class="Jobs">
                <div class="JobBlock">
                    <p class="JobName">JN</p>
                    <p class="ComanyName">CN</p>
                    <p>
                        <span>JC</span>
                        <span>JT</span>
                    </p>
                </div>
            </div>
        </div>
       
        <div class="col-sm-6 jobDetailsParent">
            <div style="float:left">
               <h3>{{ $job->Name}}<h3>
            </div>
            <div style="float:right">
                <span class="cols-sm-4 btn btn-success"> <i class="fa fa-share" aria-hidden="true"></i>
                     Easy Apply</span>
                <a class="cols-sm-4 btn btn-success" href="{{route('save' , $job->ID)}}">
                     <i class="fa fa-heart-o" aria-hidden="true"></i>
                         Save
                </a>
                <span class="cols-sm-4 option"><i class="fa fa-ellipsis-h " aria-hidden="true"></i>
                </span>

            </div>
            <div style="clear:both"></div>
            <div class="row">
                <div class="col-sm-6 companystat">
                    <p>Rating Highlights</p>
                </div>
                <div class="col-sm-6 companystat">
                    <p>Job & Company Insights</p>
                </div>
            </div>
            <div class="details">
                <div class="row">
                    <div class="filt">
                        <span class="col-sm-1"><a href="#jobdetails">Job</a></span>
                        <span class="col-sm-1"><a href="#salaryDetails">Salary</a></span>
                        <span class="col-sm-1"><a href="#companyDetails">Company</a></span>
                        <span class="col-sm-1"><a href="#">Rating</a></span>
                        <span class="col-sm-1"><a href="#">Why Us</a></span>
                        <span class="col-sm-1"><a href="#">Benefits</a></span>
                    </div>
                    
                </div>
                <div class="filt-body">
                    @php 
                        $skillsArray = explode('-' , $job->description);
                        
                    @endphp
                    <h3 id="jobdetails">Qualifications</h3>
                    <ul>
                    @foreach ($skillsArray as $item)
                       <li> {{$item}} </li> 
                    @endforeach
                    </ul>
                    <h3 id="salaryDetails">Average Base Salary Estimate</h3>
                    <div class="row">
                        
                        <p class="col-sm-4">{{$job->Salary}}</p>
                        <div class="form-group col-sm-8">
                            <span class="" style="float:left">{{$job->minSalaryRange}}</span>
                            <span class="" style="float:right">{{$job->maxSalaryRange}}</span>
                            <span style="clear: both"></span>
                            @if($job->Salary!=0)
                            @php
                                $precentage = 3 + (($job->Salary - $job->minSalaryRange) / $job->maxSalaryRange)*100;
                                $precentage.='%';
                            @endphp
                            @else
                                @php 
                                    $precentage ='0%';
                                @endphp
                            @endif
                            <span style="margin-left:{{$precentage}}">
                                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                            </span>
                            <input type="range" min="{{$job->minSalaryRange}}"  style="width:100%"
                                    max = "{{$job->maxSalaryRange}}" value = "{{$job->Salary}}" disabled>
                           
                        </div>
                </div>
                <h3 id="companyDetails">Company Overview</h3>
                <div class="row center">
                    <span class="btn btn-danger">No Data was added About This Company</span>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
</script>
@include('front.layouts.foot')