@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container'>
    <div class="card">
        <div class="card-header">Add New Content</div>
        <div class="card-body">
            <form method="post" action="{{route('upload')}}" enctype="multipart/form-data">
                @csrf
                <input type="text" name="id" value='{{$id}}' hidden>
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="lessonNumber">
                            Lesson#
                        </label>
                        <div class="col-sm-10">
                            <input type="number" class="form-control" id= "lessonNumber" name="lessonNmber" placeholder="Type Lesson Number" required>
                        </div>
                    </div>
                </div>

                @error('lessonNmber')
                
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <span class="alert alert-danger">
                                {{$message}}
                            </span>
                        </div>
                    </div>
                @enderror

                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="lessonTitle">
                            Lesson Title
                        </label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id= "lessonTitle" name="lessonTitle" placeholder="Type Lesson Tiltle" required>
                        </div>
                    </div>
                </div>

                @error('lessonTitle')
                
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <span class="alert alert-danger">
                                {{$message}}
                            </span>
                        </div>
                    </div>
                @enderror



                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="lessonType">
                            Type
                        </label>
                        <div class="col-sm-10">
                            
                            <select class="form-control"id="lessonType" name="lessonType" required>
                                <option value="mp3">MP3</option>
                                <option value="mp4">MP4</option>
                                <option value="other">Other</option>
                            </select>
                        
                        </div>
                    </div>
                </div>

                @error('lessonType')
                
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <span class="alert alert-danger">
                                {{$message}}
                            </span>
                        </div>
                    </div>
                @enderror
                <div class="form-group">
                    <div class="row">
                        <label class="col-sm-2" for="Item">
                            Item
                        </label>
                        <div class="col-sm-10">
                            
                            <input type="file" class="form-control"id="Item" name="Item" required>
                                
                        </div>
                    </div>
                </div>

                @error('Item')
                
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <span class="alert alert-danger">
                                {{$message}}
                            </span>
                        </div>
                    </div>
                @enderror
                <div clas="form-group">
                    <div class="text-center">
                        <input type="submit" value="Upload" class="btn btn-success">
                    </div>
                </div>
            </form>
        </div>

    </div>
</div>
@include('front.layouts.foot')