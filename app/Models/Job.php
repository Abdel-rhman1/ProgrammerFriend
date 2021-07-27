<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'job';
    protected $fillable = [
        'Name','description','skills','Posteremail','InValidUpTo' , 'minSalaryRange' , 'maxSalaryRange' , 'Salary' , 
    ];
    protected $hidden =[
        
    ];
    public $timestamps = false;
}
