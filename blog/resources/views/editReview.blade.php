@extends('layouts.app')

@section('content')

    @if (Auth::check())

        <div class="card" style="width:600px;margin:auto">
            <h5 class="card-header">Add Review</h5>
            <div class="card-body">
                <form method="POST" action="/reviews/edit/action/{{$review->id}}">
                @csrf
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" placeholder="Write the title here" value="{{$review->title}}">
                    </div>
                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea class="form-control" name="body" id="body" rows="3">{{$review->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" id="exampleFormControlTextarea1" value="Update Review">
                    </div>
                </form>
            </div>
        </div>

    @endif



@endsection