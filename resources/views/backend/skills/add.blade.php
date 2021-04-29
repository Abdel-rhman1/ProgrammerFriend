@include('front.index')
@section('title')
    Add New Skills
@endsection
<div class='container'>
<div class='card'>
    <div class='card-header'>Mew Skills</div>
        <div class='card-body'>
            <form action={{route('soteSkill')}} method='POST' enctype="multipart/form-data">
                @csrf
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='NameInput'>Name</label>
                    <input type="text" name='Name' class='form-control col-sm-8' placeholder="Type Skill Name(HTML)" id="NameInput">  
                </div>
                @error('Name')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='ImportInput'>Important #</label>
                    <input type="number" max="5" min="0" name='Import' class='form-control col-sm-8' placeholder="Type Skill Important level" id="ImportInput">  
                </div>
                @error('Import')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='CatInput'>Category</label>
                    <select class='form-control col-sm-8' id='CatInput' name='Cat'>
                        @foreach ($Cats as $cat)
                            <option value='{{$cat->Name}}'>{{$cat->Name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('Cat')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class='from-group row'>
                    <label class='col-sm-2 control-label' for='SkillInput'>Skills</label>
                    <input type="text" id='SkillInput' name='Skill' class='col-sm-8 form-control'>
                </div>
                <div class='row from-group' id='putSearch' style="margin-top:20px">
                    <select class='form-control offset-sm-2 col-sm-8' id='content'>
                        
                    </select>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    $(function(){
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
                    for(var i=0;i<one.length;i++){
                        $('#putSearch #content').append("<option class='' value=" +one[i].Name+">"+one[i].Name+"</option>");
                    }
                },
                error:function(one , tow){             
                    console.log('Error');
                },
            });
            
            
        });
    });
</script>