@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row" style="margin-top: 20px;">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <a href="{{URL::route('groups.create')}}" class="pull-right btn btn-primary"><i class="fa fa-plus"></i> Gruppe erstellen</a>
            <h1 style="margin: 0;">Meine Gruppen</h1>
            <hr/>
            <div class="row">
                @foreach ($groups as $group)
                    <div class="col col-xs-12 col-sm-4 col-md-3">
                        <div class="et-container">
                            <a href="{{URL::route('groups.show', $group->id)}}">{{$group->name}}</a>
                            <p>{{$group->description}}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</div>
@stop