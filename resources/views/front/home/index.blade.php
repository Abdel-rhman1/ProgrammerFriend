@include('front.index')
@section('title')
    All Projects
@endsection
<div class='container' style="margin-top:60px">
    <div class="row">
        <div class="col-sm-2">
            Left Side
        </div>
        <div class="col-sm-6">
            <div class="share_post">
                <div class="form-group">
                    <input name="post" id="post"  type="text" class="form-control form-control-lg" placeholder="start a post">
                    <div class="row" style="margin-top:10px">
                        <div class="image col-sm-3">
                            <i class="fa fa-file-image-o" aria-hidden="true"></i>Image
                        </div>
                        <div class="image col-sm-3">
                            <i class="fa fa-video-camera" aria-hidden="true"></i>
                            Video
                        </div>
                        <div class="image col-sm-3">
                            <i class="fa fa-calendar-o" aria-hidden="true"></i>Event
                        </div>
                        <div class="image col-sm-3">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>Article
                        </div>
                    </div>
                </div>
            </div>
            <div class="writepost" id="writepost">
                <div class="writepost_heading">
                    <h2>Create Post</h2>
                </div>
                <hr class="custom-hr">
                
            </div>
        </div>
        <div class="col-sm-2">
            Right Side
        </div>
    </div>
</div>
