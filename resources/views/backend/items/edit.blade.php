@include("backend.layouts.header")
@section('name')
    Update New Items
@stop
@include('backend.layouts.navbar')
<div class='container'>
    <div class="card" style="margin:10%">
        <div class="card-header">Edit Items</div>
        <div class="card-body">
            @if(Session::has('Inserted'))
                <div class="alert alert-success text-center  offset-sm-2 col-sm-8">
                    {{Session::get('Inserted')}}
                </div>
            @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger text-center  offset-sm-2 col-sm-8">
                        {{Session::get('error')}}
                    </div>
                @endif
            <form action="{{route('Item.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="NameInput">
                        Name
                    </label>
                    <input type="text" name="Name" value ='{{$items->Name}}' id="NameInput" class="form-control col-sm-8" placeholder="Type Your Name">
                </div>
                @error('Name')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="URlInput">
                        URl
                    </label>
                    <input type="url" name="Url" id="URlInput" class="form-control col-sm-8" placeholder="Type Your Url">
                </div>
                @error('Url')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="contributeInput">
                        contributes
                    </label>
                    <input type="text" name="contribute" id="contributeInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('contribute')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                        {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="detailsInput">
                        details
                    </label>
                    <input type="text" name="details" id="detailsInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('details')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="StartInput">
                        Start Time
                    </label>
                    <input type="date" name="startTime" id="StartInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('startTime')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
                    {{$message}}
                </div>
                @enderror

                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="EndInput">
                        End Time
                    </label>
                    <input type="date" name="EndTime" id="EndInput" class="form-control col-sm-8" placeholder="Type Your email">
                </div>
                @error('EndTime')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8">
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
