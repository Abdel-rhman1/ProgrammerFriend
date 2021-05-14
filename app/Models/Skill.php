<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';
    protected $fillable = [
        'ID','Name' , 'important','ItemID','visiable'
    ];
    protected $hidden = [
        
    ];
    public $timestamps = false;
}
