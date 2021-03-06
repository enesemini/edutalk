<div class="et-container">
    <div class="profile-info">
        <img class="profile-pic" src="{{asset('img/et-user.jpg')}}" width="100" alt=""/>
        <h1 class="profile-name">{{$user->first_name}} {{$user->last_name}}</h1>
        <a class="profile-username" href="#">{{"@".$user->username}}</a><br/>
        @if ($signedIn)
            @if ($currentUser->id==$user->id)
                <a class="follow-btn" href="{{URL::route('user.edit', $user->username)}}">Profil bearbeiten</a>
            @else
                @if(count(Follow::where('user_id',Auth::id())->where('follow', $user->id)->first()) > 0)
                <a class="follow-btn unfollow-btn" href="{{URL::route('unfollow', $user->username)}}">Folge ich</a>
                @else
                <a class="follow-btn" href="{{URL::route('follow', $user->username)}}">Folgen</a>
                @endif
            @endif
        @endif

    </div>
    <a class="follow-header" href="{{URL::route('user.followers', $user->username)}}"><h3>Followers <span class="follow-count">{{$followersCount}}</span></h3></a>
    <div class="follow-container">
        @foreach ($followers as $follower)
        <a class="follow-thumb" data-toggle="tooltip" title="{{$follower->user->username}}" href="{{URL::route('users.show', $follower->user->username)}}">
            <img src="{{asset('img/et-user.jpg')}}" style="width: 100%; max-width: 200px;" alt=""/>
        </a>
        @endforeach
    </div>
    <a class="follow-header" href="{{URL::route('user.following', $user->username)}}"><h3>Following <span class="follow-count">{{$followingCount}}</span></h3></a>

    <div class="follow-container">
        @foreach ($following as $follow)
        <a class="follow-thumb" data-toggle="tooltip" title="{{$follow->follower->username}}" href="{{URL::route('users.show', $follow->follower->username)}}">
            <img src="{{asset('img/et-user.jpg')}}" style="width: 100%; max-width: 200px;" alt=""/>
        </a>
        @endforeach
    </div>
</div>