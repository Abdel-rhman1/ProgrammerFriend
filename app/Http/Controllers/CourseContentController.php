<?php

namespace App\Http\Controllers;
use App\Models\Doc;
use Illuminate\Http\Request;

class CourseContentController extends Controller
{
    public function modify($id){
        $Contents = Doc::where('id' , $id)->get();
         return view('backend.courses.content' ,compact ('Contents'));
     }
}
