@include('front.index')
@section('title')
    Home Page
@endsection
<div class="cars">
    @include('front.layouts.cars')
</div>
<div class="container">
    <section class="Ser">
        <h1 class='text-center'>Our Services</h1>
        <div class="row">
            <div class='col-sm-3'> 
                <img src='{{asset('images/project.jpg')}}' width="200" height="200">
                <p class='text-center'>Show Program Projects</p>
            </div>
            <div class="col-sm-3">
            
                <img src='{{asset('images/Profile.jpeg')}}' width="200" height="200">
                <p>Show Program Profiles</p>
            </div>
            <div class="col-sm-3">

                <img src='{{asset('images/courses.jpeg')}}' width="200" height="200">
                <p>Show Programmer courses</p>
            </div>
            <div class="col-sm-3">
                <img src='{{asset('images/hiring.jpeg')}}' width="200" height="200">
                <p>Hiring Programmers </p>
            </div>
        </div>
    </section>
    <section class="benefit">
        <h1 class="text-center">Joining Us Benefits</h1>
        <div class="row">
            <div class="col-sm-3">Communictaion</div>
            <div class="col-sm-3">Projects</div>
            <div class="col-sm-3">grow skills</div>
            <div class="col-sm-3">get A job</div>
        </div>
    </section>
    <section class="benefit">
        <h1 class="text-center">Our Big Client</h1>
        <div class="row">
            <div class="col-sm-3">Google</div>
            <div class="col-sm-3">Facebook</div>
            <div class="col-sm-3">Linked In</div>
            <div class="col-sm-3">Yahoo</div>
        </div>
    </section>
    <section class="benefit">
        <h1 class="text-center">Our Stat</h1>
        <div class="row">
            <div class="col-sm-3">Registered User</div>
            <script>
                
                for(var i =0 ;i<100;i++){
                    //sleep(300);
                    console.log(i);
                }
            </script>
            <div class="col-sm-3">Projects</div>
            <div class="col-sm-3">grow skills</div>
            <div class="col-sm-3">get A job</div>
        </div>
    </section>
</div>
@include('front.layouts.foot')