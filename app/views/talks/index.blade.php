@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            @include('_partials.createTalk')

            <hr/>
            <div class="timeline-container">
                <h3>Alle Talks</h3>

                    @foreach ($talks as $talk)
                    <article class="talk">
                        <i class="fa-et fa fa-graduation-cap"></i>
                        <div class="talk-body">
                            <a href="{{URL::route('users.show', $talk->user->username)}}"><span class="user">{{$talk->user->first_name}} {{$talk->user->last_name}}</span></a>
                            <a href="#" class="short-link"> {{"@".$talk->user->username}}</a>
                            <p>{{$talk->message}}</p>
                            <span class="time">posted {{$talk->created_at->diffForHumans()}}</span>
                        </div>
                    </article>
                    @endforeach
            </div>


        </div>
    </div>
</div>
@stop