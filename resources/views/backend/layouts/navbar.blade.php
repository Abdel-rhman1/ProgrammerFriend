<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="{{route('get.members')}}"> {{__('dashboard.home_page')}} <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('get.members')}}">{{__('dashboard.Members')}}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('dashboard.items')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('get.Items' , [1])}}">{{__('dashboard.item1')}}</a>
                    <a class="dropdown-item" href="{{route('get.Items' , [2])}}">{{__('dashboard.item2')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('get.Items' , [3])}}">{{__('dashboard.item3')}}</a>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{route('getstat')}}">{{__('dashboard.stat')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('getall')}}">{{__('dashboard.course')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('getSkills')}}">{{__('dashboard.skill')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">{{__('dashboard.setting')}}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('job.index')}}">{{__('dashboard.job')}}</a>
            </li>
            @if(Session::has('adminemail'))
                {{Session('adminemail')}}
            @endif
           
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{__('header.lang')}}
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{route('locale', ['ar'])}}">{{__('dashboard.lan1')}}</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('locale' , ['en'])}}">{{__('dashboard.lan2')}}</a>
                </div>
            </li>
        </ul>
        @if (App::getLocale() == 'en')
                
            @else
                
         @endif
            
        
    </div>
</nav>
