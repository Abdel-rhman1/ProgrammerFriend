<?php

namespace App\Http\Controllers\front;
use App\Models\Course;
use App\Models\Member;
use App\Models\Categorie;
use App\Models\Doc;
use Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class CourseController extends Controller
{
    
    public function index(){
        $courses = Course::select('courses.ID as CID' , 'members.ID as MID','courses.Name as CName' ,'courses.photo as Cphoto' , 'courses.Date' , 'courses.Price as CPrice' , 'members.Name as MName')
        ->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->get();
        $departs = Categorie::select('categories.Name' , 'categories.ID')->get();
        return view('front.courses.index' , compact('courses' , 'departs'));
    }
    public function addNewCourse(){
        $members = Member::get();
        return view('front.courses.add' , compact('members'));
    }
    public function showCourseProfile($id){
        $course = Course::select('courses.ID as CID' ,'courses.taken as Ctoken' ,'members.ID as MID','courses.Name as CName' ,'courses.photo as Cphoto' , 'courses.Date' , 'courses.Price as CPrice' , 'members.Name as MName')
        ->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->where('courses.ID' , '=' , $id)->get();
        $contents = Doc::where('courseId' , $id)->get();
        return view('front.courses.courseShow' , compact('course' , 'contents'));
    }
    public function showByprice(Request $res){
        $courses = Course::select('courses.ID as CID' , 'courses.taken as Ctoken', 'members.ID as MID','courses.Name as CName' ,'courses.photo as Cphoto' , 'courses.Date' , 'courses.Price as CPrice' , 'members.Name as MName')
        ->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->where('Price' , '<=' , $res->price)->get();
        return view('front.courses.search' , compact('courses'));
    }
    public function showByCat(Request $res){
       
        $courses = Course::select('courses.ID as CID' , 'members.ID as MID','courses.Name as CName' ,'courses.photo as Cphoto' , 'courses.Date' , 'courses.Price as CPrice' , 'members.Name as MName')
        ->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->where('CatID' , '=' , $res->depart)->get();
       return view('front.courses.search' , compact('courses'));
    }
    public function showByName(Request $res){
       // return $res->Name;
        $courses = Course::select('courses.ID as CID' , 'members.ID as MID','courses.Name as CName' ,'courses.photo as Cphoto' , 'courses.Date' , 'courses.Price as CPrice' , 'members.Name as MName')
        ->join('members' , 'members.ID' , '=' , 'courses.InstructorID')->where('courses.Name' , 'like' , '%' . $res->Name . '%')->get();
       return view('front.courses.search' , compact('courses'));
    }
    public function getByDepartment($id){

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
        $cor = Course::where('ID' , $id)->delete();
        if($cor){
            return redirect()->back()->with(['deleted'=>'This Course is deleted']);
        }else{
            return redirect()->back()->with(['error'=>'Error In Deleting This Course']);
        }
    }
    public function addnewCOntent(Request $res){
        $id = $res->id;
        return view('front.courses.addContent' , compact('id'));
    }
    public function upload(Request $res){
        $val = Validator::make($res->all() , [
            'lessonNmber'=>'required|Numeric',
            'lessonType'=>'required',
            'Item'=>'required|File|mimes:mp3,mp4,c,pdf,exe',
        ] , [
            'lessonNmber.required'=>'The Lesson Number Is required',
            'lessonNmber.Numeric'=>'The Lesson number be Integer',
            'lessonType.required'=>'The Lesson Type Is Required',
            'Item.required'=>'The Item is Required',
            'Item.mimes'=>'This extension Is Invalid',
        ]);
        if($val->fails() ){
            return redirect()->back()->withErrors($val)->withInput();
        }else{
            if($res->hasFile('Item')){ 
                $filenameWithExt    = $res->file('Item')->getClientOriginalName();
                $filename           = pathinfo($filenameWithExt, PATHINFO_FILENAME);
                $extension          = $res->file('Item')->getClientOriginalExtension();
                
                $fileNameToStore    = $filename.'_'.time().'.'.$extension;
                $path               = $res->file('Item')->move('docs', $fileNameToStore); 
                if($extension !== $res->lessonType && $res->lessonType!='other'){
                    return  "Dismatching Extension";
                }
            }else{
                return "Error No File";
            }
            Doc::create([
                'title'=>$fileNameToStore,
                'type'=>$extension,
                'lessonNum'=>$res->lessonNmber,
                'courseId'=>$res->id,
            ]);
        }
    }
}
