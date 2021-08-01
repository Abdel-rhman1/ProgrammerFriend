
<div class="container">
    <div class="text-center" style="text-align: center">
        <h1 style="color:green" class="text-center"> With You Website </h1>
        <h2 class="">Congttutations</h2>
    </div>
    <hr class=""  style="height:2px; width:50%; border-width:0; color:red; background-color:red;">
    <div class="mailBody" style="text-align: center">
        <div class="Item">
            <span class="course_name bg-success" style="font-weight:bold">Recommendation</span>
            <span class="auther_name">
                Eng  {{$mail_data['name']}} Recommended You To This Job 
            </span>
        </div>
        <div class="itemDetails" style="text-align: center">
            You Can find Job info Via maling {{$mail_data['mail']}}
        </div>
    </div>
    <div class="mailFooter" style="text-align: center">
        <span>
            {{-- <a href="{{route('ShowCourseProfil' , $mail_data['course_id'])}}" class="btn btn-success">Browse Our Website and Enjoy With Our all Features</a> --}}
        </span>
    </div>

</div>