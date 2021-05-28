@include('front.index')
@section('title')
    All Projects
@endsection
    <div class='container' style="margin:60px auto ; width:80%">
        <div class="card">
            <div class='card-header'>Member Login</div>
                <div class='card-body'>
                    <form method='post' action="{{route('login.admin')}}">
                        @csrf
                        <div class='form-group form-group-lg row'>
                            <label class='control-label col-sm-2' for='emailInput'>email</label>
                            <input class='form-control col-sm-8' id='emailInput' name ='email' type='email' placeholder="Type Your Email">
                        </div>
                        @error('email')
                            <div class='alert alert-danger offset-sm-2 col-sm-8'>
                                <span>
                                    {{$message}}    
                                </span>    
                            </div>
                        @enderror
                        <div class='form-group form-group-lg row'>
                            <label class='control-label col-sm-2' for='emailInput'>Password</label>
                            <input class='form-control col-sm-8' name ='password'id='emailInput' type='password' placeholder="Type Your passord">
                        </div>
                        @error('password')
                            <div class='alert alert-danger offset-sm-2 col-sm-8'>
                                <span>
                                    {{$message}}    
                                </span></div>
                        @enderror
                        <div class='form-group from-group-lg'>
                            <input class='form-control offset-sm-2 col-sm-2 btn btn-success' value='Save' type='submit'>
                        </div>
                    </form>
                </div>
            </div>
        </div>