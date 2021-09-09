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
    @if(Session::has('message'))
        <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errorIndelete'))
        <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
            {{Session::get('errorIndelete')}}
        </div>
    @endif
   <div class="table-responsive text-center">
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
    <span class="btn btn-primary btn btn-sm">
        <a href="{{route('Member.export')}}" style="color: white; text-decoration: none">
            Exporting
    </a>
    </span>

    <div class="card my-5">
        <table class="tabele table-bordered text-center">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>User ID</th>
                    <th>Download</th>
                    <th>Type</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($exports as $export)
                <tr>
                    <td>
                        {{ $export->date }}
                    </td>
                    <td>
                        {{ $export->memberName }}
                    </td>
                    <td>
                        <a download href="{{ route('downloadmember' , $export->Name ) }}" title="Download">
                            {{-- <i class="fab fab-facebook"></i> --}}
                            download
                        </a>
                    </td>
                    <td>
                        {{ $export->type  }}
                    </td>
                </tr>
                @endforeach
                
            </tbody>
        </table>
    </div>

</div>




@include('backend.layouts.footer')


