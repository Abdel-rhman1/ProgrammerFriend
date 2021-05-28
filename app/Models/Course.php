<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $guard = 'member';
    protected $table = 'courses';
    protected $fillable = [
        'ID' , 'Name' , 'photo' , 'InstructorID','details', 'Date' , 'Price' , 'taken',
    ];
    protected $hidden = [];
    public $timestamps =  false;
}
