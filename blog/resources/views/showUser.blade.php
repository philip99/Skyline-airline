@extends('layouts.app')

@section('style')
<link rel="stylesheet" href="{{asset('css/showUser_style.css')}}">
@endsection

@section('content')

<div class="wrapper">

  
<div class="profile-card js-profile-card">
  <div class="profile-card__img">
    @if($user->profile_url == null)
      <img src="{{asset('img')}}/no-profile-picture.png" 
      onmouseover="this.src='{{asset('img/pixelated')}}/no-profile-picture.png'" 
      onmouseout="this.src='{{asset('img')}}/no-profile-picture.png'">
    @else
      <img src="{{asset('storage/img')}}/{{$user->profile_url}}" alt="profile card"
      onmouseover="this.src='{{asset('storage/img/pixelated')}}/{{$user->profile_url}}'" 
      onmouseout="this.src='{{asset('storage/img')}}/{{$user->profile_url}}'">
    @endif
  </div>

  <div class="profile-card__cnt js-profile-cnt">
    <div class="profile-card__name">{{$user->name}}</div>
    <div class="profile-card__txt">Role <strong>@if ($user->user_role == 0) Admin @else User @endif</strong></div>
    <div class="profile-card-loc">
      <span class="profile-card-loc__icon">
        <svg class="icon"><use xlink:href="#icon-location"></use></svg>
      </span>

    </div>

    <div class="profile-card-inf">
      <div class="profile-card-inf__item">
        <div class="profile-card-inf__title">{{ $user->flights()->get()->count()}}</div>
        <div class="profile-card-inf__txt">Flights</div>
      </div>

      <div class="profile-card-inf__item">
        <div class="profile-card-inf__title">{{$user->GetReviewsCount()}}</div>
        <div class="profile-card-inf__txt">Reviews</div>
      </div>

    </div>

    <div class="profile-card-ctr">
      <a href="/user/makeAdmin/{{$user->id}}" class="profile-card__button button--blue js-message-btn">Make Admin</a>
      <a href="/user/delete/{{$user->id}}" class="profile-card__button button--orange">Delete</a>
    </div>
  </div>



</div>

</div>



@endsection







