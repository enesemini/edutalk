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


                    <a class="follow-btn" href="{{URL::route('groups.store', $group->id)}}">Folgen</a>


                </div>
            </div>
        </div>
    </div>
</div>
@stop