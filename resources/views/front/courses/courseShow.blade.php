@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container'>
    @if(Session::has('msg'))
        <div class="text-center alert alert-danger errorMsg" style="margin-top:30px">
            <span>{{Session::get('msg')}}</span>
            <span class="exitMsg" style="float:right;cursor:pointer;">X</span>
        </div>        
    @endif
    <div class="row" style='margin-top:100px'>
        
        <div class="CourseName float-left col-sm-3">
            <h1 style="font-weight:bold">{{$course[0]->CName}}</h1>
            <div class="mt-5">
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
            {{-- <input type="text"   value="{{$courseEvalute[0]->ranking}}" id="rankingBase" name="ranking"> --}}
            @php 
                $ranking = 0;
            @endphp
            @if(count($courseEvalute)!=0) 
                @php 
                    $ranking = $courseEvalute[0]->ranking;
                @endphp
                
            @endif
            <form class="" action="{{route("evalute")}}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="text"  hidden value="{{$course[0]->CID}}"  name="courseID">
                <input type="text"  hidden value="" id="ranking" name="ranking">
                <div class="Ranking mt-5 mb-3 fs-4">
                    @for($i=0;$i<$ranking;$i++)
                        <i class="fa fa-star mx-1" style = "color:gold" aria-hidden="true"></i>
                    
                    @endfor
                    @for($i=0;$i< 5 -$ranking;$i++)
                        <i class="fa fa-star mx-1" style = "color:block" aria-hidden="true"></i>
                    
                    @endfor
                   
                    
                </div>
                @if(count($courseEvalute)==0) 
                    <div class="">
                        <input class='btn btn-info' type="reset" id="restRanking" value="reset">
                        <input class="btn btn-success" type="submit" value="Evalute">
                    </div>
                @endif
        </form>
        
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
                            </span> 
                            {{$content->lessonName}}
                        </a>
                        <a class="col-sm-4 btn btn-success" href="{{route('download' ,  $content->title)}}">download</a>
                        
                    </div>
                    @endforeach
                </div>
            </div>
       </div>
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
<script>
    $(function(){
        $('.exitMsg').click(function(){
            $('.errorMsg').hide();
        });
    });
    
</script>