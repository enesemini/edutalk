@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-lg-3">
            @include('_partials/userProfileSidebar')
        </div>
        <div class="col-lg-6">
            @if (Auth::id()==$user->id)
                @include('_partials.createTalk')
            @endif

            <div class="timeline-container">
                <h3>Talks von {{$user->first_name}} {{$user->last_name}}</h3>

                @if(count($user->talks))
                    @foreach ($user->talks as $talk)
                    <article class="talk">
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
                <p class="grey">{{$user->first_name}} hat noch keine eigenen Talks.</p>
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
