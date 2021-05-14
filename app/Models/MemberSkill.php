<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MemberSkill extends Model
{
    protected $table = 'memberHaveSkill';
    protected $fillable = [
        'SkillID' , 'MemberID' , 'Date','ID'
    ];
    protected $hidden = [

    ];
    public $timestamps = false;
}
