var notificationsWrapper = $('.dropdown-notifications');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('ul li.scrollable-container');
// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('new-notification');
// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewNotification', function (data) {
    
    var existingNotifications = notifications.html();
   
    var newNotificationHtml = `<a href="`+data.user_name+`">
        <div class="media-body notificationBody">
            <p class="notification-text font-small-3 text-muted text-right">` + data.user_name + `</p>
            <small style="direction: ltr;">
                <p class="media-meta text-muted text-right" style="direction: ltr;">` + data.date + data.time + `</p>
            </small>
            </div>
        </a>`;
    notifications.html(newNotificationHtml);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('.notif-count').text(notificationsCount);
    notificationsWrapper.show();
});