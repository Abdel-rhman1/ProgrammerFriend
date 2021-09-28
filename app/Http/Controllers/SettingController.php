<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Member;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $member = Member::findOrFail($id);
        return view("backend.Setting.index" , compact('member'));
    }
}
