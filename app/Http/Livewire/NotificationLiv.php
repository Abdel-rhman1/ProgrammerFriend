<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Notification;
class NotificationLiv extends Component
{
    use WithPagination;
    public $perPage = 5;
    public function loadMore(){
        $this->perPage+=5;
    }
    public function render()
    {
        $Notifications = Notification::select('notifications.id as NID' , 'notifications.notifi_content' , 'courses.Name as CName' , 'courses.ID as CID' , 'members.Name as MName' , 'notifications.created_at as CNO' )
        ->join('members' , 'members.ID' , '=' , 'notifications.user_id')
        ->join('courses' , 'courses.ID' , '=' ,'notifications.course_id')->orderBy('notifications.created_at' , 'DESC')->paginate($this->perPage);
       
        return view('livewire.notification-liv' , compact('Notifications'));
    }
}
