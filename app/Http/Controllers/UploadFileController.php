<?php

namespace App\Http\Controllers;
use App\Models\Doc;
use Illuminate\Http\Request;

class UploadFileController extends Controller
{
    public function index(){
        return view('backend.courses.progress-bar-file-upload');
    }
    public function store(Request $request)
    {
       // 'id','title','type','lessonNum','courseId'
       return "Hello";
    }
}
