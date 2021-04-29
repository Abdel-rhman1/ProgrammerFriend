@include('front.index')
@section('title')
    All Skills
@endsection
<div class='container' style='margin-top:100px'>
    <table class="table table-striped table-dark bordered-table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Items</th>
            <th scope="col">Importance</th>
            <th scope="col">added by</th>
        </tr>
        </thead>
        <tbody>
        @foreach($Skills as $skill)
            <tr>
                <th scope="row">{{$skill->ID}}</th>
                <td>{{$skill->Name}}</td>
                <td>{{$skill->Item}}</td>
                <td>{{$skill->Import}}</td>
                <td>{{$skill->author}}</td>
                <td>
                    <span>
                        <a href="{{route('editSkill' , $skill->ID)}}" class="btn btn-success">update</a>
                    </span>
                    <span>
                        <a href="{{route('deleteSkill' , $skill->ID)}}" class="btn btn-danger">Delete</a>
                    </span>
                </td>
            </tr>
        @endforeach
    </tbody>
    </table>
    <span class="btn btn-primary btn btn-sm">
        <a href="{{route('addNewSkill')}}" style="color: white; text-decoration: none">
            Add New Skill
        </a>
    </span>
</div>