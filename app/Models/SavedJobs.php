<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SavedJobs extends Model
{
    public $fillable  = [
        'user_id' , 'job_id',
    ];
}
