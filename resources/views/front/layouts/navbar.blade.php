<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
       
            <input class="form-control mr-sm-2" type="search" placeholder="{{__('header.SeachPlace')}}" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">{{__('header.Seabu')}}</button>
        </form>
    </div>
</nav>
