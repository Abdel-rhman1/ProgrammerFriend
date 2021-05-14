<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    protected $table = 'Likes';
    protected $fillable = [
        'ID' , 'ItemID' , 'MemberID' , 'Date',
    ];
    public $timestamps = false;
}
