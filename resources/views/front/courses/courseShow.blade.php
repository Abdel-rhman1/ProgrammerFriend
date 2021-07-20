@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container'>
    <div class="row" style='margin-top:100px'>
        <div class="CourseName float-left col-sm-3">
            <h1 style="font-weight:bold">{{$course[0]->CName}}</h1>
        </div>
        <div class="col-sm-4">
            <span style="line-height: 2;">offered By<span> 
            <h4 style="font-weight: bold ; margin-top:4px;color:#8d2220">{{$course[0]->MName}}</h4>
        </div>
       <div class="col-sm-5">
            <div class="card">
                <div class="card-header">{{$course[0]->CName}} Content</div>
                <div class="card-body">
                    @php
                        $i = 0;
                    @endphp
                    @foreach ($contents as $content)
                    
                    <div class="row">
                     @if ($i!=$content->lessonNum)
                        <hr class="col-sm-3">
                            <span class="col-sm-3">Lesson {{$content->lessonNum}}</span>
                        <hr class="col-sm-3"> 
                     @php $i = $content->lessonNum; @endphp
                    @else
                        <span style="display: block;margin-bottom:10px"></span>
                        @php $i = $content->lessonNum; @endphp
                    @endif
                   
                    </div>
                    <div class="row">
                               
                        <a class="col-sm-8" href="{{asset('docs/' . $content->title)}}" target="_blank" width="100%">
                            <span class="btn btn-primary">
                                {{$content->type}} 
                            </span> {{$content->title}}
                        </a>
                        <a class="col-sm-4 btn btn-success" href="{{route('download' ,  $content->title)}}">download</a>
                        
                    </div>
                    @endforeach
                </div>
            </div>
       </div>
    </div>
    <div>
        <span style="font-weight:bold">Enrolled By</span> 
        <h2 style="display: inline"><span class="badge badge-primary">{{$course[0]->Ctoken}}</span></h2>
    </div>
    <div style="line-height: 3.1">
        <span style="font-weight:bold">Instructor</span> 
        <span>{{$course[0]->MName}}</span>
    </div>
    <div style="line-height: 3.1">
        <span style="font-weight:bold">Language</span> 
        <span>English</span>
    </div>
    <div style="line-height: 3.1">
    @if ($course[0]->CPrice == 0)
        <span class="alert alert-sucess">Free</span>
    @else
        <span style="font-weight:bold">Its For</span>
        <span class="alert alert-success">{{$course[0]->CPrice}} Dollar</span> 
    @endif
    </div>
    <div class="text-center row" style="margin-top:40px; margin-bottom:40px">
        <div class="col-sm-2 offset-sm-3">
            <a href="#" class="btn btn-success">
                Enroll This Course
            </a>
        </div>
            @if(Auth::user()->id===$course[0]->MID)
                <form method="post" action={{route('addNewContent')}} class="col-sm-3">
                    @csrf
                    <input type="text" value="{{$course[0]->CID}}" name="id" hidden>
                    <input type="submit" value="add New Content" class="btn btn-success">
                </form>
                <div class="col-sm-2">
                    <a href="#" class="btn btn-success">
                        Create Cobon
                    </a>
                </div>
            @endif
            
        </div>
</div>
@include('front.layouts.foot')