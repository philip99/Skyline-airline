@extends('layouts.app')

@section('title', 'Details')

@section('content')
    <h1>Flight details</h1> 
    <div class ="container"> 
       <table class="table table-striped">
  <thead>
    <tr>
    <th scope="col">#</th>
      <th scope="col">Departure place</th>
      <th scope="col">Departure date</th>
      <th scope="col">Departure time</th>
      <th scope="col">Destination place</th>
      <th scope="col">Destination date</th>
      <th scope="col">Destination time</th>
    
  </thead>
 
  <tbody>

  @foreach($flights as $flight)
   <?php
    $dep = explode(' ',$flight->depDateTime);
    $dest =  explode(' ',$flight->destDateTime);
   ?>
         <tr>
            <td>{{ $flight['flightNr'] }}</td>
            <td>{{ $flight['depPlace'] }}</td>
            <td>{{ $dep[0]}}</td>
            <td>{{ $dep[1]}}</td>
            <td>{{ $flight['destPlace'] }}</td>
            <td>{{ $dest[0] }}</td>
            <td>{{ $dest[1] }}</td>
           
            
                <form action="/book" method="POST">
                @csrf
                    <input type="hidden" id="flightId" name="flightId" value="{{$flight['flightNr']}}">
                    <td><input type="submit" value="Book"class="btn btn-primary"></td>
                </form>

            
          
           
           
         </tr>
  @endforeach
  </tbody>
</table>

    </div>
@endsection