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
        <livewire:posts/>
       
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
                    'fisrt' : $("input[name='SearchName']").val(),
                },
                success:function(one , two , three){
                    console.log(one);
                    $('#DivAllJobs').html(one);
                },
                error:function(one , two){
                    console.log(one);
                    alert("error");
                }
            });
        });
    });
</script>
@include('front.layouts.foot')