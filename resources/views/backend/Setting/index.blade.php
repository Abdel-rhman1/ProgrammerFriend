@include("backend.layouts.header")
@section('title')
    Members
@stop
@include('backend.layouts.navbar')
<div class="container my-5 p-3">
   
        <div class="d-flex justify-content-start">
            <h2 class="h4 text-muted p-3 ">    
                ملفي الشخصي
            </h2>
        </div>
        @if(Session::has('message'))
            <div class="text-center alert alert-info" id="Message">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-sm-4">
                <div class="d-flex flex-column">
                    <div class="col-sm-12 mt-5 p-3" style="">
                        <div class="p-3" style="background-color: #fff">
                            <div class="w-100 d-flex justify-content-center align-item-center">
                                <img class="m-auto rounded-circle" width="100" height="100" alt="{{ $member->Name }}" src="{{ asset("images/Members/" . $member->photo) }}">
                            </div>
                            <p class="text-center text-muted mt-4" style="color:#5a5b5b!important">
                                {{ $member->Name }}
                            </p>
                            <hr class="customhr" height="20px !important">
                            <span class="text-center">
                                <i class="fa fa-external-link" aria-hidden="true"></i>
            
                            </span>
                        </div>
                    </div>
            </div>
        
            <div class="col-sm-12 my-2 p-3">
                <div class="" style="background-color: #fff ; border:3px solid #fff">
                    <div class=" d-flex justify-content-start align-items-center">
                        <p class="p-3" style="font-size: 17px !important">
                            {{__('dashboard.setting')}}
                        
                        </p>
                        <hr>
                    </div>
                    <div class="settingItem Info selected d-flex justify-content-start align-items-center" style="cursor: pointer;">
                        <p class="px-3 py-1 " style="font-size: 17px !important">
                            ملفي الشخصي 
                        </p>
                    </div>
                    <div class="settingItem skill d-flex justify-content-start align-items-center" style="cursor: pointer;">
                        <p class="px-3 py-1 d-flex  align-items-center" style="font-size: 17px !important">
                            مهاراتي 
                        </p>
                    </div>
                    <div class="settingItem Noti d-flex justify-content-start align-items-center" style="cursor: pointer;">
                        <p class="px-3 py-1" style="font-size: 17px !important">
                            تنبيعاتي
                        </p>
                    </div>
                </div>
            

            </div>
        </div>
        <div class="personal-Info col-8">
            <div class="col-sm-12 my-5 pt-3 pb-3" >
                <form action="{{ route('updateSetting') }}" method="post">
                    @csrf
                    <div class="p-3" style="background-color: #fff ; border:3px solid #fff">
                        <div >
                            <div class="head d-flex justify-content-start">
                                <p>
                                    نوع الحساب <span class="text-danger">*</span>
                                </p>
                            </div>
                            <div class="d-flex justify-content-start align-items-center px-3 my-1">
                            @if($member->ComponyOwner==0)
                                <input value="0" type="checkbox" checked name="ComponyOwner"> 
                                    صاحب مشاريع (أبحث عن مستقلين لتنفيذ مشاريعي)
                                @else
                                <input value="1" type="checkbox"  name="ComponyOwner"> 
                                    صاحب مشاريع (أبحث عن مستقلين لتنفيذ مشاريعي)
                                
                                @endif
                            </div>             
                        
                            <div class="d-flex justify-content-start align-items-center px-3 my-1">
                                @if($member->ComponyOwner==1) 
                                <input value="1" type="checkbox" checked  name="ComponyOwner"> 
                                    مستقل (أبحث عن مشاريع لتنفيذها)
                                @else
                                <input value="0" type="checkbox"  name="ComponyOwner"> 
                                    مستقل (أبحث عن مشاريع لتنفيذها)
                                @endif
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group "> 
                                        <label class="label-control d-flex justify-content-start" for="input">
                                            التخصص  <span class="text-danger">*<span>
                                        </label>
                                        <input name="Industry" type="text"  value="{{ $member->Industry }}" id="input" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group"> 
                                        <label class="label-control d-flex justify-content-start" for="input">
                                            المسمى الوظيفي  <span class="text-danger">*<span>
                                        </label>
                                        <input name="role" type="text" value="{{ $member->role }}" id="input" class="form-control">
                                    </div>
                                </div>
                            </div>
                            
                        </div>    
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label  for="textArea"  class="label-control d-flex justify-content-start">
                                            النبذة التعريفية
                                            <span class="text-danger">
                                                *
                                            </span>
                                        </label>
                                        <textarea name="about_You" id="textArea" class="form-control" cols="7" rows="7">{{ $member->about_You }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>  
                        <div class="col-12">
                            <div class="row">
                                <div class="form-group col-sm-12"> 
                                    <label class="label-control d-flex justify-content-start" for="input">
                                        الفيديو التعريفي
                                        <span class="text-danger">*<span>
                                    </label>
                                    <input name="Viedo" type="text" value="" id="input" class="form-control col-sm-12">
                                </div>
                            </div>
                        </div>
                        <div class="form-group m-3 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary">
                                Save
                            </button>
                    </div>
                </form>
                </div>
                

            </div>       
        </div>

        <div class="personal-skill col-sm-8">
                <div class="my-5 pt-3 pb-3 ">
                    <div class="p-3" style="background-color: #fff ; border:3px solid #fff">
                        <div class="skills">
                            <div class="form-group">
                                <label for="YouSkillInput" class="control-label d-flex justify-content-start">
                                    Skills
                                </label>
                                <div class=''>
                                               
                                    <div  style="display:block;max-height: 200px ; min-height:40px ; overflow-y:auto ; height:auto " id="skillSpan" 
                                    class=" form-control" id="YouSkillInput" rows="6" cols="6">
                                    
                                         
                                    <div class="skills" style="display:inline !important">
                                            
                                    </div>
                                        <input class="form-control searchSkill" type="text"  style="border:none !important ; display:inline !important">
                                    </div>
                                   
                                </div>
                                
                            </div>
                            <div  class="skilldetails w-100 my-2 " style="max-height: 200px ; min-height:40px ; overflow-y:auto ; height:auto;border:2px solid #ddd;padding-buttom:30px !important">
                                <p></p>
                            </div>
                        </div>
                        <div class="my-4">
                            <form action="{{ route('updateSkills') }}" method="post">
                                @csrf
                                <input type="text" name="Skills" hidden id="skillInput">
                                <input type="submit" id="SaveSkills" value="Save" class="btn btn-info">
                            </form>    
                            
                        </div>
                    </div>
                     
            </div>
        </div>
</div>

</div>

@include('backend.layouts.footer')