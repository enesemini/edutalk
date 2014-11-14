@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-6 col-sm-offset-3">
            <div class="timeline-container">
                {{ Form::open(array('route' => 'groups.store')) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name','Gruppenname') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <!-- Description Form Input -->
            <div class="form-group">
                {{ Form::label('description','Beschreibung der Gruppe') }}
                {{ Form::text('description', null, ['class' => 'form-control']) }}
            </div>
            <!-- Private Form Input -->
            <div class="form-group">
                {{ Form::label('private','Privat') }}
                {{ Form::text('private', null, ['class' => 'form-control']) }}
            </div>

            <!--  Form Input -->
            <div class="form-group">
                {{ Form::submit('Gruppe erstellen', array('class' => 'btn btn-et pull-right')); }}
            </div>
            <div class="clearfix"></div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop