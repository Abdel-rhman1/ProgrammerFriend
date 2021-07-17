@include('front.index')
@section('title')
    All Programmers
@endsection
<div class='container member'>
    <div class="row">
    <div class="filterOption col-sm-3">
        <h5>Seach About Member</h5>
        <div class="form-group">
            <input type="search" name="Name" id="Name" class="form-control">
        </div>
        <div>
            <p>Depatment</p>
            @foreach ($Cats as $Cat)
                <a href="{{route('BasedOnRole' , $Cat->ID)}}" style="display:block"><input type="checkbox" name="" value="{{$Cat->Name}}">{{$Cat->Name}}</a> 
            @endforeach
        </div>
        <div class="form-group">
            <label for="jobName">Job Name</label>
            <input type="search" name="jobName" id="jobName" class="form-control">
        </div>
        <div class="form-group">
            <label for="Skills">Skills</label>
            <select id="Skills" name="Skills"class="form-control" onchange="location= this.value;" >
                @foreach ($skills as $skill)
                    <option value="{{route('getBasedOnSkill' , $skill->ID)}}" class="">{{$skill->Name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="country">Country</label>
            <select id="country" name="country"class="form-control" onchange="location= this.value;" >
                @foreach ($Countries as $Country)
                    <option value="{{route('getbyCountry' , $Country->ID)}}" class="">{{$Country->Name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-sm-9 row" id="contentMember">
    @if (count($Members) == 0)
        <div class="alert alert-danger text-center col-sm-12" style="height:50px">
            <span>There Is No Members natches your Search</span>
        </div>
    @else
    <?php
         $NumItems  = count($Members);
         $i = 0;
    ?>
    <div class="OuterLayout col-sm-12">
    @foreach ($Members as $member)
    <div class="MemberLayout">
        <div class="MemberImage">
            <img src="{{asset('images/Members/'.$member->photo)}}">
        </div>
        <div style="display: inline-block">
            <div class="MemberHead">
                <h4><a href="{{route('Profile' , $member->ID)}}">{{$member->Name}}</a></h4>
            </div>
            <div class="MemberRole">
                <span class="RoleJob">{{$member->Jobname}}</span>
            </div>
        </div>
        
        @if (Auth::user()->id !=$member->ID)
            <span class="float-right Employee btn btn-success">Employee My</span>
        @endif
        
        <div class="Brief">
            {{$member->about_You}}
        </div>
    </div>
    @if(++$i != $NumItems)
        <hr classs="custom-hr">
    @endif
    @endforeach
</div>
</div>
@endif
</div>
</div>
<script>
    
    $(function(){
        $('#Name').keyup(function(){
            $.ajax({
                type : 'post',
                url : "{{route('ShowMemberByName')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'Name' : $("input[name='Name']").val(),
                },
                success:function(one ,two , three){
                   $('#contentMember').html(one);
                   //console.log(one);
                },
                error:function(one , two){
                    console.log(one);
                },
            });
        });

        $('#jobName').keyup(function(){
            $.ajax({
                type : 'post',
                url : "{{route('ShowMemberByjob')}}",
                data : {
                    '_token' : "{{csrf_token()}}",
                    'jobName' : $("input[name='jobName']").val(),
                },
                success:function(one ,two , three){
                   $('#contentMember').html(one);
                   //console.log(one);
                },
                error:function(one , two){
                    console.log(one);
                },
            });
        });

    });
</script>
@include('front.layouts.foot')