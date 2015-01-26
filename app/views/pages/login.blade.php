@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-8 col-md-offset-2 col-lg-6 col-lg-offset-3">
            <div class="login et-container">
                <h2>Login</h2>
                <hr class="dark-hr"/>
                {{ Form::open(array('route' => 'login')) }}
                <!-- Email Input -->
                <div class="form-group">
                    {{ Form::label('email', 'Email:') }}
                    {{ Form::email('email', '', array('class' => 'form-control', 'placeholder' => 'Email Adresse')); }}
                </div>
                <!-- Password Input -->
                <div class="form-group">
                    {{ Form::label('password', 'Email:') }}
                    {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Passwort')); }}
                </div>
                <p><a href="#">Passwort vergessen?</a></p>
                <div class="form-group">
                    {{ Form::submit('Login', array('class' => 'btn btn-et pull-right')); }}
                </div>
                <div class="clearfix"></div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
@stop