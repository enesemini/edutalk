@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        @include('groups.partials.groupSideNav')
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