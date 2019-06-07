<html> 
<head> 
    <title></title> 
<body> 
    <h1>Skyline Air </h1> 
    <div> 
    Thank you for using our services, {{$user['name']}} ! This summary of the journey is your booking confirmation. 
    Important! Passengers must present themselves at the airport 2 hours before flight to make timely cleared through security and boarding at the airport.
    <br> 
</div> 

<tr class="m_-7704944853968790705booking-row">
                    <td class="m_-7704944853968790705booking-list-icon" style="text-align:left;vertical-align:top;padding:20px;font-size:16px;font-weight:700;opacity:1;padding-right:0;width:36px">
                    <img src="https://ci6.googleusercontent.com/proxy/hsg2sCTv8KP5ta-AWWRact8EGGmVbGAlQQ67vQikADH51ia0iOYHqvzAkOscYtSTIAJVNSaCYOVKL4u7opUR24liCOGy9Q=s0-d-e1-ft#http://et-images.eskyservices.pl/booking-flight.png" style="border:none;vertical-align:top">
                    </td>
                    
                    <td class="m_-7704944853968790705booking-list-data" style="text-align:left;vertical-align:middle;padding:20px;font-size:16px;font-weight:700">
                    <table class="m_-7704944853968790705booking-list-details" cellpadding="0" cellspacing="0" style="color:#1c2b39;font-family:Arial,Helvetica,sans-serif;font-size:14px;width:100%;line-height:20px">
                        <tbody>
                            <tr>
                                <td style="text-align:left;vertical-align:top;font-size:16px;font-weight:700;padding:10px 0 15px"> 
                                <span>Reservation ticket</span> 
                                <span class="m_-7704944853968790705additional-data" style="font-size:14px;font-weight:400">({{$flight['depPlace']}} - {{$flight['destPlace']}})</span> 
                                </td>
                                
                                <td class="m_-7704944853968790705booking-list-number" style="text-align:right;vertical-align:top;font-size:16px;font-weight:700;width:100px;padding:10px 0 15px"> 
                                <span>X3-65C3</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    </td>
                </tr>
                <div>
                  
                    <div class="content">
                    <span class="jfk">{{$flight['depPlace']}}</span>

                    <span class="sfo">{{$flight['destPlace']}}</span>
                    
                    <div class="sub-content">
                        <span class="name">PASSENGER NAME {{$user['name']}}</span><br>
                        <span class="flight">FLIGHT N&deg X3-65C3</span><br>
                        <span class="gate">GATE 11B</span><br>
                        <span class="seat">SEAT 45A</span><br>
                        <span class="boardingtime">BOARDING TIME {{$flight['depDateTime']}}</span>               
                    </div>
                    </div>
                   
                </div>

              


</body>
</html>