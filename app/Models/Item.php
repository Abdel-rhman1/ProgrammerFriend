<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'items';
    protected $fillable =  [
        'Name' , 'rul' , 'contributes' , 'details' , 'start_time' , 'end_time', 'skills','CatID','photo' , 'Likes','Views'
    ];
    protected $hidden = [

    ];
    public $timestamps = false;
}