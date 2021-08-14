
<div class="container">
    <div class="text-center" style="text-align: center">
        <h1 style="color:green" class="text-center">With You Website</h1>
    </div>
    <hr class=""  style="height:2px; width:50%; border-width:0; color:red; background-color:red;">
    <div class="mailBody" style="text-align: center">
        <div class="Item">
            <span class="course_name" style="font-weight:bold">{{$mail_data['course_name']}}</span>
            <span class="auther_name">
                Adding By Eng {{$mail_data['name']}}
            </span>
        </div>
        <div class="itemDetails" style="text-align: center">
            Course Details Will be Added
        </div>
    </div>
    <div class="mailFooter" style="text-align: center">
        <span>
            <a href="{{route('course.profile' , $mail_data['course_id'])}}" class="btn btn-success">Browse Our Website and Enjoy With Our all Features</a>
        </span>
    </div>

</div>