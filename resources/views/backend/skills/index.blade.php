@include('backend.index')
@section('title')
    All Skills
@endsection
<div class='container my-5' style='margin-top:100px'>
    @if (Session::has('deleted'))
    <div class="alert alert-success text-center col-sm-8 offset-sm-2">
        <span>{{Session::get('deleted')}}</span>
    </div>
    @endif
    
    @if (Session::has('deleteError'))
    <div class="alert alert-success text-center col-sm-8 offset-sm-2">
        <span>{{Session::get('deleteError')}}</span>
    </div>
    @endif
    <div class="">
    <table class="table table-striped table-light bordered-table">
        <thead class="table-info">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Items</th>
            <th scope="col">Importance</th>
            <th scope="col">Visiability</th>
            <th scope="col">Controllers</th>
        </tr>
        </thead>
        <tbody>
            <?php 
                $ImportantTable = [
                    'CoreSkill',
                    'NeccessarySkill',
                    'ImportatSkill',
                    'PrefedSkill',
                    'PlusSkill',
                ];
        ?>
        @foreach($Skills as $skill)
            <tr>
                <th scope="row">{{$skill->ID}}</th>
                <td>{{$skill->Name}}</td>
                <td>{{ $skill->ItemName}}</td>
                <td>{{$ImportantTable[$skill->important]}}</td>
                <td>{{$skill->visiable}}</td>
                <td style="width:200px ; text-align:center">
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
</div>
    <span class="btn btn-primary btn btn-sm">
        <a href="{{route('addNewSkill')}}" style="color: white; text-decoration: none">
            Add New Skill
        </a>
    </span>
</div>