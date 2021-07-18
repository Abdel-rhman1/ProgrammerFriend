        
        <script src="{{asset('js/app.js')}}"></script>
        <script src="{{asset('js/front.js')}}"></script>
        <script src="{{asset('js/jquery-1.11.1.js')}}"></script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>
            Pusher.logToConsole = true;
            var pusher = new Pusher('19fb987c92da512c3246', {
                cluster: 'eu'
            });
    </script>

        <livewire:scripts />
        
    </body>
</html>

