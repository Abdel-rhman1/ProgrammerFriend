@include("backend.layouts.header")
@section('title')
    Members
@stop
@include('backend.layouts.navbar')
<div class="container my-5 p-3">
    <div class="d-flex justify-content-start">
        <h2 class="h4 text-muted p-3">    
            ملفي الشخصي
        </h2>
    </div>
    
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
                <div class="d-flex justify-content-start align-items-center">
                    <p class="p-3" style="font-size: 17px !important">
                        {{__('dashboard.setting')}}
                      
                    </p>
                    <hr>
                </div>
                <div class="selected d-flex justify-content-start align-items-center" style="cursor: pointer;">
                    <p class="px-3 py-1 " style="font-size: 17px !important">
                        ملفي الشخصي 
                    </p>
                </div>
                <div class="settingItem d-flex justify-content-start align-items-center" style="cursor: pointer;">
                    <p class="px-3 py-1" style="font-size: 17px !important">
                        مهاراتي 
                    </p>
                </div>
                <div class="settingItem d-flex justify-content-start align-items-center" style="cursor: pointer;">
                    <p class="px-3 py-1" style="font-size: 17px !important">
                        تنبيعاتي
                    </p>
                </div>
            </div>
           

        </div>
    </div>
        <div class="col-sm-8 my-5 pt-3 pb-3" >
            <div class="p-3" style="background-color: #fff ; border:3px solid #fff">
                <div >
                    <div class="head d-flex justify-content-start">
                        <p>
                            نوع الحساب <span class="text-danger">*</span>
                        </p>
                    </div>
                    
                    <div class="d-flex justify-content-start align-items-center px-3 my-1">
                       @if($member->ComponyOwner==0)
                        <input type="checkbox" checked name="type"> 
                            صاحب مشاريع (أبحث عن مستقلين لتنفيذ مشاريعي)
                        @else
                        <input type="checkbox"  name="type"> 
                            صاحب مشاريع (أبحث عن مستقلين لتنفيذ مشاريعي)
                        
                        @endif
                    </div>             
                   
                     <div class="d-flex justify-content-start align-items-center px-3 my-1">
                        @if($member->ComponyOwner==1) 
                        <input type="checkbox" checked  name="type"> 
                            مستقل (أبحث عن مشاريع لتنفيذها)
                        @else
                        <input type="checkbox"  name="type"> 
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
                                <input type="text"  value="{{ $member->Industry }}" id="input" class="form-control">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group"> 
                                <label class="label-control d-flex justify-content-start" for="input">
                                    المسمى الوظيفي  <span class="text-danger">*<span>
                                </label>
                                <input type="text" value="{{ $member->role }}" id="input" class="form-control">
                            </div>
                        </div>
                    </div>
                    
                </div>    
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="textArea"  class="label-control d-flex justify-content-start">
                                    النبذة التعريفية
                                    <span class="text-danger">
                                        *
                                    </span>
                                </label>
                                <textarea id="textArea" class="form-control" cols="7" rows="7">{{ $member->about_You }}</textarea>
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
                            <input type="text" value="" id="input" class="form-control col-sm-12">
                        </div>
                    </div>
                </div>
                <div class="form-group m-3 d-flex justify-content-start">
                    <span class="btn btn-primary">
                        Save
                    </span>
            </div>
            </div>
            

        </div>       
    </div>
    <div class="row">
        
       
    </div>
</div>

@include('backend.layouts.footer')