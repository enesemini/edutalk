@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Followers</h1>
            <ul class="list-group">
                @foreach ($followers as $follower)
                <li class="list-group-item">{{$follower->user->username}}</li>
                @endforeach
            </ul>
            <h1>Following</h1>
            <ul class="list-group">
                @foreach ($following as $follow)
                <li class="list-group-item">{{$follow->follower->username}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@stop