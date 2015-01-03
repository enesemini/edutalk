@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        @include('groups.partials.groupSideNav')
        <div class="col col-xs-12 col-sm-12 col-md-6">
            <div class="et-container">
                <h3>Mitglieder</h3>
                @if (count($members)>0)
                <ul class="et-list">
                    @foreach ($members as $member)
                    <div class="col col-xs-6 col-sm-4 col-md-3 col-lg-3">
                        <li class="et-list-item">
                            <a href="{{ URL::route('users.show'), $member->username}} "><img class="img-circle" src="js/holder.js/50x50" alt="{{$member->username}}"/></a>
                            <a href="{{ URL::route('users.show'), $member->username}} ">{{"@".$member->username}}</a>

                        </li>
                    </div>
                    @endforeach
                </ul>
                <div class="clearfix"></div>
                @else
                <p class="grey">Dieser Gruppe hat keine Mitglieder.</p>
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