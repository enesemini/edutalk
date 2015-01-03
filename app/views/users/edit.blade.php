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
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Profil löschen</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Löschen bestätigen</h4>
                      </div>
                      <div class="modal-body">
                        Sind Sie sich sicher, dass Sie Ihr Profil löschen wollen?
                      </div>
                      <div class="modal-footer">
                        <a href="{{URL::route('user.delete', $user->id)}}" class="btn btn-danger">Löschen</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Schliessen</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop