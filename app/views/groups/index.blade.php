@extends('layouts.default')

@section ('content')
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h1>Gruppen</h1>
            <hr/>
            <table class="table table-striped">
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Beschreibung</th>
                    <th>Ersteller</th>
                </tr>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{$group->id}}</td>
                        <td>{{$group->name}}</td>
                        <td>{{$group->description}}</td>
                        <td>{{$group->user->first_name}} {{$group->user->last_name}}</td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>
</div>
@stop