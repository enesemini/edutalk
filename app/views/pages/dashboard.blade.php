@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Hallo {{Auth::user()->username}}, willkommen auf Edutalk!</h2>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
            @if (isset($invitations))
            <div class="friends-container">
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

            <div class="groups-container">
                <h3>Gruppen</h3>
                <ul>
                    @if (isset($groups))
                        @foreach ($groups as $group)
                            <li>
                                <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                                <h4>{{$group->name}}</h4>
                                <p>{{$group->description}}</p>
                                <div class="clearfix"></div>
                            </li>
                        @endforeach
                    @else
                        <li>Sie sind noch keiner Gruppe beigetreten.</li>
                    @endif
                </ul>
            </div>

        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="timeline-container">
                <h3>3fW</h3>
                <div class="file-talk">
                    <i class="fa-et fa fa-file"></i>
                    <a href="#" class="btn-et pull-right"><i class="fa fa-download"></i></a>
                    <p><span class="user">Christoph Gerber</span> hat eine neue Datei hochgeladen.</p>

                </div>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">

        </div>
    </div>
</div>


@stop
