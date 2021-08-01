@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container' style="margin-top:50px ; margin-bottom:100px">
    <div class="row">
        <div class='col-sm-3'>
            <div class="box">
                <label for="KeyWord">
                    Key words
                </label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-md" name="KeyWord" id="KeyWord">
                </div>
            </div> 
            <div class="box">
                <label for="KeyWord">
                    Used Skills
                </label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-md" name="skills" id="skills">
                </div>
                    <div class="allSkills">
                       
                        @foreach ($skills as $skill)
                            <a  href="{{route('getById' , [$ID , $skill->Name])}}">{{$skill->Name}}</a>
                        @endforeach
                    </div>
                <input type="text" id="last" name='last' hidden>
            </div>
            <div class="box">
                <label for="KeyWord">
                    IN
                </label>
                <div class="form-group">
                   <select class="form-control form-control-md" onchange="location = this.value;">
                       <option value="{{route('getBasedOnDate' , ['W' ,$ID])}}">
                            This Week
                       </option>
                       <option class="M" value="{{route('getBasedOnDate' , ['M'])}}">
                           This Month
                       </option>
                       <option value="{{route('getBasedOnDate' , ['3M'])}}">
                           Last 3 Months
                       </option>
                       <option value="{{route('getBasedOnDate' , ['Y'])}}">
                           Last year
                       </option>
                       <option value="{{route('getBasedOnDate' , ['All'])}}">
                           All Work
                       </option>
                   </select>
                </div>
            </div>
            <div>
                <a href="{{route('addNewItem')}}" class="btn btn-success">
                    <i class="fa fa-plus" aria-hidden="true"></i>
                    Add New Project
                </a>
            </div>
        </div>
        <div class="col-sm-9" id="contentItems">
        <livewire:items/>

    
        
    </div>
    </div>
</div>
</div>
<script>
    $(function(){
        //KeyWord
        $('#KeyWord').keyup(function(){
            $.ajax({
                type : 'post',
                url : "{{route('ShowItemByName')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'Name' : $("input[name='KeyWord']").val(),
                },
                success:function(one ,two , three){
                    $('#contentItems').html(one);
                },
                error:function(one , two){
                    console.log(one);
                },
            });
        });
    });
</script>
@include('front.layouts.foot')