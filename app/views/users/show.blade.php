@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-3">
            <div class="et-container">
                <div class="profile-info">
                    <img class="profile-pic" src="js/holder.js/100x100" alt=""/>
                    <h1 class="profile-name">{{$user->first_name}} {{$user->last_name}}</h1>
                    <a class="profile-username" href="#">{{"@".$user->username}}</a><br/>
                    @if(count(Follow::where('user_id',Auth::user()->id)->where('follow', $user->id)->first()) > 0)
                    <a class="follow-btn unfollow-btn" href="{{URL::route('unfollow', $user->username)}}">Folge ich</a>
                    @else
                    <a class="follow-btn" href="{{URL::route('follow', $user->username)}}">Folgen</a>
                    @endif

                </div>
                <h3>Followers <span class="follow-count">{{$followersCount}}</span></h3>
                <div class="follow-container">
                    @foreach ($followers as $follower)
                    <a class="follow-thumb" data-toggle="tooltip" title="{{$follower->user->username}}" href="{{URL::route('users.show', $follower->user->username)}}">
                        <img src="js/holder.js/87x87" alt=""/>
                    </a>
                    @endforeach
                </div>
                <h3>Following <span class="follow-count">{{$followingCount}}</span></h3>

                <div class="follow-container">
                    @foreach ($following as $follow)
                    <a class="follow-thumb" data-toggle="tooltip" title="{{$follow->follower->username}}" href="{{URL::route('users.show', $follow->follower->username)}}">
                        <img src="js/holder.js/87x87" alt=""/>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            @include('_partials.createTalk')
            <div class="timeline-container">
                <h3>Talks von {{$user->first_name}} {{$user->last_name}}</h3>

                @if(count($user->talks))
                    @foreach ($user->talks as $talk)
                    <article class="file-talk talk">
                        <i class="fa-et fa fa-graduation-cap"></i>
                        <div class="talk-body">
                            <span class="user">{{$talk->user->first_name}} {{$talk->user->last_name}}</span>
                            <a href="#" class="short-link"> {{"@".$talk->user->username}}</a>
                            <p>{{$talk->message}}</p>
                            <span class="time">posted {{$talk->created_at->diffForHumans()}}</span>
                        </div>
                    </article>
                    @endforeach
                @else
                <p>{{$user->first_name}} hat noch keine eigenen Talks.</p>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('scripts')
<script>
    $('document').ready(function(){
        $("a[data-toggle='tooltip']").tooltip();
    });
</script>
@stop
