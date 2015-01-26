<div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="et-container">
                <div class="profile-info">
                    <img class="profile-pic" src="js/holder.js/100x100" alt=""/>
                    <h1 class="profile-name">{{$group->name}}</h1>
                    <p class="profile-description">{{$group->description}}</p>
                    <p>Gruppen Administrator: {{$admin->username}}</p>

                    @if ($admin->username == $currentUser->username)
                        <a class="follow-btn" href="{{URL::route('groups.edit', $group->id)}}">Gruppe bearbeiten</a>
                    @endif

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
                                            <li class="et-list-item center-text" id="{{$follower->user->id}}">
                                                <div class="block">
                                                    <img class="img-circle" src="js/holder.js/50x50" alt="{{$follower->user->username}}"/>
                                                </div>
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

                <a class="follow-header" href="{{URL::route('group.members', $group->id)}}"><h3>Mitglieder <span class="follow-count">{{$membersCount}}</span></h3></a>
                <div class="follow-container">
                    @foreach ($sideMembers as $member)
                    <a class="follow-thumb" data-toggle="tooltip" title="{{$member->username}}" href="{{URL::route('users.show', $member->username)}}">
                        <img src="js/holder.js/87x87" alt=""/>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>