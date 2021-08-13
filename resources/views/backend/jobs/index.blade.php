@include("backend.index")
@section('title')
    Jobs
@stop


<div class="container my-5">
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
<div class=""> 
<table class="table table-striped table-light table-responsive">
<thead class="table-dark">
<tr>
    <th scope="col" class='text-center'>#</th>
    <th scope="col" class='text-center'>Name</th>
    <th scope="col" class='text-center'>description</th>
    <th scope="col" class='text-center'>Skills</th>
    <th scope="col" class='text-center'>Posteremail</th>
    
    <th scope="col" class="text-center">Up To </th>
    <th scope="col" class='text-center'>Controllers</th>
</tr>
</thead>
<tbody>
@foreach($jobs as $job)
    <tr>
        <th scope="row">{{$job->ID}}</th>
        <td>{{$job->Name}}</td>
        <td scope="row">
            @php 
                $QualificationsArray = explode ('-' , $job->description);
            @endphp
            <ul>
                 <li class="lead text-muted">{{$QualificationsArray[0]}} ...</li>            
            </ul>
        </td>
        <td scope="row"><?php
            $jobSkills = explode("_",$job->skills);
        ?>
        <div class="text-center">
        @for ($i = 0; $i<count($jobSkills)-1;$i++)
            <span class="btn btn-xs btn-outline-info" style="font-size:13px; color:#000;border:2px solid #ddd;margin-bottom:3px">{{$jobSkills[$i]}}</span>
        @endfor
        </div>
        </td>
        <td scope="row">{{$job->Posteremail}}</td>
        
        <td scope="row">{{$job->InValidUpTo}}</td>
        <td class="text-center" style="width:190px">
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
<div class="text-center" style="margin:10px auto">
    <span>{{$jobs->links()}}</span>
</div>
<a href="{{route('job.add')}}" class="btn btn-success">Add New Job</a>
</div>