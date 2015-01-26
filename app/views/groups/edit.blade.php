@extends('layouts.default')

@section('content')

<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-6 col-md-offset-3 col-lg-6 col-lg-offset-3">
        <div class="et-container">
            {{ Form::model($group, ['method' => 'POST', 'route' => ['groups.update', $group->id]]) }}
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
            <button type="submit" class="btn btn-et pull-right" value="Gruppe erstellen">Bearbeiten</button>
            <button type="button" class="btn btn-danger pull-right" data-toggle="modal" data-target="#myModal">Gruppe löschen</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Löschen bestätigen</h4>
                      </div>
                      <div class="modal-body">
                        Sind Sie sich sicher, dass Sie diese Gruppe löschen wollen?
                      </div>
                      <div class="modal-footer">
                        <a href="{{URL::route('groups.delete', $group->id)}}" class="btn btn-danger">Löschen</a>
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Schliessen</button>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="clearfix"></div>
            {{ Form::close() }}
        </div>
    </div>
</div>

@stop