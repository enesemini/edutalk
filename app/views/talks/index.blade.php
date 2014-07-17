@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>Talks</h1>
            <hr/>
            <!-- Talk erstellen -->
            <h2>Talk erstellen</h2>
            {{ Form::open(array('route' => 'talks')) }}
                <!-- Body Form Input -->
                <div class="form-group">
                    {{ Form::label('body','Body:') }}
                    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
                </div>
                <!--  Form Input -->
                <div class="form-group">
                    {{ Form::label('',':') }}
                    {{ Form::text('', null, ['class' => 'form-control']) }}
                </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
@stop