<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Telegram\Bot\FileUpload\InputFile;
use Illuminate\Support\Str;
use Telegram\Bot\Laravel\Facades\Telegram;
class TelegramController extends Controller
{
    public function getUpdate(){
        $activity = Telegram::getUpdates();
        dd($activity);
    }
    public function Send(Request $res){
        $vali = Validator::make($res->all() , [
            'name'=>'required|string|max:200',
            'message'=>'required|string',
        ],[ 

        ]);
        if($vali->fails()){
            return redirect()->back()->withInputs($vali)->withErrors();
        }
        else{
            $text =  "<b>Name: </b>\n"
             . "$res->name\n"
             . "<b>Message: </b>\n"
             . $res->message;

         Telegram::sendMessage([
             'chat_id' => '-1001169522519',
             'parse_mode' => 'HTML',
             'text' => $text,
         ]);
         return redirect()->back()->with(['success'=>'Good You Norice Was Be Sended Thank You for Your Note']);

        }
    }
    public function Storephoto(){
        
    }
}
