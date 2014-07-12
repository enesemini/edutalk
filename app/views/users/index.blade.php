@extends('layouts.default')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>All Users</h1>
            <ul class="list-group">
                @foreach ($users as $user)
                <li class="list-group-item">{{$user->email}}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>

@stop