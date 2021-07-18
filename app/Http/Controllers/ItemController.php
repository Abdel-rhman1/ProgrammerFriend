<?php

namespace App\Http\Controllers;
use App\Http\Controllers\SkillController;
use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Like;
use Validator;
use Auth;
use Illuminate\Support\Facades\File; 

//use App\Http\Controllers\LikeController;
class ItemController extends Controller
{
    public function index($id){
        $Items = Item::where('CatID' , $id
            )->paginate(7);
        return view('backend.items.index' , compact('Items'));
    }
    public function addnewItem(){
        return view('front.items.add');
    }   
    public function add(){
        return view('backend.items.add');
    }
    public function getBasedOnDate($date){
        //$sql = "DATEDIFF(items.end_time, '".date('Y-m-d')."' ) < 30";
        $dateIN = 0;
        $items;
        if($date == 'M'){
            $dateIN = 30;
        }else if ($date == 'W'){
            $dateIN = 7;
        }else if($date == '3M'){
            $dateIN = 90;
        }else if($date == 'Y'){
            $dateIN = 365;
        }
        $ID = 1;
        if($date != 'All'){
            $sql = "(DATEDIFF('".date('Y-m-d')."' , items.end_time)) < " . $dateIN;
            $items =  Item::whereRaw( $sql )->where('CaTID' , $ID)->get();
        }else{
            $items = Item::get();
        }
        $skills = app('App\Http\Controllers\SkillController')->indexCollection();

        return view ('front.items.index' , compact('ID','items' , 'skills'));

    }
    public function ShowByName(Request $res){
        $items = Item::where('Name' ,'like' ,  '%' . $res->Name . '%')->paginate(10);
        $ID = 1;
        $skills = app('App\Http\Controllers\SkillController')->indexCollection();
        //return $Items;
        return view ('front.items.search' , compact('ID','items' , 'skills'));
    }
    public function getByCat($catId  , $name=''){
        $items = Item::where([
            ['CatID' , $catId ],
            ['skills', 'like' , '%' . $name . '%']
        ])->paginate(10);
        $skills = app('App\Http\Controllers\SkillController')->indexCollection();
        $ID  = $catId;
       //return redirect()->to('/Items/index/' . $catId)->with(['items' => $items , 'Skills' => $skills]);
        return view('front.items.index', compact( 'ID' , 'items' , 'skills'));
    }
    public function store(Request $res){
        $val = Validator::make($res->all(),[
            'Name'=>'required',
            'Url'=>'required',
            'photo'=>'required|image|mimes:png,jpg,jgeg,gif|max:2048',
            'skills'=>'required|min:3',
            'contribute'=>'required',
            'details'=>'required',
            'startTime'=>'required|date',
            'EndTime'=>'required|date',
        ],[
            'Name.required'=>'This field Is Must',
            
            'Url.required'=>'This field is Must',
            'skills.required'=>"Skills Musn't be less than 3 chrarters",
            'skills.min'=>"Skills Musn't be empty",
            'photo.required'=>'photo is rquired',
            'photo.image'=>'this file must be image',
            'photo.max'=>'the image size is Not Allowed',
            'contribute.required'=>'This field Is Must',
            'details.required'=>'This is field is Must',
            'startTime.required'=>'This field Is required',
            'startTime.date'=>'This is must to be date',
            'EndTime.required'=>'This is field is required',
            'EndTime.date'=>'This is Must to be date',
        ]);
        
        if($val->fails() || !filter_var($res->Url , FILTER_VALIDATE_URL)){
            $errors['url'] = 'This field Must be Url';
            return redirect()->back()->withErrors($val)->withInput();
        }else{
            $path = 'images/Items';
            $file_exten = $res->photo->getClientOriginalExtension();
            $imageName =$res->Name.'.'. $file_exten;
            $item=Item::create([
                'Name'=>$res->Name,
                'rul'=>$res->Url,
                'skills'=>$res->skills,
                'photo'=>$imageName,
                'contributes'=>$res->contribute,
                'details'=>$res->details,
                'start_time'=>$res->startTime,
                'end_time'=>$res->EndTime,
            ]);
            $res->photo ->move($path , $imageName);
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
    public function update(Request $res){
        $id  = $res->ID;
        $val2 = Validator::make($res->all(),[
            'Name'=>'required',
            'Url'=>'required',
            'skills'=>'required|min:3',
            'contribute'=>'required',
            'details'=>'required',
            'startTime'=>'required|date',
            'EndTime'=>'required|date',
        ],[
            'Name.required'=>'This field Is Must',
            'Url.required'=>'This field is Must',
            'skills.required'=>"Skills Musn't be less than 3 chrarters",
            'skills.min'=>"Skills Musn't be empty",
            'contribute.required'=>'This field Is Must',
            'details.required'=>'This is field is Must',
            'startTime.required'=>'This field Is required',
            'startTime.date'=>'This is must to be date',
            'EndTime.required'=>'This is field is required',
            'EndTime.date'=>'This is Must to be date',
        ]);    
        
        if($val2->fails()){
            $errors['url'] = 'This field Must be Url';
            return "Eror In validation";
            return redirect()->back()->withErrors($val2)->withInput();
        }else{
            Item::where('ID' , $id)->update([
                'Name'=>$res->Name,
                'rul'=>$res->Url,
                'skills'=>$res->skills,
                'contributes'=>$res->contribute,
                'details'=>$res->details,
                'start_time'=>$res->startTime,
                'end_time'=>$res->EndTime,
            ]);
            return redirect()->back()->with(['Inserted'=>'This Item Is Updated Successfuly']);
        }
    }
    public function delete($id){
        Item::findOrFail($id);
        $item = Item::where('ID' , $id)->delete();
       
        File::delete(public_path('/images/Items/').'/'.$Item->photo);
        if($item) return redirect()->back()->with(['deleted'=>'Item deleted']);
        else return redirect()->back()->with(['error'=>'Error In deleting Item']);

    }
    public function showItemPage($id){
        $item = Item::findOrFail($id);
        $View = $item->Views;
        Item::where('ID' , $id)->update([
            'Views'=> $View+1,
        ]);
        if($item) {
            return view('front.items.show' , compact('item'));
        }
    }
    public function IncreaemntLikes(Request $res){
       if(Like::where([
        'ItemID'=>$res->ID,
        'MemberID'=>Auth::user()->id,
    ])->count()){
        return -1;
    }else{
        $likes = Item::where('ID' , $res->ID)->get();
        $lik = $likes[0]->Likes;
        Item::where('ID' , $res->ID)->update([
            'Likes' => $lik+1,
        ]);
        Like::create([
            'ItemID'=>$res->ID,
            'MemberID'=>Auth::user()->id,
            'Date'=>now(),
        ]);
    }
        return true;       
    }
}
