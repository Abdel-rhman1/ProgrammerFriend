@include("backend.layouts.header")
@section('title')
    dashboard
@stop
@include('backend.layouts.navbar')
<div class="container">
    <div class="card" id="loginForm">
        <div class="card-header">
            Login
        </div>
        <div class="card-body">
            <form action="{{route('login.admin')}}" method="post" enctype="multipart/form-data" >
                @csrf
                <div class="form-group form-group-lg row">
                    <label for="emailInput" class="col-form-label-sm col-sm-2">
                        email
                    </label>
                    <input class="form-control col-sm-8" type="email" placeholder="Type Your email" name="email" id="emailInput">
                </div>
                @error('email')
                    <div class="col-sm-8 offset-sm-2 alert alert-danger text-center">
                        {{$message}}
                    </div>
                @enderror

                <div class="form-group form-group-lg row">
                    <label for="passwordInput" class="col-form-label-sm col-sm-2">
                        password
                    </label>
                    <input class="form-control col-sm-8" type="password" placeholder="Type Your email" name="password" id="passwordInput">
                </div>
                @error('password')
                <div class="col-sm-8 offset-sm-2 alert alert-danger text-center">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg">
                    <input class="col-sm-2 offset-sm-2 form-control btn btn-success bnt btn-sm" type="submit" value="Login">
                </div>
            </form>
        </div>
    </div>
</div>


@include('backend.layouts.footer')
