@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-6 col-xs-offset-3 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
            @include('_partials.createTalk')

            <hr/>
            <div class="timeline-container">
                <h3>Alle Talks vom eingeloggten User</h3>

                    @foreach ($user->talks as $talk)
                    <article class="file-talk talk">
                        <i class="fa-et fa fa-graduation-cap"></i>
                        <div class="talk-body">
                            <p><span class="user">{{$talk->user->first_name}} {{$talk->user->last_name}}</span> {{$talk->message}}</p>
                            <span class="time">posted {{$talk->created_at->diffForHumans()}}</span>
                        </div>
                    </article>
                    @endforeach
            </div>


        </div>
    </div>
</div>
@stop