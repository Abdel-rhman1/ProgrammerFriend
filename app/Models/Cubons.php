<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cubons extends Model
{

    protected $table = "cubons";
    protected $fillable = [
        'id' , 'endDate' , 'startDate' , 'number' , 'code' , 'course_id',
    ];
    protected $hidden = [

    ];
    public $timestamp = false; 
}