@extends('layouts.default')

@section('content')

<div class="container">
    <div class="row">
        <div class="col- col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ Form::open(array('route' => 'groups.store')) }}
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('name','Name:') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <!-- Description Form Input -->
            <div class="form-group">
                {{ Form::label('description','Description:') }}
                {{ Form::text('description', null, ['class' => 'form-control']) }}
            </div>
            <!-- Private Form Input -->
            <div class="form-group">
                {{ Form::label('private','Private:') }}
                {{ Form::text('private', null, ['class' => 'form-control']) }}
            </div>

            <!--  Form Input -->
            <div class="form-group">
                {{ Form::submit('Gruppe erstellen', array('class' => 'btn btn-et pull-right')); }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop