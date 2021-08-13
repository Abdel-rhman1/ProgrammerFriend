@include("backend.layouts.header")
@section('title')
    Members
@stop
@include('backend.layouts.navbar')
<h1 class="text-center my-5">all Members</h1>
<div class="container">
    @if(Session::has('deleted'))
        <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
            {{Session::get('deleted')}}
        </div>
    @endif
    @if(Session::has('errorIndelete'))
        <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
            {{Session::get('errorIndelete')}}
        </div>
    @endif
   <div class="table-responsive ">
    <table class="table table-striped table-light table-bordered">
        <thead class="table-dark">
        <tr>
            
            <th scope="col">Name</th>
            <th scope="col">email</th>
            <th scope="col">Role</th>
            <th scope="col">Brief</th>
            <th scope="col">Controllers</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Memebers as $Member)
            <tr>
               
                <td>{{$Member->Name}}</td>
                <td>{{$Member->email}}</td>
                <td>{{$Member->role}}</td>
                <td>{{$Member->about_You}}</td>
                <td style="width: 194px;
                text-align: center;">
                    <span>
                        <a href="{{route('member.edit' , $Member->id)}}" class="btn btn-success">update</a>
                    </span>
                    <span>
                        <a href="{{route('member.delete' , $Member->id)}}" class="btn btn-danger">Delete</a>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
    <span class="btn btn-primary btn btn-sm">
        <a href="{{route('Member.add')}}" style="color: white; text-decoration: none">
             Add New Member
        </a>
    </span>
</div>

@include('backend.layouts.footer')


