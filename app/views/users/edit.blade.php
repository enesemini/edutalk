@extends('layouts.default')

@section('content')

<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        <div class="et-container">
            {{ Form::model($user, ['method' => 'POST', 'route' => ['user.update', $user->username]]) }}
            <!-- Username Form Input -->
            <div class="form-group">
                {{ Form::label('username','Username:') }}
                {{ Form::text('username', null, ['class' => 'form-control']) }}
            </div>
            <!-- Name Form Input -->
            <div class="form-group">
                {{ Form::label('last_name','Name:') }}
                {{ Form::text('last_name', null, ['class' => 'form-control']) }}
            </div>
            <!-- Vorname Form Input -->
            <div class="form-group">
                {{ Form::label('first_name','Vorname:') }}
                {{ Form::text('first_name', null, ['class' => 'form-control']) }}
            </div>
            <!-- Email Form Input -->
            <div class="form-group">
                {{ Form::label('email','Email:') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>
            <!-- Password Form Input -->
            <div class="form-group">
                {{ Form::label('password','Password:') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>
            <!-- Password_confirmation Form Input -->
            <div class="form-group">
                {{ Form::label('password_confirmation','Password bestätigen:') }}
                {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Speichern', array('class' => 'btn btn-et')); }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop