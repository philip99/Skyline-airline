@extends('layouts.app')

@section('title', 'HomePage')


@section('content')

    @foreach ($flights as $flight)

        <div class="wrapper" style="width:500px;margin: auto; margin-top:20px; margin-bottom: 20px;">
            <div class="card" style="width: 30rem;">
                <div class="card-body row">
                    <div class="col col-">
                        <p>{{$flight->depPlace}}</p>
                        <p>{{\Carbon\Carbon::parse($flight->depDateTime)->format('d/m/Y')}}</p>

                    </div>
                    <div class="col col-">
                        <hr>
                    </div>
                    <div class="col col-">
                        <p>{{$flight->destPlace}}</p>
                        <p>{{\Carbon\Carbon::parse($flight->destDateTime)->format('d/m/Y')}}</p>
                    </div>
                    <div class="col col-">
                        <a href="/flight/{{$flight->flightNr}}"><button type="button" class="btn btn-primary" href="/flight/{{$flight->flightNr}}">More</button></a>
                    </div>

                </div>
            </div>
        </div>

    @endforeach

@endsection