
@if(!isset($member[0]->id))

<a href="{{route('Profile' , $member[0]->id)}}" id="">   
    <img src="{{asset('images/Members/' . $member[0]->photo)}}" id="avatar">
<a>
    @else
    @endif