@include("backend.layouts.header")
@section('title')
    {{__('backend.allcourse')}}
@stop
@include('backend.layouts.navbar')

<div class="container" style="margin-top:50px">
    <h1 class="text-center">{{__('backend.allcourse')}}</h1>
    @if(Session::has('deleted'))
        <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
            {{Session::get('deleted')}}
        </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="">
    <table class="table table-striped table-light">
        <thead class="table-info">
        <tr>
            <th scope="col" class='text-center'>{{__('backend.ID')}}</th>
            <th scope="col" class='text-center'>{{__('backend.Name')}}</th>
            <th scope="col" class='text-center'>{{__('backend.Instructor')}}</th>
            <th scope="col" class='text-center'>{{__('backend.Price')}}</th>
            <th scope="col" class='text-center'>{{__('backend.Date')}}</th>
            <th scope="col" class='text-center'>{{__('backend.Controllers')}}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($courses as $course)
            <tr>
                <th scope="row">{{$course->ID}}</th>
                <td>{{$course->CName}}</td>
                <td>{{$course->MName}}</td>
                @if ($course->CPrice == 0)
                <td>
                    <h4><span class="badge badge-primary">{{__('backend.Free')}}</span></h4>
                </td> 
                @else 
                    <td>{{$course->CPrice}}</td>
                @endif
                <td>{{$course->Date}}</td>
                <td>
                    <span>
                        <a href="{{route('course.edit' , $course->CID)}}" class="btn btn-success btn btn-sm">{{__('backend.edit')}}</a>
                    </span>
                    <span>
                        <a href="{{route('course.delete' , $course->CID)}}"class="btn btn-danger btn btn-sm" onclick="return confirm('You Sure To delete This Item');">{{__('backend.delete')}}</a>
                    </span>
                    <span>
                        
                    </span>
                   
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <span class="btn btn-outline-primary btn btn-info btn btn-sm">
        <a href="{{route('add.course')}}" style="color: white; text-decoration: none">
             {{__('backend.addnewCourse')}}
        </a>
    </span>

    <span class="btn btn-outline-primary btn btn-info btn btn-sm">
        <a href="{{route('exportexcel')}}" style="color: white; text-decoration: none">
             {{__('backend.addnewCourse')}}
        </a>
    </span>
    
</div>
@include('backend.layouts.footer')