@include("backend.layouts.header")
@section('title')
    Items
@stop
@include('backend.layouts.navbar')
<h1 class="text-center">all Items</h1>
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
   
    <table class="table table-striped table-dark table-responsive">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">contributors</th>
            <th scope="col">Url</th>
            <th scope="col">details</th>
            <th scope="col">Start Time</th>
            <th scope="col">End Time</th>
            <th scope="col">Controllers</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Items as $Item)
            <tr>
                <th scope="row">{{$Item->ID}}</th>
                <td>{{$Item->Name}}</td>
                <td>{{$Item->contributes}}</td>
                <td>{{$Item->rul}}</td>
                <td>{{$Item->details}}</td>
                <td>{{$Item->start_time}}</td>
                <td>{{$Item->end_time}}</td>
                <td>
                    <span>
                        <a href="{{route('item.edit' , $Item->ID)}}" class="btn btn-success">update</a>
                    </span>
                    <span>
                        <a href="{{route('item.delete' , $Item->ID)}}" class="btn btn-danger">Delete</a>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <span class="btn btn-primary btn btn-sm">
        <a href="{{route('Items.add')}}" style="color: white; text-decoration: none">
             Add New Member
        </a>
    </span>
</div>

@include('backend.layouts.footer')