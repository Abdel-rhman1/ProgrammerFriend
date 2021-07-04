@include('front.index')
@section('title')
    Home Page
@endsection
<div class="cars">
    @include('front.layouts.cars')
</div>
<div class="container">
    <section class="Ser">
        <h1 class='text-center' style="margin-top:30px">Our Services</h1>
        <div class="row">
            <div class='col-sm-3'> 
                <img src='{{asset('images/project.jpg')}}' width="200" height="200" style="border-radius:50%">
                <p class='text-center' style="color:#888 ; font-size:140%">Show Program Projects</p>
            </div>
            <div class="col-sm-3">
            
                <img src='{{asset('images/Profile.jpeg')}}' width="200" height="200" style="border-radius:50%">
                <p style="color:#888 ; font-size:140%">Show Program Profiles</p>
            </div>
            <div class="col-sm-3">

                <img src='{{asset('images/courses.jpeg')}}' width="200" height="200" style="border-radius:50%">
                <p style="color:#888 ; font-size:140%">Show Programmer courses</p>
            </div>
            <div class="col-sm-3">
                <img src='{{asset('images/hiring.jpeg')}}' width="200" height="200" style="border-radius:50%">
                <p style="color:#888 ; font-size:140%">Hiring Programmers </p>
            </div>
        </div>
    </section>
    

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


    
      <h1 class="text-center">
        The Last Jobs
    </h1>
    <div id="carouselExampleControl2" class="carousel slide"  data-interval="false">
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
                                @if($jobs[$F]!= null)
                                  <div>
                                        <p>{{$jobs[$F]->Name}}</p>
                                  </div>
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
                            @if($jobs[$S+4] != null)
                                <div>
                                    <p>{{$jobs[$S+4]->Name}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endwhile
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControl2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControl2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>

    
    
      <h1 class="text-center">
        The Last Courses
    </h1>
    <div id="carouselExampleControl2" class="carousel slide"  data-interval="false">
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
                                @if($courses[$F]!= null)
                                  <div>
                                        <p>{{$courses[$F]->Name}}</p>
                                  </div>
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
                            @if($courses[$S+4] != null)
                                <div>
                                    <p>{{$courses[$S+4]->Name}}</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endwhile
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControl2" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleControl2" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    
    
    <section class="benefit">
        <h1 class="text-center">Our Stat</h1>
        <div class="row">
            <div class="col-sm-3">
                <p>Registered User</p>
                <p id="RegistedRight">{{$memberCount}}</p>
            </div>
            
            <div class="col-sm-3">
                <p>Projects</p>
                <p id="CompleteProjects">{{$ProjectCount}}</p>
            </div>
            <div class="col-sm-3">
                <p>Jobs</p>
                <p id="SharedJobs" style="color:red ; font-size:120%">
                    {{$JobsCount}}
                </p>
            </div>
            <div class="col-sm-3">
                <p>
                    Shared Course
                </p>
                <p id="sharedCourse">
                    {{$coursesNumber}}
                </p>
            </div>
        </div>
    </section>
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