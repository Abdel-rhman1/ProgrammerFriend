@include('front.index')
@section('title')
    All Jobs
@endsection
<div class="container" style="margin-top:50px;">

    <div class="centerDiv">
        <h3 class="text-center">
            Search for your next job
        </h3>
        <form method="post" action="" enctype="">
        <div class="row">
        <div class="col-sm-5">
            <div class="from-group">
                <input type="search" class="form-control form-control-lg" placeholder="Search By title , skill or Company" name="SearchName" id="Name">
                
            </div>
        </div>
        <div class="col-sm-5">
            <div class="from-group">
                <input type="search" class="form-control form-control-lg" placeholder="Search City state , or Zip code" name="SearchCity" id="City">
                
            </div>
        </div>
        <div class="col-sm-2">
            <input type="submit" value="Search" class="btn btn-success form-control form-control-lg" id="SearchJob"> 
        </div>
    </div>
        </form>
        
    </div>
    <div class="DivAllJobs" id="DivAllJobs">
        <p>Recommended For You</p>
        @if (count($jobs) == 0)
            <div class="alert alert-danger text-center">
                <span>
                    There No Job Matches You Searches
                </span>
            </div>
        @else
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
                    <p class="float-right">Easy To apply</p>
                </div>
            </div>
        @endforeach
        </div>
        @endif
    </div>
</div>
<script>
    $(function(){
        $('#Name').keyup(function(){
            //alert($(this).val());
            $.ajax({
                type : 'post',
                url : "{{route('SearchByFirst')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'fisrt' : $(this).val(),
                },
                success:function(one , two , three){
                    $('#DivAllJobs').html(one);
                },
                error:function(one , two){
                    alert(one);
                }
            });
        });
    });
</script>
@include('front.layouts.foot')