@include("backend.layouts.header")
@section('name')
    Update New Items
@stop
@include('backend.layouts.navbar')
<div class='container'>
    <div class="card" style="margin:10%">
        <div class="card-header">Edit Items</div>
        <div class="card-body">
            @if(Session::has('Inserted'))
                <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
                    {{Session::get('Inserted')}}
                </div>
            @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
                        {{Session::get('error')}}
                    </div>
                @endif
            <form action="{{route('item.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text" name="ID" value="{{$items->ID}}" hidden>
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="NameInput">
                        Name
                    </label>
                    <input type="text" name="Name" value ='{{$items->Name}}' id="NameInput" class="form-control col-sm-8" placeholder="Type Your Name">
                </div>
                @error('Name')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="URlInput">
                        URl
                    </label>
                    <input type="url" name="Url" value="{{$items->rul}}" id="URlInput" class="form-control col-sm-8" placeholder="Type Your Url">
                </div>
                @error('Url')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="contributeInput">
                        contributes
                    </label>
                    <input type="text" value="{{$items->contributes}}" name="contribute" id="contributeInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('contribute')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="detailsInput">
                        details
                    </label>
                    <input type="text" name="details" value="{{$items->details}}" id="detailsInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('details')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="StartInput">
                        Start Time
                    </label>
                    <input type="date" name="startTime" value="{{$items->start_time}}" id="StartInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('startTime')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror

                <div class='from-group row'>
                    <label class='col-sm-2 control-label' for='SkillInput'>Skills</label>
                    <input type="text" id='SkillInput' name='Skill' class='col-sm-8 form-control'>
                </div>
                <input type="text" hidden id="last" value="" name='skills'>
                @error('skills')
                    {{$message}}
                @enderror
                <div class='row from-group' id='putSearch' style="margin-top:10px;margin-bottom:10px">
                    <select class='form-control offset-sm-2 col-sm-8' id='content' style='margin-top:10px'>
                        
                    </select>
                </div>
                <div class='form-group row'>
                    <div class='offset-sm-2 col-sm-8' id='Skills'>

                    </div>
                </div>


                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="EndInput">
                        End Time
                    </label>
                    <input type="date" name="EndTime"  value="{{$items->end_time}}" id="EndInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('EndTime')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group form-control-lgr-m">
                    <input type='submit' value="Save" class="form-control-lg btn btn-sm col-sm-2 offset-sm-2 btn btn-success">
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
