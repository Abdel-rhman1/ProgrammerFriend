<div>
    
@foreach ($Notifications as $Notif)
<a href="{{route('course.profile2' , [$Notif->CID , $Notif->NID])}}">
    <div class="media notificationBody">
        <div class="media-body" style="margin-bottom: -40px;">
            
            <p class="notification-text font-small-3 text-muted"> {{$Notif->MName}}  Was Added New Course </p>
            <small style="direction: ltr;">
                <p class=" media-meta text-muted text-center"
                      style="direction: ltr;"> 
                      {{$Notif->CNO}}
                </p>
                <br>

            </small>
        </div>
    </div>
</a>
<hr>
@endforeach
@if ($Notifications->hasMorePages())
<div text-align="center" class="text-center">
    <button wire:click.prevent="loadMore" class="text-center btn btn-success">Load More</button>
</div>
@endif
</div>

