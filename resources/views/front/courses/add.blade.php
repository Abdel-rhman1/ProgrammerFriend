@include("front.layouts.header")
@section('name')
    Add New Course
@stop
@include('front.layouts.navbar')
<div class='container' style="margin-top:50px">
    @if (App::getLocale()=='ar')
      <?php  $dire = 'text-right' ?>
    @else
    <?php  $dire = 'text-left' ?>
    @endif
    <div class="card">
        <div class="card-header {{$dire}}" style="">{{__('backend.addnewCourse')}}</div>
        <div class="card-body">
            @if(Session::has('Inserted'))
                <div class="alert alert-success text-center  offset-sm-2 col-sm-8 btn btn-sm">
                    {{Session::get('Inserted')}}
                </div>
            @endif
                @if(Session::has('error'))
                    <div class="alert alert-danger text-center  offset-sm-2 col-sm-8 btn btn-sm">
                        {{Session::get('error')}}
                    </div>
                @endif
            <form action="{{route('course.store.front')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="NameInput">
                        {{__('backend.Name')}}
                    </label>
                    <input type="text" name="Name" id="NameInput" class="form-control col-sm-8" placeholder="{{__('backend.NameplaceCourse')}}">
                </div>
                @error('Name')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                        {{$message}}
                    </div>
                @enderror
                <div class='from-group row'>
                    <label class='col-form-label col-sm-2' for='photoInput'>
                        {{__('backend.Photo')}}
                    </label>
                    <input type='file' name='photo'  id="photoInput" class='form-control col-sm-8' style='margin-bottom:10px'>    
                </div>
                @error('photo')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                        {{$message}}
                    </div>
                @enderror
               
                <div class="form-group form-group-lg row">
                    <label class="col-form-label col-sm-2" for="detailsInput">
                        {{__('backend.details')}}
                    </label>
                    <textarea name="details" id="detailsInput" class="form-control col-sm-8" placeholder="{{__('backend.detailsPlace')}}"></textarea>
                </div>
                @error('details')
                <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                    {{$message}}
                </div>
                @enderror
                <div class='from-group row'>
                    <label class='col-form-label col-sm-2' for='PriceInput'>
                        {{__('backend.Price')}}
                    </label>
                    <input type='number' placeholder = "{{__('backend.PricePlace')}}"min="0" name='price' id="PriceInput" class='form-control col-sm-8' style='margin-bottom:10px'>    
                </div>
                @error('price')
                    <div class="alert alert-danger text-center offset-sm-2 col-sm-8 btn btn-sm">
                        {{$message}}
                    </div>
                @enderror
                <div class="form-group form-control-lgr-m">
                    <input type='submit' value="{{__('backend.Save')}}" class="form-control-lg btn btn-sm col-sm-2 offset-sm-2 btn btn-success">
                </div>
            </form>
        </div>
    </div>
</div>
@include('front.layouts.footer')

<script>
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };
    var notificationsWrapper = $('.dropdown-notifications');
   
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('li.scrollable-container');
    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('new-notification');
    // Bind a function to a Event (the full Laravel class)
    console.log('Hello');
    channel.bind('App\\Events\\NewNotification', function (data) {
        
        var existingNotifications = notifications.html();
        
        var newNotificationHtml = `<a href="`+{{}}+`"><div class="media-body"> <p class="notification-text font-small-3 text-muted">` + data.user_name + " Was Added New Course"+ `</p><small style="direction: ltr;"><p class="media-meta text-muted text-center" style="direction: ltr;">` + data.date + data.time + `</p> </small></div></div></a><hr>`;
        notifications.html(newNotificationHtml + existingNotifications);
        notificationsCount += 1;
        
        notificationsCountElem.attr('data-count', notificationsCount);
        notificationsWrapper.find('.notif-count').text(notificationsCount);
        notificationsWrapper.show();
    });
</script>
