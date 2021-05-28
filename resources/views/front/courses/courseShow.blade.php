@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container'>
    <div class="row" style='margin-top:100px'>
        <div class="CourseName float-left col-sm-6">
            <h1 style="font-weight:bold">{{$course[0]->CName}}</h1>
        </div>
        <div class="float-right">
            <span style="line-height: 2;">offered By<span> 
            <h1 style="font-weight: bold ; margin-top:4px;color:#8d2220">{{$course[0]->MName}}</h1>
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
    <div class="text-center" style="width:100% ; margin-top:40px; margin-bottom:40px">
        <a href="#" class="btn btn-success">
            Enroll This Course
        </a>
    </div>
</div>
@include('front.layouts.foot')