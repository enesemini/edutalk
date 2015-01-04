@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Hallo {{Auth::user()->username}}, willkommen auf Edutalk!</h2>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
            @if (isset($invitations))
            <div class="friends-container et-container">
                <h3>Offene Einladungen</h3>
                <ul>
                    @foreach ($invitations as $group)
                        <li>
                            <div class="pull-right">
                                <a href="{{ URL::route('groups.declineInvitation', $group->id) }}" class="btn btn-danger"><i class="fa fa-times"></i></a>
                                <a href="{{ URL::route('groups.acceptInvitation', $group->id) }}" class="btn btn-success"><i class="fa fa-check"></i></a>
                            </div>
                            <a href="{{URL::route('groups.show', $group->id)}}">{{$group->name}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div class="groups-container et-container">
                <h3>Gruppen</h3>
                <ul>
                    @if (isset($groups))
                        @foreach ($groups as $group)
                            <li>
                               <a href="{{URL::route('groups.show', $group->id)}}">
                                    <h4>{{$group->name}}</h4>
                                    <p>{{$group->description}}</p>
                                    <div class="clearfix"></div>
                               </a>
                            </li>
                        @endforeach
                    @else
                        <li>Sie sind noch keiner Gruppe beigetreten.</li>
                    @endif
                </ul>
            </div>

        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
            @include('_partials.createTalk')
            <div class="timeline-container">
                <h3>Neuste Talks</h3>
                @if(count($userTalks))
                    @foreach ($userTalks as $talk)
                        {{$talk}}
                    <article class="talk">
                        <i class="fa-et fa fa-graduation-cap"></i>
                        <div class="talk-body">
                            <span class="user">{{$talk->user->first_name}} {{$talk->user->last_name}}</span>
                            <a href="#" class="short-link"> {{"@".$talk->user->username}}</a>
                            @if(!$talk->group_id == '')
                                <span>in <a href="{{URL::route('groups.show', $group->id)}}">{{$talk->group['name']}}</a></span>
                            @endif
                            <p>{{$talk->message}}</p>
                            <span class="time">posted {{$talk->created_at->diffForHumans()}}</span>
                        </div>
                    </article>
                    @endforeach
                @else
                <p class="grey">Es gibt noch keine Talks. Erstellen Sie einen!</p>
                @endif
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">

        </div>
    </div>
</div>


@stop
