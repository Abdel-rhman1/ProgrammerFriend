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
    @if(Session::has('error'))
        <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
            {{Session::get('error')}}
        </div>
    @endif
    <div class="table-responsive">
    <table class="table table-striped table-dark ">
        <thead>
        <tr>
           
            <th scope="col" class='text-center'>Name</th>
            <th scope="col" class='text-center'>contributors</th>
            <th scope="col" class='text-center'>Url</th>
            <th scope="col" class='text-center'>Skills</th>
           
            <th scope="col" class='text-center'>Start Time</th>
            <th scope="col" class='text-center'>End Time</th>
            <th scope="col" class='text-center'>Controllers</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Items as $Item)
            <tr>
               
                <td>{{$Item->Name}}</td>
                <td class='text-center'>
                <?php $conts = explode(',',$Item->contributes)?>
                <div class="text-center">
                    @foreach ($conts as $cont)
                    <span class="btn btn-xs" style="font-size:13px; color:#fff;border:2px solid #fff;margin-bottom:3px">{{$cont}}</span>
                       
                    @endforeach
                </div>
                </td>
                <td><a href='{{$Item->rul}}'> Link</a></td>
                <td>
                    <?php 
                        $skills = explode('_',$Item->skills);
                        array_pop($skills);
                    ?>
                    <div class="text-center">
                    @foreach ($skills as $skill)
                    <span class="btn btn-xs" style="font-size:13px; color:#fff;border:2px solid #fff;margin-bottom:3px">{{$skill}}</span>
                       
                    @endforeach
                    </div>
                </td>
                
                <td><p>{{$Item->start_time}}</p></td>
                    <td>{{$Item->end_time}}</td>
               
                <td>
                    <span>
                        <a href="{{route('item.edit' , $Item->ID)}}" class="btn btn-success btn btn-sm">update</a>
                    </span>
                    <span>
                        <a href="{{route('item.delete' , $Item->ID)}}"class="btn btn-danger btn btn-sm">Delete</a>
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    </div>
    <div class="text-center" style="margin:10px auto">
        <span>{{$Items->links()}}</span>
    </div>
    <span class="btn btn-primary btn btn-sm">
        <a href="{{route('add.Items')}}" style="color: white; text-decoration: none">
             Add New Member
        </a>
    </span>
    
</div>
@include('backend.layouts.footer')