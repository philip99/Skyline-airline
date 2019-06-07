@extends('layouts.app')

@section('title', 'HomePage')


@section('content')

        @if(\Request::get('message') !== null)
        @php
        {{
            $message = \Request::get('message');
            
        }}
        @endphp
        @include('popup', ['message' => $message])
        @endif


    <div class="wrapper" style="width:300px;margin: auto; margin-top:20px; margin-bottom: 20px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">Search</h5>
                <form action="/flight/search" method="GET">
                    <div class="form-group">
                        <label for="DepartureDate">Departure Date</label>
                        <input type="date" class="form-control" name="DepartureDate" id="DepartureDate" aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <div class="form-group">
                        <label for="ArriveDate">Arrive Date</label>
                        <input type="date" class="form-control" name="ArriveDate" id="ArriveDate" placeholder="Password">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Top Destinations</h5>
            <div class="card-deck" style="margin:auto">
                <div class="row justify-content-md-center">
                    <div class="col col-md-4">
                        <div class="card" style="width: 18rem;">

                            <img class="card-img-top" src="{{asset('img/cities')}}/rome.jpg" alt="Card image cap"
                            onmouseover="this.src='{{asset('img/cities/with_letter')}}/rome.jpg'" 
                            onmouseout="this.src='{{asset('img/cities')}}/rome.jpg'">
                            
                            <div class="card-body">
                                <h5 class="card-title">Rome</h5>
                                <p class="card-text">A heady mix of haunting ruins, awe-inspiring art and vibrant street life, Italy’s hot-blooded capital is one of the world’s most romantic and inspiring cities.</p>
                                <a href="/city/Rome" class="btn btn-primary">View Tickets</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card" style="width: 18rem;">

                            <img class="card-img-top" src="{{asset('img/cities')}}/Copenhagen.jpg" alt="Card image cap"
                            onmouseover="this.src='{{asset('img/cities/with_letter')}}/Copenhagen.jpg'" 
                            onmouseout="this.src='{{asset('img/cities')}}/Copenhagen.jpg'">
                            
                            <div class="card-body">
                                <h5 class="card-title">Copenhagen</h5>
                                <p class="card-text">Copenhagen is the epitome of Scandi cool. Modernist lamps light New Nordic tables, bridges buzz with cycling commuters and eye-candy locals dive into pristine waterways.</p>
                                <a href="/city/Copenhagen" class="btn btn-primary">View Tickets</a>
                            </div>
                        </div>
                    </div>
                    <div class="col col-md-4">
                        <div class="card" style="width: 18rem;">

                            <img class="card-img-top" src="{{asset('img/cities')}}/Stockholm.jpg" alt="Card image cap"
                            onmouseover="this.src='{{asset('img/cities/with_letter')}}/Stockholm.png'" 
                            onmouseout="this.src='{{asset('img/cities')}}/Stockholm.jpg'">
                            
                            <div class="card-body">
                                <h5 class="card-title">Stockholm</h5>
                                <p class="card-text">Stockholmers call their city 'beauty on water'. But despite the well-preserved historic core, Stockholm is no museum piece: it's modern, dynamic and ever-evolving.</p>
                                <a href="/city/Stockholm" class="btn btn-primary">View Tickets</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection