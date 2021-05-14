@include("backend.layouts.header")
@section('name')
    edit Course Data
@stop
@include('backend.layouts.navbar')
<div class='container'>
    <div class="card" style="margin:10%">
        <div class="card-header">Update Course Data</div>
        <div class="card-body">
            @if(Session::has('updated'))
                <div class="alert alert-success text-center  offset-sm-2 col-sm-8 btn btn-sm">
                    {{Session::get('updated')}}
                </div>
            @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger text-center  offset-sm-2 col-sm-8 btn btn-sm">
                        {{Session::get('error')}}
                    </div>
                @endif
            <form action="{{route('course.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="text"  value="{{$course[0]->CID}}" name="ID" hidden>
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="NameInput">
                        Name
                    </label>
                    <input type="text" value="{{$course[0]->CName}}" name="Name" id="NameInput" class="form-control col-sm-8" placeholder="Type Your Name">
                </div>
                @error('Name')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                        {{$message}}
                    </div>
                @enderror
                <div class='from-group row'>
                    <label class='col-form-label col-sm-2' for='photoInput'>
                        Photo
                    </label>
                    <input type='file' value="{{$course[0]->Cphoto}}" name='photo' id="photoInput" class='form-control col-sm-8' style='margin-bottom:10px'>    
                </div>
                @error('photo')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="InstructorInput">
                        Instructor
                    </label>
                    <select name="selectInstructor" class="form-control col-sm-8">
                        @foreach ($members as $member)
                            
                       
                        <option value="{{$member->ID}}">
                            {{$member->Name}}
                        </option>
                        @endforeach
                    </select>
                </div>
                @error('selectInstructor')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="PriceInput">
                        Price
                    </label>
                    <input type="number" value="{{$course[0]->Cprice}}" name="price" id="PriceInput" class="form-control col-sm-8" placeholder="Type Course Price">
                </div>
                @error('price')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                        {{$message}}
                    </div>
                @enderror

                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="detailsInput">
                        details
                    </label>
                    <textarea name="details" id="detailsInput" class="form-control col-sm-8" placeholder="Type Project details"> {{$course[0]->Cdetails}}</textarea>
                </div>
                @error('details')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-control-lgr-m">
                    <input type='submit' value="Save" class="form-control-lg btn btn-sm col-sm-2 offset-sm-2 btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@include('backend.layouts.footer')
