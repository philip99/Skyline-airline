<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
      
        <link rel="stylesheet" href="{{asset('css/ticket.css')}}">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    </head>
    <body>


        <div class="container">
            
            <div class="box">
                <ul class="left">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                
                <ul class="right">
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <div class="ticket">
                    <span class="airline">Skyline Air</span>
                    <span class="airline airlineslip">Skyline Air</span>
                    <span class="boarding">Boarding pass</span>
                    <div class="content">
                    <span class="jfk">{{$flight['depPlace']}}</span>

                    <span class="sfo">{{$flight['destPlace']}}</span>
                    
                    <span class="jfk jfkslip">{{$flight['depPlace']}}</span>
                    
                    <span class="sfo sfoslip">{{$flight['destPlace']}}</span>
                    <div class="sub-content">
                        <span class="watermark">Skyline Air</span>
                        <span class="name">PASSENGER NAME<br><span>{{$user['name']}}</span></span>
                        <span class="flight">FLIGHT N&deg;<br><span>X3-65C3</span></span>
                        <span class="gate">GATE<br><span>11B</span></span>
                        <span class="seat">SEAT<br><span>45A</span></span>
                        <span class="boardingtime">BOARDING TIME<br><span>{{$flight['depDateTime']}}</span></span>
                            
                        <span class="flight flightslip">FLIGHT N&deg;<br><span>X3-65C3</span></span>
                        <span class="seat seatslip">SEAT<br><span>45A</span></span>
                        <span class="name nameslip">PASSENGER NAME<br><span>{{$user['name']}}</span></span>
                    </div>
                    </div>
                    <div class="barcode"></div>
                    <div class="barcode slip"></div>
                </div>
            </div>

        </div>

    </body>
    
</html>

