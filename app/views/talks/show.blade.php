@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>Talk</h1>
            <hr/>

            <p>{{$talk->message}}</p>
            <span>{{$talk->user->username}}</span>
            <span class="time">{{$talk->created_at->diffForHumans()}}</span>
        </div>
    </div>
</div>
@stop