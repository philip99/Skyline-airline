@extends('layouts.app')

@section('content')

<div class="container font-weight-normal">


	<h4>Ticket reservation</h4><hr>

<div class="form-group row">
  <label for="userid" class="col-sm-2 col-form-label">User ID</label>
  <div class="col-sm-8">
    <input class="form-control userid" type="text" placeholder="{{Auth::user()->id}}" disabled >
  </div>
</div>

<div class="form-group row">
  <label for="fullname" class="col-sm-2 col-form-label">Full name</label>
  <div class="col-sm-8">
    <input class="form-control fullname" type="text" placeholder="{{Auth::user()->name}}" disabled >
  </div>
</div>


<div class="form-group row ">

  <label for="E-mail" class="col-sm-2 col-form-label">E-mail</label>
  <div class="col-sm-8">
    <input class="form-control email" type="email" placeholder="{{Auth::user()->email}}" disabled>
  </div>
</div>

<div class="form-group row">
	<label for="Baggage type" class="col-sm-2 col-form-label">Baggage type</label>

    <div class="col-sm-8">

        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="checkedin"> Checked-in baggage
			</label>
        </div>
		<div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" id="cabin"> Cabin baggage
			    </label>
    </div>
        
	</label>
	</div>
</div>


<hr> 


<div class="form-group row">
  <label for="from" class="col-sm-2 col-form-label">From:</label>
  <div class="col-sm-8">
    <input class="form-control from" type="text" placeholder="{{$flight['depPlace']}}" disabled >
  </div>
</div>

<div class="form-group row">
  <label for="to" class="col-sm-2 col-form-label">To:</label>
  <div class="col-sm-8">
    <input class="form-control to" type="text" placeholder="{{$flight['destPlace']}}" disabled >
  </div>
</div>

<div class="form-group row">
  <label for="deptime" class="col-sm-2 col-form-label">Departure time:</label>
  <div class="col-sm-8">
    <input class="form-control deptime" type="text" placeholder="{{$flight['depDateTime']}}" disabled >
  </div>
</div>

<div class="form-group row">
  <label for="desttime" class="col-sm-2 col-form-label">Destination time:</label>
  <div class="col-sm-8">
    <input class="form-control desttime" type="text" placeholder="{{$flight['destDateTime']}}" disabled >
  </div>
</div>

<div class="form-group row">
<form action="/flight/book" method="POST">
  @csrf
  <input type="hidden" id="ticket" name="flightId" value="{{$flight['flightNr']}}">
  <input type="hidden" id="ticket" name="userId" value="{{Auth::user()->id}}">
  <input type="submit" value="Submit"class="btn btn-primary">
</form>
</div>

</div>



@endsection

    


