<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $table = 'notifications';
    protected $fillable = [
        'id' , 'user_id' , 'notifi_content' , 'course_id' , 'created_at'
    ];
    protected $hidden = [

    ];
    //public $timestamps = false;
}
