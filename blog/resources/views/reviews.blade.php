@extends('layouts.app')

@section('content')

    <div class="wrapper" style="width:450px;margin: auto; margin-top:20px; margin-bottom: 20px;">
        @foreach ($reviews as $review)
            <div class="row" > 
                    <div class="col-md-6">
                        <div class="card text-white bg-dark mb-3" style="width:450px">
                            <div class="card-header">
                            @if($review->GetUser()->profile_url == null)
                                <img src="{{asset('img')}}/no-profile-picture.png" style="width:60px;"
                                onmouseover="this.src='{{asset('img/pixelated')}}/no-profile-picture.png'" 
                                onmouseout="this.src='{{asset('img')}}/no-profile-picture.png'">
                            @else
                                <img src="{{asset('storage/img')}}/{{$review->GetUser()->profile_url}}" style="width:60px;"
                                onmouseover="this.src='{{asset('storage/img/pixelated')}}/{{$review->GetUser()->profile_url}}'" 
                                onmouseout="this.src='{{asset('storage/img')}}/{{$review->GetUser()->profile_url}}'">
                            @endif
                            By @auth @if(\Illuminate\Support\Facades\Auth::User()->user_role == 0)<a href="user/profile/{{$review->GetUser()->id}}">{{$review->GetUser()->name}}</a> @else {{$review->GetUser()->name}} @endif @endauth @guest {{$review->GetUser()->name}} @endguest
                                @auth
                                    @if(\Illuminate\Support\Facades\Auth::User()->id == $review->GetUser()->id)
                                        <div class="icons float-right">
                                            <a href="/reviews/edit/{{$review->id}}"><i class="far fa-edit" style="color:#3194d4"></i></a>
                                            <a href="/reviews/delete/{{$review->id}}"><i class="far fa-trash-alt" style="color:red"></i></a>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                            <div class="card-body">
                                
                                <h5 class="card-title">{{$review->title}}</h5>
                                <p class="card-text">{{$review->content}}</p>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
    </div>

    @if (Auth::check())

        <div class="card" style="width:600px;margin:auto">
            <h5 class="card-header">Add Review</h5>
            <div class="card-body">
                <form method="POST" action="{{ route('AddReview') }}">
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Write the title here">
                    </div>
                    <div class="form-group">
                        <label for="stars">starts</label>
                        <select class="form-control" name="stars" id="stars">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="3"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="exampleFormControlTextarea1" value="Add Review">
                    </div>
                </form>
            </div>
        </div>

    @endif



@endsection
