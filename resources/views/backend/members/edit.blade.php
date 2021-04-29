@include("backend.layouts.header")
@section('title')
    New Member
@stop
@include('backend.layouts.navbar')
<div class="container">
    <div class="card" style="margin:10%">
        <div class="card-header">update Member</div>
        <div class="card-body">
            @if(Session::has('Updated'))
                <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
                    {{Session::get('Updated')}}
                </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
                    {{Session::get('error')}}
                </div>
            @endif
            <form action="{{route('member.update')}}" method="post" enctype="multipart/form-data">
                @csrf
                <input type='text' hidden value='{{$Member->ID}}' name='ID'>
                <div class="form-group form-group-lg row">
                    <img class="text-center" id="MemberImage" src="{{asset('images/default.png')}}" alt="User Image">
                </div>
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="PhotoInput">
                        photo
                    </label>
                    <input type="file" name="photo" id="PhotoInput" class="form-control col-sm-8">
                </div>
                @error('photo')
                <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="NameInput">
                        Name
                    </label>
                    <input type="text" name="Name" id="NameInput" value='{{$Member->Name}}'class="form-control col-sm-8" placeholder="Type Your Name">
                </div>
                @error('Name')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">

                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="emailInput">
                        email
                    </label>
                    <input type="email" name="email" id="emailInput" value='{{$Member->email}}' class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('email')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror
               
                <div class="form-group form-control-lgr-m">
                    <input type='submit' value="update" class="form-control-lg btn btn-sm col-sm-2 offset-sm-2 btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@include('backend.layouts.footer')
