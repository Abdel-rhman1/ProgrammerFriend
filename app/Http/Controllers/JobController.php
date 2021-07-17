<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Validator;
class JobController extends Controller
{
    
    public function index(){
        $jobs = Job::paginate(7);
        return view('backend.jobs.index' , compact('jobs'));
    }
    public function add(){
        return view('backend.jobs.add');
    }
    public function edit($id){
        $job = Job::findOrFail($id);
        return view('backend.jobs.edit' , compact('job'));
    }
    public function store(Request $res){
        $val = Validator::make($res->all() , [
            'Name'=>'required',
            'Description'=>'required|min:20',
            'skills'=>'required|min:3',
            'email'=>'required|email',
            'Date'=>'required|date',
        ],[
            'Name.required'=>'Name is Required',
            'Description.required'=>'Description Is Required',
            'Description.min'=>'Description Is Minimum 3 Characters',
            'skills.required'=>'Skills Is required',
            'skills.min'=>'Skills Is Minimum 3 charaters',
            'email.required'=>'email Is required',
            'email.email'=>'This Field Is Must be Email',
            'Date.required'=>'Date IS Required',
            'Date.date'=>'This Field Is must be type of date',
        ]);
        if($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }else{
            $job = job::create([
                'Name'=>$res->Name,
                'description'=>$res->Description,
                'skills'=>$res->skills,
                'Posteremail'=>$res->email,
                'InValidUpTo'=>$res->Date,
            ]);
            if($job){
                return redirect()->back()->with(['Inserted'=>'New Item Is Inserted Successfuly']);
            }else{
                return redirect()->back()->with(['error'=>'Error In Inserted New Item']);
            }
        }
    }
    public function update(Request $res){
        $val = Validator::make($res->all() , [
            'Name'=>'required',
            'Description'=>'required|min:20',
            'skills'=>'required|min:3',
            'email'=>'required|email',
            'Date'=>'required|date',
        ],[
            'Name.required'=>'Name is Required',
            'Description.required'=>'Description Is Required',
            'Description.min'=>'Description Is Minimum 3 Characters',
            'skills.required'=>'Skills Is required',
            'skills.min'=>'Skills Is Minimum 3 charaters',
            'email.required'=>'email Is required',
            'email.email'=>'This Field Is Must be Email',
            'Date.required'=>'Date IS Required',
            'Date.date'=>'This Field Is must be type of date',
        ]);
        if($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }else{
            $job = job::where('ID' , $res->ID)->update([
                'Name'=>$res->Name,
                'description'=>$res->Description,
                'skills'=>$res->skills,
                'Posteremail'=>$res->email,
                'InValidUpTo'=>$res->Date,
            ]);
            if($job){
                return redirect()->back()->with(['Updated'=>'This  Item Is Updated Successfuly']);
            }else{
                return redirect()->back()->with(['error'=>'Error In Updating This Item']);
            }
        }
    }
    public function delete($id){
        $job = Job::findOrFail($id);
        $jobs = Job::where('ID' , $id)->delete();
        if($jobs){
            return redirect()->back()->with(['deleted'=>'This  Item Is deleted Successfuly']);
        }else{
            return redirect()->back()->with(['error'=>'Error In Deleting This Item']);
        }
    }
}
