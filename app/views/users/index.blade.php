@extends('layouts.default')

@section('content')

<div class="container">
    <div class="et-container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Alle edutalk Nutzer</h2>
                <hr/>
            </div>
        </div>
        <div class="row">
            <ul class="et-list">
                @foreach ($users as $user)
                <div class="col col-xs-6 col-sm-4 col-md-3 col-lg-3">
                    <li class="et-list-item">
                        <a href="{{ URL::route('users.show'), $user->username}} "><img class="img-circle" src="js/holder.js/50x50" alt="{{$user->username}}"/></a>
                        <a href="{{ URL::route('users.show'), $user->username}} ">{{"@".$user->username}}</a>

                    </li>
                </div>
                @endforeach
            </ul>
        </div>
        <div class="row">
            <div class="col-lg-12">
                {{$users->links();}}
            </div>
        </div>
    </div>
</div>

@stop