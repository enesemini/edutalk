@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <h1>Suchergebnisse für: {{$search}}</h1>
            <hr>
            <h2>Benutzer</h2>
            <div class="et-container">
                @if (count($searchUsers))
                <ul class="et-list">
                    @foreach ($searchUsers as $user)
                        <div class="col col-xs-6 col-sm-4">
                            <li class="et-list-item center-text" id="{{$user->id}}">
                                <div class="block">
                                    <img class="img-circle" src="js/holder.js/50x50" alt="{{$user->username}}"/>
                                </div>
                                <a href="{{route('users.show', $user->username)}}">{{"@".$user->username}}</a>
                            </li>
                        </div>
                    @endforeach
                </ul>
                @else
                <p class="grey">Es gibt keine Benutzer zu dieser Suchanfrage.</p>
                @endif
                <div class="clearfix"></div>
            </div>
            <hr>
            <h2>Gruppen</h2>
            <div class="row">
                @if (count($searchGroups))
                    @foreach ($searchGroups as $group)
                        <div class="col col-xs-12 col-sm-4 col-md-4">
                            <div class="et-container">
                                <a href="{{URL::route('groups.show', $group->id)}}">{{$group->name}}</a>
                                <p>{{$group->description}}</p>
                            </div>
                        </div>
                    @endforeach
                @else
                <div class="col-xs-12">
                    <p class="grey">Es gibt keine Gruppen zu dieser Suchanfrage.</p>
                </div>
                @endif
            </div>
            <hr>
            <h2>Talk</h2>
            <div class="timeline-container">
                @if(count($searchTalks))
                    @foreach ($searchTalks as $talk)
                    <article class="talk">
                        <i class="fa-et fa fa-graduation-cap"></i>
                        <div class="talk-body">
                            <span class="user">{{$talk->user->first_name}} {{$talk->user->last_name}}</span>
                            <a href="#" class="short-link"> {{"@".$talk->user->username}}</a>
                            @if(!$talk->group_id == '')
                                <span>in <a href="{{URL::route('groups.show', $talk->group_id)}}">{{$talk->group['name']}}</a></span>
                            @endif
                            <p>{{$talk->message}}</p>
                            <span class="time">posted {{$talk->created_at->diffForHumans()}}</span>
                        </div>
                    </article>
                    @endforeach
                @else
                <p class="grey">Es gibt keine Talks zu dieser Suchanfrage.</p>
                @endif
            </div>

        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">

        </div>
    </div>
</div>


@stop
