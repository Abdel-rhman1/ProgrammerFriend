@include('backend.index')
@section('title')
    Add New Skills
@endsection
<div class='container'>
<div class='card'>
    <div class='card-header'>Mew Skills</div>
        <div class='card-body'>
            @if (Session::has('Inserted'))
            <div class="alert alert-success text-center col-sm-8 offset-sm-2">
                <span>{{Session::get('Inserted')}}</span>
            </div>
            @endif
            @if (Session::has('Error'))
            <div class="alert alert-danger text-center col-sm-8 offset-sm-2">
                <span>{{Session::get('Error')}}</span>
            </div>
            @endif
            
            <form action={{route('soteSkill')}} method='POST' enctype="multipart/form-data">
                @csrf
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='NameInput'>Name</label>
                    <input type="text" name='Name' class='form-control col-sm-8' placeholder="Type Skill Name(HTML)" id="NameInput">  
                </div>
                @error('Name')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='ImportInput'>Important #</label>
                    <input type="number" max="5" min="0" name='Import' class='form-control col-sm-8' placeholder="Type Skill Important level" id="ImportInput">  
                </div>
                @error('Import')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='CatInput'>Category</label>
                    <select class='form-control col-sm-8' id='CatInput' name='Cat'>
                        @foreach ($Cats as $cat)
                            <option value='{{$cat->ID}}'>{{$cat->Name}}</option>
                        @endforeach
                    </select>
                </div>
                @error('Cat')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class='form-group row'>
                    <label class='control-label col-sm-2' for='VisInput'>Visiable </label>
                    <input type="number" max="1" min="0" name='visi' class='form-control col-sm-8' placeholder="Type Skill visiability level" id="VisInput">  
                </div>
                @error('visi')
                    <div class='text-center alert alert-danger col-sm-8 offset-sm-2'>
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group">
                    <input type="submit" class="btn btn-success col-sm-2 offset-sm-2" value="Save">
                </div>
            </form>
        </div>
    </div>
</div>
