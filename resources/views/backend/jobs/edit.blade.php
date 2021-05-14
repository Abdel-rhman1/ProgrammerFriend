@include("backend.layouts.header")
@section('title')
    New Job
@stop
@include('backend.layouts.navbar')
<div class="container">
    <div class="card" style="margin:10%">
        <div class="card-header">Add New Job</div>
        <div class="card-body">
            @if(Session::has('Updated'))
                <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
                    {{Session::get('Updated')}}
                </div>
            @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
                        {{Session::get('error')}}
                    </div>
                @endif
            <form action="{{route('job.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" value="{{$job->ID}}" name="ID" hidden> 
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="NameInput">
                        Name
                    </label>
                    <input type="text" value="{{$job->Name}}" name="Name" id="NameInput" class="form-control col-sm-8" placeholder="Type Your Name">
                </div>
                @error('Name')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="DescInput">
                        description
                    </label>
                    <input type="text" value="{{$job->description}}" name="Description" id="DescInput" class="form-control col-sm-8" placeholder="Type Your Description">
                </div>
                @error('Description')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                    </div>
                @enderror
                <div class='from-group row'>
                    <label class='col-sm-2 control-label' for='SkillInput'>Skills</label>
                    <input type="text"  id='SkillInput' name='Skill' class='col-sm-8 form-control'>
                </div>
                <input type="text" hidden id="last"  value="{{$job->skills}}" name='skills'>
                @error('skills')
                    {{$message}}
                @enderror
                <div class='row from-group' id='putSearch' style="margin-top:10px;margin-bottom:10px">
                    <select class='form-control offset-sm-2 col-sm-8' id='content' style='margin-top:10px'>
                        
                    </select>
                </div>
                <div class='form-group row'>
                    <div class='offset-sm-2 col-sm-8' id='Skills'>
                        <?php 
                            $skills = explode('_' , $job->skills);
                        ?>
                        @foreach ($skills as $skill)
                            <span class="badge badge-pill badge-success badge-lg">{{$skill}}</span>
                        @endforeach
                    </div>
                </div>   
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2"  for="emailInput">
                        Posteremail
                    </label>
                    <input type="email" name="email" value="{{$job->Posteremail}}" id="emailInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('email')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="InValidUpTo">
                        InValidUpTo
                    </label>
                    <input type="date" name="Date" value="{{$job->InValidUpTo}}" id="InValidUpTo" class="form-control col-sm-8" placeholder="Type Job InValidUpTo">
                </div>
                @error('Date')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-control-lgr-m">
                    <input type='submit' value="Update" class="form-control-lg btn btn-sm col-sm-2 offset-sm-2 btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@include('backend.layouts.footer')
<script>
    $(function(){
        var Skills = [];
        $('#content').change(function(){
            var oldValue = $('#last').val();
            $('#last').val(oldValue+$(this).val()+'_');
            Skills.push($(this).val());
            $('#Skills').append("<span class='badge badge-primary btn btn-sm skillsbadge'>"+$(this).val()+"</span>")
            $(this).find('[value='+$(this).val()+']').remove();
        });
        $('#SkillInput').keyup(function(){
            var SerachKeyword = $(this).val();
            //if(empty(SerachKeyword)) $('#putSearch #content option').remove();
            $.ajax({
                method:'post',
                url : "{{route('getSuffix')}}",
                data:{
                    '_token' : "{{csrf_token()}}",
                    'ID' : $("input[name='Skill']").val(),
                },
                success:function(one , tow , three){     
                    if(one===null) console.log(empty);
                    else console.log(one);
                    console.log(tow);
                    console.log(one.length)
                    $('#putSearch #content option').remove();
                    $('#putSearch #content').append("<option id='...' class='skillone' value='...'></option>");
                    for(var i=0;i<one.length;i++){
                        if(!Skills.includes(one[i].Name)){
                            $('#putSearch #content').append("<option id="+one[i].Name+" class='skillone' value="+one[i].Name+">"+one[i].Name+"</option>");
                        }
                    }
                },
                error:function(one , tow){             
                    console.log('Error');
                },
            });
        });
    });
</script>