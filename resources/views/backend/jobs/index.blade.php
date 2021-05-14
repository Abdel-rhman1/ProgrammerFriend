@include("backend.index")
@section('title')
    Jobs
@stop


<div class="container" style="margin-top: 60px">
    <h1 class="text-center">all Jobs</h1>

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
<div class="table-responsive"> 
<table class="table table-striped table-dark">
<thead>
<tr>
    <th scope="col" class='text-center'>#</th>
    <th scope="col" class='text-center'>Name</th>
    <th scope="col" class='text-center'>description</th>
    <th scope="col" class='text-center'>Skills</th>
    <th scope="col" class='text-center'>Posteremail</th>
    <th scope="col" class='text-center'>Date</th>
    <th scope="col" class="text-center">Up To </th>
    <th scope="col" class='text-center'>Controllers</th>
</tr>
</thead>
<tbody>
@foreach($jobs as $job)
    <tr>
        <th scope="row">{{$job->ID}}</th>
        <td>{{$job->Name}}</td>
        <td scope="row">{{$job->description}}</td>
        <td scope="row">{{$job->skills}}</td>
        <td scope="row">{{$job->Posteremail}}</td>
        <td scope="row">{{$job->Date}}</td>
        <td scope="row">{{$job->InValidUpTo}}</td>
        <td>
            <span>
                <a href="{{route('job.edit' , $job->ID)}}" class="btn btn-success btn btn-sm">update</a>
            </span>
            <span>
                <a href="{{route('job.delete' , $job->ID)}}"class="btn btn-danger btn btn-sm">Delete</a>
            </span>
        </td>
    </tr>
@endforeach
</tbody>
</table>
</div>
<a href="{{route('job.add')}}" class="btn btn-success">Add New Job</a>
</div>