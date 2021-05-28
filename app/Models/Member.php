<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Member extends Authenticatable
{
    use Notifiable;
    protected $table = 'members';
    protected $fillable = [
        'ID' , 'Name' , 'email' , 'password', 'role' , 'about_You','photo',
     ];
    protected $hidden = [
        'created_at' , 'updated_at' , 'password'
    ];
    public $timestamps = false;
}