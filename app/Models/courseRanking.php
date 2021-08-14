<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class courseRanking extends Model
{
    protected $table = '_course_evalute__create';
    protected $fillable = [
        'courseId' , 'ranking' , 'user_id'
    ];
    public $timestamp = false;
}
