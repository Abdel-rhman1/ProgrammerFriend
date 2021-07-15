<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    protected $table = 'docs';
    protected $fillable = [
       'id','title','type','lessonNum','courseId'
    ];
    public $timestamp = false;
}
