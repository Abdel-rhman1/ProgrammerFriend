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
        <span class="float-right Employee btn btn-success">Employee My</span>
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