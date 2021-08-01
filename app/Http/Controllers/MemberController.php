<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Member;
use Validator;
use Auth;

use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    
    public function login(){
        return view('auth.admin_login');
    }
    public function getavatar(){
        $member =  Member::where('id' , Auth::user()->id)->get();
        return  view('front.members.image' , compact('member'));
    }
    public function save(Request $res){
        $val = Validator::make($res->all(),[
            'email'=> 'bail|required',
            'password' => 'required|min:6',
        ],[
            'email.required' => 'mail is required',
            //'email.email' =>'email must contain @ and .' ,
            'password.required'=>'password is required',
            'password.min'=>'password must be greater than 6 characters',
        ]);
        if($val->fails()){
            return redirect()->back()->witherrors($val)->withInputs($res->all());
        }
        if(Auth::guard('member')->attempt(['email'=> $res->email , 'password'=> $res->password])){
            return view('backend.index');
        }else{
            return back()->withInput($res->only('email'));
        }
    }
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
               'Role'=>'required|min:1',
               'AboutYou'=>'required|min:50',
               'cv'=>'required',
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
                'cv.required'=>'your is required',
           ]
       );
       if($val->fails()){
           return redirect()->back()->withErrors($val)->withInput();
       }else{
           $hashed = Hash::make($res->password, [
            'rounds' => 12,
            ]);
            $path = 'images/Members';
            $cvpath = 'cvs';
            $cvExtension = $res->cv->getClientOriginalExtension();
            $cvName = $res->Name . '.' . $cvExtension;
            $imageExten = $res->photo->getClientOriginalExtension();
            $imageName = $res->Name . '.' .$imageExten;
           $Member = Member::create([
               'Name'=>$res->Name,
               'email'=>$res->email,
               'photo'=>$imageName,
               'password'=>$hashed,
               'role'=>$res->Role,
               'about_You'=>$res->AboutYou,
               'remember_token'=>$res->_token,
               'cv'=>$cvName,
           ]);
           if($Member){
               $res->photo->move($path , $imageName);
               $res->cv->move($cvpath , $cvName);
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
        $Members = Member::select('members.id as id' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')->get();
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function getbyCountry ($CountryID){
        //return "Hello";
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::where('CountryID' ,$CountryID )->get();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function getBasedOnSkill($skill){
        $Members = Member::where('skills' ,'like' , '%' . $skill . '%')->get();
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function getBasedOnDepart($depart){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::select('members.id as id' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')
        ->where('job.CatID' , $depart)->get();
        return view('front.members.index' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function showByName(Request $res){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::select('members.id as id' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')
        ->where('members.Name' ,'like', '%' . $res->Name . '%')->get();
        return view('front.members.search' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function showByJob(Request $res){
        $Cats = App('App\Http\Controllers\CategorieController')->index();
        $Countries = App('App\Http\Controllers\CountriesController')->index();
        $skills = App('App\Http\Controllers\SkillController')->indexCollection();
        $Members = Member::select('members.id as id' , 'members.Name' 
        , 'job.Name as Jobname' , 'members.photo as photo' , 'members.about_You as about_You')
        ->join('job' , 'job.ID' , '=' , 'members.role')
        ->where('job.Name' ,'like', '%' . $res->jobName . '%')->get();
        return view('front.members.search' , compact('Members' ,'Cats' , 'skills' , 'Countries'));
    }
    public function showprofile($id){
     
        $code = app('App\Http\Controllers\QrcodeController')->generate(url()->current() , $id);
        $skills = App('App\Http\Controllers\MemberSkillController')->get($id);
        $Works = Member::where('members.id' , $id)->join('items' , 'items.User_id' , '=' , 'members.id')->get();
        $member = Member::select('members.id' , 'members.Name' ,'members.photo' , 'job.Name as JobName' , 'countries.Name as CName' , 'members.about_You')->
        join('job' , 'members.role' ,  '=' , 'job.ID')->join('countries' ,'members.CountryID' , '=' , 'countries.ID' )->findOrFail($id);
        return view('front.members.profile' , compact('member' , 'skills' , 'Works' , 'code'));
    }
    public function hireMy($id){
        $data = [
            'user_id' => Auth::id(),
            'name'=>Auth::user() -> Name,
        
            'mail'=>Auth::user()->email,
        ];
        app('App\Http\Controllers\MailController')->sendEmail2($data , 'yousef777906@gmail.com' , 'Some One Request You for Job');
    }
}