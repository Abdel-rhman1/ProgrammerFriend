<?php

namespace App\Http\Controllers;
use App\Models\Course;
use App\Models\Doc;
use App\Models\Member;
use App\Models\exports;
use Auth;
use Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File; 

class CourseController extends Controller
{
    
    public function index(){
        $courses = Course::select('courses.ID as CID','members.ID as MID','courses.Name as CName' , 'courses.Date' , 'courses.Price as CPrice' , 'members.Name as MName')
        ->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->paginate(10);
        return view('backend.courses.index' , compact('courses'));
    }
    public function modify($id){
        $Contents = Doc::where('courseId' , $id)->get();
        return view('backend.courses.content' ,compact ('Contents'));
    }
    public function add(){
        $members = Member::get();
        return view('backend.courses.add' , compact('members'));
    }
    public function store(Request $res){
        $validat = Validator::make($res->all() , [
            'Name'=>'required',
            'photo'=>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            'selectInstructor'=>'required',
            'details'=>'required',
            'price'=>'required'
        ],[
            'Name.required'=>'Name Is rquired',
            'photo.required'=>'photo is required',
            'photo.image'=>'This file Must Be Image',
            'photo.mimes'=>'file exten must be png , jpg , jpeg , giv',
            'photo.max'=>'photo size must less than 2M',
            'selectInstructor.required'=>'Instructor Name be is required',
            'details.required'=>'details is required',
            'price.required'=>'Course Price Musnt Empty',
        ]);
        if($validat->fails()){
            return redirect()->back()->withErrors($validat)->withInput();
        }else{
            $imageExt = $res->photo->getClientOriginalExtension();
            $imageName = time() . '.' . $imageExt;                        
            $cor = Course::create([
                'Name'=> $res->Name,
                'photo'=>$imageName,
                'InstructorID'=>$res->selectInstructor,
                'details'=>$res->details,
                'Date'=> now(),
                'Price'=>$res->price,
            ]);
            $res->photo->move('images/courses' , $imageName);
            if($cor)
                return redirect()->back()->with(['Inserted'=>'New Course was added']);
            else
                return redirect()->back()->with(['error'=>'Error In adding This Course']);
        }
    }
    public function edit($id){
        $course = Course::select('courses.Name as CName' , 'courses.Price as Cprice','courses.ID as CID', 'courses.photo as Cphoto' , 'courses.details as Cdetails' , 'members.ID as MID','members.Name as MName' , 'courses.Date as CDate')->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->where('courses.ID' , $id)->get();
        $members = Member::get();
        return view('backend.courses.edit' , compact('course' , 'members'));
    }
    public function update(Request $res){
        $validat = Validator::make($res->all() , [
            'Name'=>'required',
            'photo'=>'required|image|mimes:png,jpg,jpeg,gif|max:2048',
            'selectInstructor'=>'required',
            'details'=>'required',
            'price'=>'required'
        ],[
            'Name.required'=>'Name Is rquired',
            'photo.required'=>'photo is required',
            'photo.image'=>'This file Must Be Image',
            'photo.mimes'=>'file exten must be png , jpg , jpeg , giv',
            'photo.max'=>'photo size must less than 2M',
            'selectInstructor.required'=>'Instructor Name be is required',
            'details.required'=>'details is required',
            'price.required'=>'Course Price Musnt Empty',
        ]);
        if($validat->fails()){
            return redirect()->back()->withErrors($validat)->withInput();
        }else{
            $imageExt = $res->photo->getClientOriginalExtension();
            $imageName = time() . '.' . $imageExt;       
            $cor = Course::where('ID' , $res->ID)->update([
                'Name'=> $res->Name,
                'photo'=>$imageName,
                'InstructorID'=>$res->selectInstructor,
                'details'=>$res->details,
                'Price'=>$res->price,
                'Date'=> now(),
                
            ]);
            $res->photo->move('images/courses' , $imageName);
            if($cor)
                return redirect()->back()->with(['updated'=>'This Course is added']);
            else
                return redirect()->back()->with(['error'=>'Error In updating This Course']);
        }
    }

    public function delete($id){
        $cor = Course::findOrFail($id);
        //return asset('/images/courses/').'/'.$cor->photo;
        File::delete(public_path('/images/courses/').'/'.$cor->photo);
        $cor = Course::where('ID' , $id)->delete();
        if($cor){
            
            //File::delete(public_path('upload/bio.png'));
            return redirect()->back()->with(['deleted'=>'This Course is deleted']);
        }else{
            return redirect()->back()->with(['error'=>'Error In Deleting This Course']);
        }
    }

    public function ecportingExcel(){
        // return "Hello World";
        $cvData = array("Name,details ,Instructor , Price , TokenBy , Date");
        $members = Course::select('courses.Name as CName' , 'courses.details' , 'members.Name as Mname' , 'courses.Price' ,'courses.taken', 'courses.created_at')->join('members' , 'members.id' ,'=' , 'courses.InstructorID')->get();
       for($i=0;$i<count($members);$i++){
           $cvData [] = $members[$i]->CName .','. $members[$i]->details . ',' 
           . $members[$i]->Mname . ',' . $members[$i]->Price . ',' . $members[$i]->taken  . ',' . $members[$i]->created_at;
       }
        // return $cvData;

        $filename= date('Ymd').'-'.date('his').".csv";
        $file_path= public_path().'/exports/'.$filename;
        $file = fopen($file_path, "w+");
        foreach ($cvData as $cellData){
           fputcsv($file, explode(',', $cellData));
        }
        fclose($file);
        exports::create([
            'Name'=>$filename,
            'type'=>"courses",
            'date'=>now(),
            'user_id'=>Auth::user()->id,
        ]);

        return response()->download(('exports/').'/'.$filename);
        //return redirect()->back()->with('message', 'Member Excel created successfully! Please download the initial file to complete it.');
    }
}
