@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-6 col-sm-offset-3">
            <div class="timeline-container">
                <h3>Neue Gruppe kreieren</h3>
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
                {{ Form::checkbox('private', null, ['class' => 'form-control']) }}
            </div>

            <!--  Form Input -->
            <div class="form-group">
            <button type="submit" class="btn btn-et pull-right" value="Gruppe erstellen">Gruppe erstellen</button>
            </div>
            <div class="clearfix"></div>
            {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

@stop