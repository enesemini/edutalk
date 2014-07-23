<div class="timeline-container">
    {{ Form::open(['route' => 'talks.store']) }}
    <!-- Message Form Input -->
    <div class="form-group">
        {{ Form::label('message','Talk schreiben:', ['class' => 'sr-only']) }}
        {{ Form::textarea('message', null, ['class' => 'et-form', 'placeholder' => "Let's talk...", 'rows' => 2]) }}
    </div>
    <!--  Form Input -->
    <div class="form-group">
        {{ Form::submit('Talk erstellen', array('class' => 'btn btn-et pull-right')); }}
    </div>
    {{ Form::close() }}
    <div class="clearfix"></div>
</div>