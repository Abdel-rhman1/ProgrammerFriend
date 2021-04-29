<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $fillable = [
        'ID' , 'Name' , 'email' , 'password',
     ];
    protected $hidden = [
        'created_at' , 'updated_at' , 'password'
    ];
    public $timestamps = false;
}
