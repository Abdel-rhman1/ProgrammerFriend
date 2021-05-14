@foreach ($courses as $course)  
            <div class='col-sm-4'>
                <div class='allProject'>
                <div class='caption'>
                   
                    <div class='inner'>
                        <img src="{{asset('images/courses/'.$course->Cphoto)}}" width="200px" height="200px">
                    </div>
                </a>
                </div>
                    <div class='head'>
                        <a  class="float" href='{{route('showCourse' , $course->CID)}}'>
                            <p data-toggle="tooltip" data-placement="bottom" title="{{$course->CName}}">{{$course->CName}}</p>
                        </a>
                        <a class="text-center"href='{{route('Profile' , $course->MID)}}'>
                            <p data-toggle="tooltip" data-placement="bottom" title="{{$course->MName}}">{{$course->MName}}</p>
                        </a>
                    </div>
            </div>
        </div>
        @endforeach