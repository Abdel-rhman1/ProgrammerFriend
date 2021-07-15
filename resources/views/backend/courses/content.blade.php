@include("backend.layouts.header")
@section('title')
    {{__('backend.allcourse')}}
@stop
@include('backend.layouts.navbar')
<div class="container" style="margin-top:50px">
<div class="row">
    <div class="col-sm-4" id="content">
        @if ($Contents->count()==0)
            <p class="alert alert-success">No Content To Show</p>
        
            @else
                @foreach ($Contents as $Content)
                    <div>
                        $myArray = ;
                        title
                        @if (explode('.', $Content->title)[1]=='mp3')
                        <audio controls>
                            <source src="{{asset('docs/'.$Content->title)}}" type="audio/ogg">
                            <source src="{{asset('docs/'.$Content->title)}}" type="audio/mpeg">
                            Your browser does not support the audio element.
                          </audio>
                        @endif
                        @if (explode('.', $Content->title)[1]=='mp4')
                        <video width="320" height="240" controls>
                            <source src="{{asset('docs/'.$Content->title)}}" type="video/mp4">
                            <source src="{{asset('docs/'.$Content->title)}}" type="video/ogg">
                          Your browser does not support the video tag.
                          </video>
                        @else
                            
                        @endif
                        
                    </div>
                @endforeach
            
        @endif

        <a href="{{url('ajax-file-upload-progress-bar')}}">
            <span class="btn btn-success">
                Add New Content
            </span>
        </a>
    </div>
    <div class="col-sm-4" id="course-details">
        Course-details
    </div>
    <div class="col-sm-4" id="points">
        Points (Take opinion)
    </div>
</div>
</div>
@include('backend.layouts.footer')