<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Member;
use Illuminate\Http\Request;

use Validator;

class SettingController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $member = Member::findOrFail($id);
        return view("backend.Setting.index" , compact('member'));
    }

    public function updateSetting(Request $res){
        $val = Validator::make($res->all() , [
            'ComponyOwner'=>'digits:1',
            'Industry'=>'required|max:30|min:5',
            'role'=>'required|max:30|min:5',
            'about_You'=>'required',
            'Viedo'=>'nullable|url',
        ]);
        
        if($val->fails()){
            //return redirect()->back()->withErrors($val)->withInputs();
            // return redirect()->back()->withErrors($validate)
            return redirect()->back()->withErrors($val)->withInputs();
        }
        $data = $res->except('_token');
        //return  $data;
       $member = Member::where('id' , Auth::user()->id)->update( $data);
       if($member){
           return redirect()->back()->with(['message'=>'Your Info Updated Successfully']);
       }else{
            return redirect()->back()->with(['message'=>'Error In Updating Your Data']);
       }
    }

    function updateSkill(Request $re){
        
        $member = Member::where('id' , Auth::user()->id)->update(['Skills'=>$re->Skills]);
        if($member){
            return redirect()->back()->with(['message'=>'Your Skills Updated Successfully']);
        }else{
             return redirect()->back()->with(['message'=>'Error In Updating Your Skills']);
        }
    }

}
