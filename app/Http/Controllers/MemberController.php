<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;
use Illuminate\Support\Facades\Hash;
class MemberController extends Controller
{
    public function index(){
        $Memebers = Member::get();
        return view('backend.members.index' , compact('Memebers'));
    }
    public function add(){
        return view('backend.members.add');
    }
    public function store(Request $res){
       $val = Validator::make(
           $res->all(),[
               'Name' => 'required|max:100',
               'password'=>'required|min:6',
               'email'=>'required|email',
               'photo'=>'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048',
               'Role'=>'required|min:3',
               'AboutYou'=>'required|min:100',
           ],
           [
                'Name.required'=> __('errors.Name.req'),
                'Name.max'=> __('errors.Name.max'),
                'password.required' => __('errors.password.req'),
                'password.min'=>__('errors.password.min'),
                'email.required'=>__('errors.email.req'),
                'email.email'=>__('errors.email.email'),
                'photo.required'=>__('errors.photo.req'),
                'photo.mimes'=>__('errors.photo.mimes'),
                'photo.max'=>__('errors.photo.max'),
                'Role.required'=>__('errors.Name.req'),
                'Role.min'=>__('errors.password.min'),
                'AboutYou.required'=>__('errors.Name.req'),
                'AboutYou.min'=>__('errors.password.min'),
           ]
       );
       if($val->fails()){
           return redirect()->back()->withErrors($val)->withInput();
       }else{
           $hashed = Hash::make($res->password, [
            'rounds' => 12,
            ]);
            $path = 'images/Members';
            $imageExten = $res->photo->getClientOriginalExtension();
            $imageName = $res->Name . '.' .$imageExten;
           $Member = Member::create([
               'Name'=>$res->Name,
               'email'=>$res->email,
               'photo'=>$imageName,
               'password'=>$hashed,
               'role'=>$res->Role,
               'about_You'=>$res->AboutYou,
           ]);
           if($Member){
               $res->photo->move($path , $imageName);
               return redirect()->back()->with(['Inserted' => __('sucess.inserted')]);
           }else{
               return redirect()->back()->with(['error'=>__('errors.errorInsertMem')]);
           }
       }
    }
    public function edit($id){
        $Member = Member::findOrFail($id);
        if($Member){
            return view('backend.members.edit' , compact('Member'));
        }
    }
    public function update(Request $res){
        $Member = Member::where('ID', $res->ID)->update([
            'Name'=>$res->Name,
            'email'=>$res->email,
        ]);
        if($Member){
            return redirect()->back()->with(['Updated' =>'Member Updated']);
        }else{
            return redirect()->back()->with(['error' => 'Error in Ipdating Member']);
        }
    }
    public function  delete($id){
        $member = Member::findOrFail($id);
        if($member){
            Member::where('id' , $id) -> delete();
            return redirect()->back()->with(['deleted' =>'Member deleted']);
        }
        else{
            return redirect()->back()->with(['errorIndelete' => 'Error in Ipdating Member']);
        }
    }
    public function all(){
        $Members = Member::select('members.ID as ID' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')->get();
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function getByCountry ($CountryID){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::where('CountryID' ,$CountryID )->get();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function getBasedOnSkill($skill){
        //$Members = Member::where('skills' ,'like' , '%' . $skill . '%')->get();
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        //return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function getBasedOnDepart($depart){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::select('members.ID as ID' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')
        ->where('job.CatID' , $depart)->get();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function showByName(Request $res){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::select('members.ID as ID' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')
        ->where('members.Name' ,'like', '%' . $res->Name . '%')->get();
        return view('front.members.search' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function showByJob(Request $res){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::select('members.ID as ID' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')
        ->where('job.Name' ,'like', '%' . $res->jobName . '%')->get();
        return view('front.members.search' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function showprofile($id){
        $skills = App('App\Http\Controllers\MemberSkillController')->get($id);
        $Works = Member::where('members.ID' , $id)->join('items' , 'items.User_id' , '=' , 'members.ID')->get();
        $member = Member::select('members.ID' , 'members.Name' , 'job.Name as JobName' , 'countries.Name as CName' , 'members.about_You')->
        join('job' , 'members.role' ,  '=' , 'job.ID')->join('countries' ,'members.CountryID' , '=' , 'countries.ID' )->findOrFail($id);
        return view('front.members.profile' , compact('member' , 'skills' , 'Works'));
    }
}