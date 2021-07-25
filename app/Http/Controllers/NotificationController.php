<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
class NotificationController extends Controller
{
    public function index(){
        $notifications = Notification::paginate(10);
        return view('front.notifications.all' , compact('notifications'));
    }
}
