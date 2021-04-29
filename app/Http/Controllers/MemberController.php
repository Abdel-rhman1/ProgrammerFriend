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
               'photo'=>'required|image|mimes:png,jpg,jpeg,svg,gif|max:2048'
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
                'photo.max'=>__('errors.photo.max')

           ]
       );
       if($val->fails()){
           return redirect()->back()->withErrors($val)->withInput();
       }else{
           $hashed = Hash::make($res->password, [
            'rounds' => 12,
            ]);
           $Member = Member::create([
               'Name'=>$res->Name,
               'email'=>$res->email,
               'photo'=>$res->photo,
               'password'=>$hashed,
           ]);
           if($Member){
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
        return view('front.members.index');
    }
}
