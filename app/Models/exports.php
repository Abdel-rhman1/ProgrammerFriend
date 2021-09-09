<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class exports extends Model
{
   protected $table = "exports";
   protected $fillable = [ 
        'id' , 'Name' , 'type' , 'date' , 'user_id'
   ];
   protected $hidden=[];
   public $timestamps = false;
}
