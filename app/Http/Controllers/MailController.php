<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use App\Mail\SignupMail;
use Illuminate\Http\Request;

class MailController extends Controller
{
    public $data ;
    public $reciever;
    public $title;
    public function sendEmail($data , $rec , $title="Adding Course"){
        $this->data = $data;
        $this->reciever = $rec;
        $this->title = $title;
        Mail::to($this->reciever)->send(new SignupMail($this->data , $this->title));
    }
}
