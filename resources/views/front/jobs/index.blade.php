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
        <div class="col-md-5 col-sm-12">
            <div class="form-group">
                <input type="search" class="form-control form-control-lg" placeholder="Search By title , skill or Company" name="SearchName" id="Name">
                
            </div>
        </div>
        
        <div class="col-md-5 col-sm-12">
            <div class="form-group">
                <input type="search" class="form-control form-control-lg" placeholder="Search City state , or Zip code" name="SearchCity" id="City">
                
            </div>
        </div>
        <div class="col-md-2">
            <input type="submit" value="Search" class="btn btn-success form-control form-control-lg" id="SearchJob"> 
        </div>
    </div>

    <div class="row">
        <div class="col-sm-5">
            <div class="form-group">
                <div class="Auto-Complete form-control">
                    <span style="float:right" class="autoexit">X</span>
                </div>
            </div>
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
     function sayHello(){
            $('#').val($(this).text())
        }
    $(function(){
        
        $('.Auto-Complete').hide();
       
        $('.autoexit').click(function(){
            $('.Auto-Complete').hide();
        });
        
       
        $('#Name').keyup(function(){
            //alert($(this).val());
            $('.Auto-Complete').show();
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

            $.ajax({
                type : 'post',
                url : "{{route('SearchByFirst2')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'fisrt' : $("input[name='SearchName']").val(),
                },
                success:function(one , two , three){
                    console.log(one);
                    $('.Auto-Complete p').remove();
                    $('.Auto-Complete br').remove();
                    for(let i=0;i<one.length;i++){
                        $('.Auto-Complete').append("<p class='jobname1 bg-primary text-center'>" + one[i].Name +"</p>")
                    }
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