@include('front.index')
@section('title')
    Home Page
@endsection
<div class="container">
    <div class="container" style="padding-top: 20px">
        <div class="card">
            <div class="card-header">
                Send txt Note
            </div>
            <div class='card-body'>
        <form action="{{ url('/send-message') }}" method="post">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name"  value="{{Auth::user()->Name}}">
            </div>
            <div class="form-group">
                <label for="message">Message</label>
                <textarea name="message" id="message" class="form-control" placeholder="Enter your query" rows="10"></textarea>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    </div>
    <div class="card" style="margin-top:20px ; margin-bottom:30px">
        <div class="card-header">attach Photo</div> 
        <div class="card-body">
        <form action="{{ url('/store-photo') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <div class="custom-file">
                    <input type="file" id="file" name="file" class="custom-file-input">
                    <label class="custom-file-label" for="file">Choose file</label>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
      </div>
    </div>
    </div>
</div>
@include('front.layouts.foot')