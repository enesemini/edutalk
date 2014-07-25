@extends ('layouts.default')

@section ('content')



<div class="container">
    <div class="row">
        <div class="col-lg-3">
            @include('_partials/userProfileSidebar')
        </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="et-container">
                <h3>Following</h3>
                @if (count($follows)>0)
                <ul class="et-list">
                    @foreach ($follows as $follow)
                    <div class="col col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <li class="et-list-item">
                            <a href="{{ URL::route('users.show'), $follow->follower->username}} "><img class="img-circle" src="js/holder.js/50x50" alt="{{$follow->follower->username}}"/></a>
                            <a href="{{ URL::route('users.show'), $follow->follower->username}} ">{{"@".$follow->follower->username}}</a>

                        </li>
                    </div>
                    @endforeach
                </ul>
                <div class="clearfix"></div>
                @else
                <p class="grey">Dieser Benutzer folgt niemandem.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            {{$follows->links()}}
        </div>
    </div>
</div>
@stop