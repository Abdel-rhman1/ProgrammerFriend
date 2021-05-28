<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Job;
use App\Models\Course;
use App\Models\Member;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $Items = Item::orderBy('ID','desc')->paginate(12);
        $jobs = Job::orderBy('ID','desc')->paginate(12);
        $courses = Course::orderBy('ID','desc')->paginate(12);
        $memberCount = Member::count();
        $ProjectCount = Item::count();
        $JobsCount = Job::count();
        $coursesNumber = Course::count();
        return view('front.home'  , compact('Items' , 'jobs' , 'courses' , 'memberCount' , 'ProjectCount' , 'JobsCount' , 'coursesNumber'));
    }
    public function aboutus(){
        return view('front.about');
    }
}
