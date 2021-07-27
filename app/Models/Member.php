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
        'id' , 'Name' , 'email' , 'password', 'role' , 'about_You','photo', 'cv' , 'remember_token'
     ];
    protected $hidden = [
        'created_at' , 'updated_at' , 'password'
    ];
    public $timestamps = false;
}
