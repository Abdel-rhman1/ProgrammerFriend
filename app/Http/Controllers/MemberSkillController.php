<?php

namespace App\Http\Controllers;
use App\Models\MemberSkill;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberSkillController extends Controller
{
    public function addSkillToMember($MemberID , $SkillID){
        MemberSkill::create([
            'SkillID' => $SkillID,
            'MemberID' => $MemberID,
            'Date' => 'now()',
        ]);
    }
    public function check($skillID){
        $Members  = MemberSkill::distinct()->where('SkillID' , $skillID)->join('members' , 'MemberID' , '=' , 'members.ID')->get();
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function get($id){
        $skills = MemberSkill::select('skills.Name')->where('MemberID' , $id)->join('skills', 'memberHaveSkill.SkillID' , '=' , 'skills.ID')->get();
        return $skills;
    }
}
