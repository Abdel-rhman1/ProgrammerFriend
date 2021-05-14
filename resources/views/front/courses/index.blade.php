@include('front.index')
@section('title')
    All Courses
@endsection
<div class="container row" style="margin-top: 50px ; margin-bottom:50px">
        <div class=" filterOption col-sm-3">
            <h5 class="">Search About Course</h5>
            <div class="form-group">
                <input type="text" class="form-control" name="Name" id="Name">
           </div>
           
           <div>
                <p>Depatment</p>
                @foreach ($departs as $Cat)
                    <a style="display:block;margin-right:4px"><input type="checkbox" name="depart" class="chechBox"  value="{{$Cat->ID}}">{{$Cat->Name}}</a> 
                @endforeach
            </div>

            <div>
                <label for="price">Choose a maximum house price: </label>
                <input type="range" name="price"  name = "price"id="price" min="0" max="1000" step="5" value="0" style="width:80%">
                <output class="price-output" for="price" >0</output>
            </div>
            <div>
                <label for="SkillOption">Skills</label>
                <select class="form-control" id="SkillOption">
                    
                </select>
            </div>
        </div>
        <div class='col-sm-9 row' id="Content">
            @foreach ($courses as $course)  
            <div class='col-sm-4'>
                <div class='allProject'>
                <div class='caption'>
                   
                    <div class='inner'>
                        <img src="{{asset('images/courses/'.$course->Cphoto)}}" width="200px" height="200px">
                    </div>
                </a>
                </div>
                    <div class='head'>
                        <a  class="float" href='{{route('showCourse' , $course->CID)}}'>
                            <p data-toggle="tooltip" data-placement="bottom" title="{{$course->CName}}">{{$course->CName}}</p>
                        </a>
                        <a class="text-center"href='{{route('Profile' , $course->MID)}}'>
                            <p data-toggle="tooltip" data-placement="bottom" title="{{$course->MName}}">{{$course->MName}}</p>
                        </a>
                    </div>
            </div>
        </div>
        @endforeach
        
        @if (count($courses) == 0)
        <div class="ThereNomatches alert alert-danger text-center col-sm-9" style="height:50px">
            <span>
                There No Results mathes Your Searches
            </span>
      </div>
@endif
        </div>
    </div>
<script>
    
    $(function(){

        $('#Name').keyup(function(){
        var Name = $(this).val();
        $.ajax({
            type : 'post',
            url  : "{{route('showByName')}}",
            data : {
                '_token' : "{{csrf_token()}}",
                'Name' : $(this).val(),
            },
            success:function(one , two ,three){
                $('#Content').html(one);
            },
            error:function(one , two){
                console.log("Error");
            },
    });
        });


        $('.chechBox').change(function(){
            $.ajax({
                type : 'post',
                url  : "{{route('showByCat')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'depart' : $(this).val(),
                },
                success:function(one , two ,three){
                    $('#Content').html(one);
                },
                error:function(one , two){
                    console.log("Error");
                },
            });

        });
       $.ajax({
            type : 'post',
            url : "{{route('getSkillscollection')}}",
            data : {
                '_token' : "{{csrf_token()}}",
               // '_token' : '{{csrf_token()}}',
            },
            success:function(one ,two,three){
                for(var i =0 ;i<one.length ; i++ ){
                    $('#SkillOption').append("<option value="+ one[i].ID +">"+one[i].Name+"</option>")
                }
            },  
            error:function(one , two){
                console.log("Hello");
            },
       });
        $('#price').change(function(){
            $('.price-output').text($(this).val());
            $.ajax({
                type : 'post',
                url  : "{{route('showByprice')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'price' : $("input[name='price']").val(),
                },
                success:function(one , two ,three){
                    $('#Content').html(one);
                },
                error:function(one , two){
                    console.log("Error");
                },
            });
        });
    });
</script>
@include('front.layouts.foot')