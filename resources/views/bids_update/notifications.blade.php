<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo Pusher</title>
    <link rel="shortcut icon" href="{{ asset('images/favicon/logo-trungquandev.png') }}" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style type="text/css" media="screen">
        #messages{
            color: #1abc9c;
        }
        #messages li{
            max-width: 50%;
            margin-bottom:10px;
            border-color: #34495e;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <h1>Bid realtime update</h1>

        <p>Message preview:</p>
        <ul id="messages" class="list-group"></ul>
        <ul id="prices" class="list-group"></ul>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://js.pusher.com/4.1/pusher.min.js"></script>
<script>
    $(document).ready(function(){
        // Khởi tạo một đối tượng Pusher với app_key
        var pusher = new Pusher('ade3a67771dfbb07d8b7', {
            cluster: 'ap1',
            encrypted: true
        });

        //Đăng ký với kênh chanel-demo-real-time mà ta đã tạo trong file DemoPusherEvent.php
        var channel = pusher.subscribe('bid-channel');

        //Bind một function addMesagePusher với sự kiện DemoPusherEvent
        channel.bind('App\\Events\\BidUpdate', addMessageDemo);
    });
    <?php $price = request()->price; ?>
    //function add message
    function addMessageDemo(data) {
        var liTag = $("<ul><li class='list-group-item'></li>");
        var liTag1 = $("<li class='list-group-item'></li></ul>");
        liTag.html(data.message);
        liTag1.html(data.price);
        $('#messages').append(liTag);
        $('#prices').append(liTag1);
    }
</script>
</body>
</html>
