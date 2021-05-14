<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = 'courses';
    protected $fillable = [
        'Name' , 'photo' , 'InstructorID','details', 'Date' , 'Price'
    ];
    protected $hidden = [];
    public $timestamps =  false;
}
