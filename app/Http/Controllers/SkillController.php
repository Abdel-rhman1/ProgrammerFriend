<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Skill;
use App\Models\Categorie;
use Validator;
class SkillController extends Controller
{
    public function index(){
        $Skills=Skill::select('skills.ID','skills.Name' , 'skills.important' ,
        'skills.visiable' , 'categories.Name as ItemName')->join('categories' , 'skills.ItemID' , '=' , 'categories.ID')->get();
        
        return view('backend.skills.index' , compact('Skills'));
    }
    public function indexCollection(){
        $Skills=Skill::get();
        
        return $Skills;
    }
    public function indexByName(Request $res){

        $skills = Skill::where('Name',  'like' , '%' . $res->Name .'%')->get();
        return $skills;
    }
    public function add(){
        $Cats = Categorie::get();
        return view('backend.skills.add' ,compact('Cats'));
    }
    public function store(Request $res){
        $validate = Validator::make($res->all(), [
            'Name'=>'required',
            'Import'=>'required|integer',
            'Cat'=>'required|integer',
            'visi'=>'required|integer',
        ],
        [
            'Name.required'=>'Skill Name Is required',
            'Import.required'=>'Important Of This Skill is required',
            'Import.integer'=>'Important Of thia Skill Must be Integer',
            'Cat.required'=>'Cat of this Skill must be required',
            'Cat.integer'=>'Cat of this Skill Must be Integer',
            'visi,required'=>'visi Of this Skill Must be require',
            'visi.integer'=>'visi Of this skill Mist be Integer',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInputs();
        }
        $skill = Skill::create([
           'Name'=>$res->Name,
           'important'=>$res->Import,
           'ItemID'=>$res->Cat,
           'visiable'=>$res->visi, 
        ]);
        if($skill){
            return redirect()->back()->with(['Inserted'=>'Skill is Inserted']);
        }else{
            return redirect()->back()->with(['Error'=>'Error in Inserting this Skill']);
        }
    }
    public function edit($id){
        $skill = Skill::findOrFail($id);
        $Cats = Categorie::get();
        //return $skill->Name;
        return view('backend.skills.edit' , compact('skill' , 'Cats'));
    }
    public function update(Request $res){
        $validate = Validator::make($res->all(), [
            'Name'=>'required',
            'Import'=>'required|integer',
            'Cat'=>'required|integer',
            'visi'=>'required|integer',
        ],
        [
            'Name.required'=>'Skill Name Is required',
            'Import.required'=>'Important Of This Skill is required',
            'Import.integer'=>'Important Of thia Skill Must be Integer',
            'Cat.required'=>'Cat of this Skill must be required',
            'Cat.integer'=>'Cat of this Skill Must be Integer',
            'visi,required'=>'visi Of this Skill Must be require',
            'visi.integer'=>'visi Of this skill Mist be Integer',
        ]);
        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInputs();
        }
        $skill = Skill::where('ID' , $res->ID)->update([
           'Name'=>$res->Name,
           'important'=>$res->Import,
           'ItemID'=>$res->Cat,
           'visiable'=>$res->visi, 
        ]);
        if($skill){
            return redirect()->back()->with(['updated'=>'Skill is Upadated']);
        }else{
            return redirect()->back()->with(['Error'=>'Error in Updating this Skill']);
        }
    }
    public function delete($id){
        Skill::findOrFail($id);
        $skill=Skill::where('ID' , $id)->delete();
        if($skill){
            return redirect()->back()->with(['deleted'=>'Skill is deleted']);
        }else{
            return redirect()->back()->with(['deleteError'=>'Error in Updating this Skill']);
        }
    }
    public function getSuffix(Request $res){
        $skills = Skill::where('Name' ,'like', '%'.$res->ID.'%')->get();
        return $skills;
    }
}
