<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Categorie;
class SkillController extends Controller
{
    public function index(){
        $Skills=Skill::get();
        return view('backend.skills.index' , compact('Skills'));
    }
    public function add(){
        $Cats = Categorie::get();
        return view('backend.skills.add' ,compact('Cats'));
    }
    public function getSuffix(Request $res){
        $skills = Skill::where('Name' ,'like', '%'.$res->ID.'%')->get();
       
        return $skills;
    }
}
