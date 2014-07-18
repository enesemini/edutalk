@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>Talks</h1>
            <hr/>
            <!-- Talk erstellen -->
            <h2>Talk erstellen</h2>
            {{ Form::open(array('route' => 'talks.store')) }}
                <!-- Message Form Input -->
                <div class="form-group">
                    {{ Form::label('message','Message:') }}
                    {{ Form::text('message', null, ['class' => 'form-control']) }}
                </div>
                <!--  Form Input -->
                <div class="form-group">
                    {{ Form::submit('Talk erstellen', array('class' => 'btn btn-et pull-right')); }}
                </div>
            {{ Form::close() }}
            <div class="clearfix"></div>
            <hr/>
            <h1>Alle Talks vom eingeloggten User</h1>

            <ul class="list-group">
                @foreach ($user->talks as $talk)
                <li class="list-group-item">{{$talk->message}} <span class="small grey">posted {{$talk->created_at->diffForHumans()}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@stop