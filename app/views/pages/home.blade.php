@extends('layouts.default')

@section ('content')

<div class="container">
    <div class="jumbotron">

        <h2>Willkommen auf Edutalk!</h2>
        <p>Entdecken Sie Edutalk und registrieren Sie sich noch heute!</p>
        <a class="btn btn-et btn-lg" href="{{ URL::route('register') }}">Registrieren</a>

    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-4">
            <div class="home-info">
                <i class="fa fa-graduation-cap fa-home"></i>
                <h3>Für Schüler!</h3>
                <p>Edutalk ist eine Plattform für Schüler zum Austausch von Informationen und Aufgaben.</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="home-info">
                <i class="fa fa-mobile fa-home"></i>
                <h3>Zuhause & unterwegs</h3>
                <p>Greifen Sie mit verschiedenen Geräten auf Ihr Profil zu.</p>
            </div>
        </div>
        <div class="col-xs-12 col-sm-4">
            <div class="home-info">
                <i class="fa fa-shield fa-home"></i>
                <h3>Privatssphäre</h3>
                <p>Erstellen Sie ein privates Profil auf Edutalk.</p>
            </div>
        </div>
    </div>

    {{--<div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2 info-section">
            <h2>Lorem ipsum dolor sit amet, consetetur sadipscing elitr</h2>
            <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et</p>
        </div>
    </div>--}}
</div>


@stop
