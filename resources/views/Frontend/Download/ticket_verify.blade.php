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
        body{
            font-family: 'Work Sans', sans-serif;
            padding:0px;
            max-width: 810px;
            margin: 0px auto;
            color: #fff;
        }
        p{
            font-size: 16px;
            font-weight: 400;
            line-height: 0.7;
        }
        h2{
            padding: 10px;
        }
        section{
            margin: 0px auto;
        }
        .heading{
            background-color: rgb(78, 77, 77);
        }
        /* .width-stretch{
            width: 100%;
            background-color: rgb(78, 77, 77);
            min-height: 1122.24px;
        } */
        /* .container{
            width: 1200px;
            margin: 0px auto;
            min-height: 1122.24px;
        } */
        .page{
            /* background-image: url('{{ asset('frontend_assets/img/ticket.webp') }}'); */
            /* max-width: 810px; */
            margin: 0px auto;
            text-align: center;
            min-height: 292px;
            padding: 0px 20px;
            padding-top: 50px !important;
            color:#fffff;

        }
        /* .event-details{
            width: 792.96px;
        } */
        .title{
            font-size: 24px;
            font-weight: 700;
        }
        .row{
            display: flex;
            /* width: 90%; */
            display: flex !important;
            /* width: 90%; */
            vertical-align: middle;
            justify-content: center;
            align-items: center;
            margin: 0px auto;
            /* margin-left: 68px;
            margin-top: -18px; */
        }
        .col-md-6{
            width: 50%;
        }
        .event-image img{
            width: 80%;
        }
        .text-left{
            text-align: left;
        }
        .name{
            font-weight: bold;
            font-size: 16px;
        }
        .text-right{
            text-align: right;
        }
        .d-flex{
            display: flex;
        }
        .event-info{
            margin-top: -10px;
        }
        .text-white{
            color: rgb(250, 250, 250);
        }
        /* .qr-code img{
            width: 200px;
        } */
        .button{
            background-color: blue;
            color: white;
            margin-top: 20px;
            padding: 10px 20px; 
            width: 150px;
            float: right;
        }
        .button a{
            text-decoration: none;
            color: white;
        }
        .number-of-people{
            position: relative;
        }
        /* .nop{
            position: absolute;
            top: -161px;
            left:460px;
            font-size: 15px;
        }
        .nop-value{
            position: absolute;
            top: -144px;
            left: 678px;
        } */
        /* .code{
            position: absolute;
            top: 56px;
            left: 635px;
        } */
        
    </style>
</head>
<body>
    <section class="width-stretch" style=" background-image:url('data:image/png;base64, {{ base64_encode(file_get_contents(public_path('frontend_assets/img/ticket.png')))}}'); background-size: cover;">
        <div class="container">
            <div class="page">
                <div class="event-details">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="title">
                                <h2 class="text-left">{{ $ticket->event->title }}</h2>
                                <div class="event-info">
                                    <p class="text-left">Organizer Name</p>
                                    <p class="text-left name">{{$ticket->event->organizer->name}}</p>
                                    <p class="text-left">Location</p>
                                    <p class="text-left name">{{$ticket->event->location}}</p>
                                    <p class="text-left">Event Start at</p>
                                    <p class="text-left name">{{$ticket->event->start_date}}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="title">
                                <div class="event-info">
                                    <p class="text-left">Participant's Name</p>
                                    <p class="text-left name">{{$ticket->name}}</p>
                                    <p class="text-left">Phone</p>
                                    <p class="text-left name">{{$ticket->phone}}</p>
                                    <p class="text-left">Event ID</p>
                                    <p class="text-left name">{{$ticket->guest_id}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>