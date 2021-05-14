@include('front.index')
@section('title')
    Profile
@endsection
    <div class="memberhead2">
        <div class='text-center profileInfo' > 
            <img src="{{asset('images/default.png')}}" height="200" width="200">
            <p>{{$member->Name}}</p>
            <div>
                <span class='inde'>
                    <i></i>
                    Freelancer
                </span>
                <span class='inde'>
                    <i></i>
                    {{$member->JobName}}
                </span>
                <span class='inde'>
                    <i></i>
                    {{$member->CName}}
                </span>
            </div>
            <div class="memberInfofooter row">
                <div class="col-sm-2 othertabs">
                    <i></i>
                    <p class="sectionhead" id="PersonalInfohead"><i></i>Personal Info<p>
                </div>
                <div class="col-sm-2 othertabs">
                    <i></i>
                    <p class="sectionhead" id="WorksHead"><i></i>Works Mall</p>
                </div>
                <div class="col-sm-2 othertabs">
                    <i></i>
                    <p class="sectionhead" id="Notice"><i>Notices</i></p>
                </div>
            </div>
        </div>
    </div>
    <div class="container" style="margin-top:30px">
        <div class="row PersonalInfo">
        <div class="col-sm-8">
        <div class="About_Youclass">
            <h6>OverView</h6>
            <hr class="custom-hr">
            <p>{{$member->about_You}}</p>
        </div>
        <div class="About_Youclass">
            <h6>My Skills</h6>
            <hr class="custom-hr">
            @foreach ($skills as $skill)
                <h4 style="display: inline"><span class="badge badge-primary">{{$skill->Name}}</span></h4>
            @endforeach
        </div>
    </div>
    <div class="col-sm-4">
        <div class="stat">
            <h3>statistics</h3>
            <div class="statdivs">
                <div> 
                    <span>Evalutions</span> <span>0.0</span>
                </div>
                <div>
                    <span>Project completion rate  </span><h5 class="" style="display: inline"><span class="badge badge-primary">Not calculated yet</span></h5>
                </div>
                <div>
                    <span>Re-employment rate  </span><h5 class="" style="display: inline"><span class="badge badge-primary">Not calculated yet</span></h5>
                </div>
                <div>
                    <span>On-time delivery rate  </span><h5 class="" style="display: inline"><span class="badge badge-primary">Not calculated yet</span></h5>
                </div>
                <div>
                    <span>Average response speed  </span><h5 class="" style="display: inline"><span class="badge badge-primary">Not calculated yet</span></h5>
                </div>
                <hr class="custom-hr">
                <div>
                <span> date of registration  </span><h5 class="" style="display: inline"><span class="badge badge-primary">Not calculated yet</span></h5>
                </div>
                <div>
                    <span> Last occurrence  </span><h5 class="" style="display: inline"><span class="badge badge-primary">Not calculated yet</span></h5>
                </div>
            </div>
        </div>
        <div class="stat">
            <h3>Documentation</h3>
            <div>
                <span>Email :  true</span>
                <span>Phone Number : true</span>
                <span>Personal Idenitefy : true</span>
            </div>
        </div>
    </div>
</div>
<div id="WorksContent">
     <div class="row">
        
            @foreach ($Works as $Work)

                    <div class='col-sm-3'>
                        <div class='allProject'>
                        <div class='caption'>
                            <a class='' href="{{route('showProject' , $Work->ID)}}">
                            <div class='inner'>
                                <img src="{{asset('images/Items/'.$Work->photo)}}" width="200px" height="200px">
                            </div>
                        </a>
                        </div>
                            <div class='head'>
                                <a href='{{route('showProject' , $Work->ID)}}'>
                                    <p data-toggle="tooltip" data-placement="bottom" title="{{$Work->Name}}">{{$Work->Name}}</p>
                                </a>
                            </div>
                    </div>
                </div>
            @endforeach
        </div>
     </div>
     <div id="Noticedetails">
        
     </div>
</div>
<script>
    $(function(){
        var activeNow ;
        $('.sectionhead').click(function(){
            $('.othertabs').css('backgroundColor' , '#fff');
            $(this).parent().css('backgroundColor' , '#f0f0f0');
            activeNow = $(this).parent();
        });
        $('.sectionhead').mousemove(function(){
            $(this).parent().css('backgroundColor' , '#f0f0f0');
        });
        $('.sectionhead').mouseout(function(){
            $(this).parent().css('backgroundColor' , '#fff');
            activeNow.css('backgroundColor' , '#f0f0f0');
        });
        $('#PersonalInfohead').click(function(){
            
            $('#WorksContent').hide();
            $('.PersonalInfo').show();
        });
        $('#WorksHead').click(function(){
            $('.PersonalInfo').hide();
            $('#WorksContent').show();
        });
        $('#PersonalInfohead').parent().css('backgroundColor' , '#f0f0f0');
        $('#WorksContent').hide();
        $('#WorksContent').hide();
       
    });
</script>