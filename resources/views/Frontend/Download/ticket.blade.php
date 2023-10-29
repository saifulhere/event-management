<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:ital,wght@0,400;0,700;0,800;1,600&display=swap" rel="stylesheet">
    <title>Ticket</title>
    <style>
            body {
            font-family: 'Work Sans', sans-serif;
            margin: 0px;
            padding:0px;
            color:white;
        }
        p{
            font-size: 16px;
            font-weight: 400;
            line-height: 0.4;
        }
        h2{

        }
        section {
            background-image: url('data:image/png;base64, {{ base64_encode(file_get_contents(public_path('frontend_assets/img/ticket.png')))}}');
            background-size: cover;
            background-repeat:no-repeat;
        }
        .container{
            max-width: 1280px;
        }
        .row{
            width: 100%;
        }
        .col-md-6:first-child {
            float: left;
        }
        .event-content{
            overflow: hidden;
        }
        .bold{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="event-content">
                        <h2 style="margin-left:70px; margin-top:50px;">{{$ticket->event->title}}</h2>
                        <div style="margin-left:70px; margin-top:-20px;" class="event-info">
                            <p class="text-left">Organizer Name</p>
                            <p class="text-left name bold">{{$ticket->event->organizer->name}}</p>
                            <p class="text-left">Location</p>
                            <p class="text-left name bold">{{$ticket->event->location}}</p>
                            <p class="text-left">Event Start at</p>
                            <p class="text-left name bold">{{$ticket->event->start_date}}</p>
                        </div>
                    </div>
                </div>
                <div  style="position: relative" class="col-md-6">
                    <div style="margin-left:50px;" class="event-content">
                        <h2 style="margin-left:70px; margin-top:50px;">{{$ticket->name}}</h2>
                        <div style="margin-bottom:20px;" class="event-info">
                            <p class="text-left">Number of People</p>
                            <p class="text-left name bold">{{$ticket->number_of_people}}</p>
                            <p class="text-left">Mobile</p>
                            <p class="text-left name bold">{{$ticket->phone}}</p>
                            <p class="text-left">Event end at</p>
                            <p class="text-left name bold">{{$ticket->event->end_date}}</p>
                        </div>
                    </div>
                    <div class="col-md-6 qr-code code" style="position: absolute; top:150; left:450;">
                        <img style="width: 70px; height:70px; position: absolute" src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>