
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}"> {{__('header.home_page')}} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#"> </a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('header.serveices')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('getById' , [1  , ''])}}">{{__('header.ser1')}}</a>
                    <a class="dropdown-item" href="{{route('getById' , [2  , ''])}}">{{__('header.ser2')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('getById' , [3  , ''])}}">{{__('header.ser3')}}</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('allProg')}}">{{__('header.prog')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('Course.index')}}">{{__('header.cor')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('aboutus')}}">{{__('header.about')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('index.job')}}">{{__('Jobs')}}</a>
            </li>

            
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('header.lang')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('locale', ['ar'])}}">{{__('header.lan1')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('locale' , ['en'])}}">{{__('header.lan2')}}</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{__('header.setting')}}</a>
            </li>
        </ul>
        
        @if (App::getLocale() == 'en')
            <form class="form-inline my-2 my-lg-0 ml-auto"> 
            @else
            <form class="form-inline my-2 my-lg-0 mr-auto">
        @endif
        @auth
        @php 
            $Notifs=\App\Http\Controllers\HomeController::getNotifications();
        @endphp
        <li class="dropdown dropdown-notification nav-item  dropdown-notifications" type="none">
            <a class="nav-link nav-link-label" href="#" data-toggle="dropdown">
                <i class="fa fa-bell"> </i>
                
                <span
               
                    class=" badge badge-pill badge-default badge-danger badge-default badge-up badge-glow   notif-count"
                    data-count="{{$Notifs->count()}}">{{$Notifs->count()}}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-media dropdown-menu-right" style="type:none" style="overflow-y:scroll">
                <li class="dropdown-menu-header">
                    <h6 class="dropdown-header m-0 text-center">
                        <span class="grey darken-2 text-center">الرسائل</span>
                    </h6>
                </li>
                <li class="scrollable-container ps-container ps-active-y media-list w-100 ">
                    
                    <livewire:notification-liv/>
                    
                </li>
                <li class="dropdown-menu-footer"><a class="dropdown-item text-muted text-center"
                    href="{{route('getAllNotifications')}}"> جميع الاشعارات </a>
                </li>
            </ul>
        </li>
    @endauth


            
        @if(Auth::check())

        <li class="nav-item dropdown" type="none">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img 
                class="rounded float-left" 
                width="80" heigth="80" 
                style="border-radius:50% !important" 
                src="{{asset('images/Members').'/'.Auth::user()->photo}}">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{route('Profile' , [Auth::user()->id])}}">{{__('Profile')}}</a>
                <a class="dropdown-item" href="{{route('getById' , [2  , ''])}}">{{__('Setting')}}</a>
                <div class="dropdown-divider"></div>
                <form class="" method="POST" action="{{route('logout')}}">
                    <input class="dropdown-item" type="submit" Value="{{__('logout')}}"
                     >
                </form>
            </div>
        </li>

        
        
        @endif
            @if(Session::has('Useremail'))
                <span>{{Auth::User()}}</span>
            @endif
        </form>
    </div>
</div>
</nav>