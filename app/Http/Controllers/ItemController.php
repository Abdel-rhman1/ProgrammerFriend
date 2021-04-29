<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Validator;
class ItemController extends Controller
{
    public function index(){
        $Items = Item::where('visiable' , 1)->get();
        return view('backend.items.index' , compact('Items'));
    }
    public function add(){
        return view('backend.items.add');
    }
    public function store(Request $res){
        $val = Validator::make($res->all(),[
            'Name'=>'required',
            'Url'=>'required',
            'contribute'=>'required',
            'details'=>'required',
            'startTime'=>'required|date',
            'EndTime'=>'required|date',
        ],[
            'Name.required'=>'This field Is Must',
            
            'Url.required'=>'This field is Must',
            
            'contribute.required'=>'This field Is Must',
            
            'details.required'=>'This is field is Must',
            
            'startTime.required'=>'This field Is required',
            'startTime.date'=>'This is must to be date',
            'EndTime.required'=>'This is field is required',
            'EndTime.date'=>'This is Must to be date',
        ]);
        if($val->fails()){
            return redirect()->back()->withErrors($val)->withInput();
        }else{

            $item=Item::create([
                'Name'=>$res->Name,
                'rul'=>$res->Url,
                'contributes'=>$res->contribute,
                'details'=>$res->details,
                'start_time'=>$res->startTime,
                'end_time'=>$res->EndTime,
            ]);
            if($item){
                return redirect()->back()->with(['Inserted'=>'New Item Is Inserted Successfuly']);
            }else{
                return redirect()->back()->with(['error'=>'Error In Inserted New Item']);
            }
        }
    }
    public function edit($id){
        //$item::findOrFails($id);
        $items = Item::findOrFail($id);
        //return $items;
       if($items) return view('backend.items.edit' , compact('items'));
       else{

       }
    }
    public function delete($id){
        return $id;
    }
}
