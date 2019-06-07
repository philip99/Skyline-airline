@extends('layouts.app')

@section('style')
<style>
    .profile-pic:hover {
        content:url('{{asset('storage/img/pixelated')}}/{{Auth::user()->profile_url}}');
      
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
                    <div class="circle">
                        <!-- User Profile Image -->
                        @if(Auth::user()->profile_url == null)
                                <img src="{{asset('img')}}/no-profile-picture.png" style="width:60px;"
                                onmouseover="this.src='{{asset('img/pixelated')}}/no-profile-picture.png'" 
                                onmouseout="this.src='{{asset('img')}}/no-profile-picture.png'">
                        @else
                            <img class="profile-pic" src="{{asset('storage/img')}}/{{Auth::user()->profile_url}}">
                        @endif                  
                    </div>               
 

                    <form method="POST" enctype="multipart/form-data" action="{{ url('uploadfile') }}">
                    @csrf
                        <div class="row">
                                <div class="small-12 medium-2 large-2 columns">
                                    <div class="circle">
                                    <!-- User Profile Image -->
                                    <img class="profile-pic" src="">

                                    <!-- Default Image -->
                                    <!-- <i class="fa fa-user fa-5x"></i> -->
                                    </div>
                                    <div class="p-image">
                                        <input class="file-upload" type="file" name="select_file" >
                                        <input type="Submit" name ="upload" value="Upload">
                                    </div>
                                </div>
                        </div>
                    </form>
                    
                    <form method="POST" action="{{ route('updateUser') }}">
                    @csrf
                                               
                        <div class="form-group row">
                            <label for="staticEmail" class="col-sm-2 col-form-label">Id</label>
                            <div class="col-sm-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{ Auth::user()->id }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="name" id="name" value="{{ Auth::user()->name}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" name="email"  id="email" value="{{ Auth::user()->email}}" required>
                            </div>
                        </div>
                        <input type="submit" value="Update" class="btn btn-primary">
                        <a class="btn btn-primary" href="/user/deleteUser">Delete</a>
                        <a class="btn btn-success" href="{{route('export')}}">Export to Excel</a>
                   </form>
                   
                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container" style="margin-top:20px">
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
            

            
            </tr>
    @endforeach
    </tbody>
    </table>


</div>
@endsection
