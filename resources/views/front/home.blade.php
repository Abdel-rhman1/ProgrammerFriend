@include('front.index')
@section('title')
    Home Page
@endsection
<div class="cars">
    @include('front.layouts.cars')
</div>

<div class="outerBox">
    <h1 class='text-center' style="margin-top:0px">Our Services</h1>
</div>
<div class="container">
    <div class="Our-services">
    
        <div class="container">
          <div class="Our-services-Head">
              <div class="row">
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="Active2 Service text-center" id="projectManagment">
                      <p >Projects Management</p>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="Service text-center" id="BusinessAnalysis">
                      <p>Business Analysis</p>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="Service text-center " id="ManagementSkill">
                      <p>Management Skills</p>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="Service text-center " id="Custmized">
                    <p>Communication</p>
                  </div>
                  </div>
              </div>
          </div>
          <div class="Our-services-Body projectManagmentContent text-center">
            <span class="alert alert-danger">This Data IS Not Avilable Now</span>
              <div class="row" hidden>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <p>
                    Your organization work usually lasts for MORE than planned?
                    Your projects usually end up in a need for EXTRA COST than budgeted?
                    Your Teams used to produce results of LESS QUALITY than agreed upon?
                  </p>
                  <p>
                    Applying Management will help organization meet its strategic goals in
                    a clearer way and will boost your teams efficiency.
                  </p>
                  <p>
                    Project Management will help your organization meet its solution for
                    your organization challenges
                  </p>
                  <p>
                    Project Management is not only for  construction Management and IT specialists
                    it is a methodology that all Businesses can apply and benefit from
                  </p>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <h3 class="ServiceHeading">Our list of PM courses Include:</h3>
                  <div class="row">
                  <div class="col-sm-6 col-xs-6">
      
                  <ul type="none">
                    <li>
                      <i class="fa fa-play"  aria-hidden="true"></i>
                      Project Management Fundamentals
                    </li>
      
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      Project Management in Practice
                    </li>
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      PM Certificates Preparation
                    </li>
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      Project Management for Executives
                    </li>
                  </ul>
                </div>
                <div class="col-sm-6 col-xs-6">
                  <ul type="none">
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      Scheduling Techniques
                    </li>
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      Risk Management Fundamentals
                    </li>
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      Managing programs
                    </li>
      
                    <li>
                      <i class="fa fa-play" aria-hidden="true"></i>
                      Setting Up PMO
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="Our-services-Body BusinessAnalysisContent text-center hiddenclass">
          <span class="alert alert-danger">This Data IS not Avilable Now</span>
      </div>
      
      <div class="Our-services-Body ManagementSkillContent text-center hiddenclass">
          <span class="alert alert-danger">This Data IS not Avilable Now</span>
      </div>
      <div class="Our-services-Body CustmizedContent text-center hiddenclass">
          <span class="alert alert-danger">This Data IS not Avilable Now</span>
      </div>
      </div>
      </div>
    

    <h1 class="text-center">
        The Last Projects
    </h1>
    <div id="carouselExampleControl" class="carousel slide" data-interval="false">
        <div class="carousel-inner">
            <?php  
                $F = 0;
                $S = 0;
                $T = 0;
                ?>
          <div class="carousel-item active">
                <div class="row">
                    @while ($F++ < 4)
                        <div class="col-sm-3" style="cursor: pointer">
                            <div class="text-center">
                                @if($Items[$F]->Name != null)
                                    <img src="{{asset('images/Items/'.$Items[$F]->photo)}}" width="200" height="100" style="border-radius:50% ; height:200px !important"> 
                                   <p>{{$Items[$F]->Name}}</p>
                                @endif
                            </div>
                        </div>
                    @endwhile
                </div>
          </div>
          <div class="carousel-item">
            <div class="row">
                @while ($S++ < 4)
                <div class="col-sm-3">
                    <div class="col-sm-3" style="cursor: pointer">
                        <div class="text-center">
                            @if($Items[$S+4]->Name != null)
                                <img src="{{asset('images/Items/'.$Items[$S+4]->photo)}}" width="200" height="100" style="border-radius:50% ; height:200px !important"> 
                               <p>{{$Items[$S+4]->Name}}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endwhile
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControl" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControl" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>


    
      
    
      
    
    

</div>
@include('front.layouts.foot')

<script>
    var flage = true;
    function Inter(limit){
        $('#RegistedRight').text(limit);
    }
    function Inter2(limit){
        $('#CompleteProjects').text(limit);
    }
    function Inter3(limit){
        $('#SharedJobs').text(limit);
    }
    function Inter4(limit){
        $('#sharedCourse').text(limit);
    }
    $(window).scroll(function(){
        if($(window).scrollTop() > 800 && flage){
            var limit =$('#RegistedRight').text() ;
            var i = 1;
            
            setInterval(function(){
                if(i<=limit){
                    Inter(i++);
                }
            } , 150);
           
            var limit2 =$('#CompleteProjects').text() ;
            var i2 = 1;
            setInterval(function(){
                if(i2<=limit2){
                    Inter2(i2++);
                }
            } , 150);
            var limit3 =$('#SharedJobs').text() ;
            var i3 = 1;
            setInterval(function(){
                if(i3<=limit3){
                    Inter3(i3++);
                }
            } , 150);
            var limit4 =$('#SharedJobs').text() ;
            var i4 = 1;
            setInterval(function(){
                if(i4<=limit4){
                    Inter4(i4++);
                }
            } , 150);
            flage = false;
        }
    });
</script>