@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="login et-container">
                <h2>Registrieren</h2>
                <hr class="dark-hr"/>
                {{ Form::open(array('route' => 'register')) }}
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
                    {{ Form::label('password','Passwort:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <!-- Password_confirmation Form Input -->
                <div class="form-group">
                    {{ Form::label('password_confirmation','Passwort bestätigen:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-et pull-right">Registrieren</button>
                    <div class="clearfix"></div>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop