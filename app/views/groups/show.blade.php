@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="et-container">
                <div class="profile-info">
                    <img class="profile-pic" src="js/holder.js/100x100" alt=""/>
                    <h1 class="profile-name">{{$group->name}}</h1>
                    <p class="profile-description">{{$group->description}}</p>
                    <p>Gruppen Administrator: {{$admin->username}}</p>

                    @if ($access)
                    <a class="follow-btn" href="{{URL::route('groups.leaveGroup', $group->id)}}">Austreten</a>
                    <!-- trigger modal  to invite a friend to the group-->
                    <a href="#" class="follow-btn" data-toggle="modal" data-target="#myModal">
                      Freunde einladen
                    </a>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                            <h4 class="modal-title" id="myModalLabel">Wählen Sie einen Freund aus:</h4>
                          </div>
                          <div class="modal-body">
                            <div class="row">
                                <ul class="et-list">
                                    @foreach ($followers as $follower)
                                        @if($follower->user->isInGroup($group->id))
                                        @else
                                        <div class="col col-xs-6 col-sm-4">
                                            <li class="et-list-item" id="{{$follower->user->id}}">
                                                <img class="img-circle" src="js/holder.js/50x50" alt="{{$follower->user->username}}"/>
                                                <p>{{"@".$follower->user->username}}</p>
                                            </li>
                                        </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                          </div>
                          <div class="modal-footer">
                            {{ Form::open(array('route' => 'group.invite')) }}
                                <input name="users" type="hidden" class="invite-input">
                                <input name="group" type="hidden" value="{{$group->id}}">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Schliessen</button>
                                <button type="submit" class="btn btn-primary">Einladen</button>
                            {{ Form::close() }}
                          </div>
                        </div>
                      </div>
                    </div>
                    @elseif ($group->private==1)
                    <a class="follow-btn follow-btn-disabled">Private Gruppe</a>
                    @else
                    <a class="follow-btn" href="{{URL::route('groups.enterGroup', $group->id)}}">Beitreten</a>
                    @endif

                </div>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6">
            @if ($access)
                @include('_partials.createTalk')
            @endif
            <div class="et-container">
                @if ($access)
                    @if (count($talks))
                        <h3>Talks</h3>
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
                    @else
                    <p>Es gibt noch keine Einträge zu dieser Gruppe.</p>
                    @endif
                @else
                <p>Sie haben keinen Zugriff auf diese Gruppe.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    $(document).ready(function() {
        var list = [];
        $('.et-list-item').click(function(){
            var item = $(this).attr('id');
            if ($(this).hasClass('selected')){
                $(this).removeClass('selected');
                list = jQuery.grep(list, function(value) {
                  return value != item;
                });
                $('.invite-input').attr('value',list);
            } else {
                $(this).addClass('selected');
                list.push(item);
                $('.invite-input').attr('value',list);
            }
        })
    })
</script>
@stop