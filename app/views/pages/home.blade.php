@extends('layouts.default')

@section ('content')

@if(Auth::check())
<div class="container">
    <div class="row">
        <div class="col col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Hallo {{Auth::user()->username}}, willkommen auf Edutalk!</h2>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="groups-container">
                <h3>Gruppen</h3>
                <ul>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <h4>3fW</h4>
                        <p>Manuel Egger, Rafael Reifler</p>
                        <div class="clearfix"></div>
                    </li>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <h4>Private Gruppe</h4>
                        <p>Manuel Egger, Rafael Reifler,...</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="timeline-container">
                <h3>3fW</h3>
                <div class="file-talk">
                    <i class="fa-et fa fa-file"></i>
                    <a href="#" class="btn-et pull-right"><i class="fa fa-download"></i></a>
                    <p><span class="user">Christoph Gerber</span> hat eine neue Datei hochgeladen.</p>

                </div>
            </div>
        </div>
        <div class="col col-xs-12 col-sm-12 col-md-3 col-lg-3">
            <div class="friends-container">
                <h3>5 neuste Freunde</h3>
                <ul>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <a href="#" class="btn-et" data-toggle="tooltip" data-placement="top" title="Nachricht"><i class="fa fa-comment"></i></a>
                        <p>Manuel Egger</p>
                    </li>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <a href="#" class="btn-et" data-toggle="tooltip" data-placement="top" title="Nachricht"><i class="fa fa-comment"></i></a>
                        <p>Rafael Reifler</p>
                    </li>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <a href="#" class="btn-et" data-toggle="tooltip" data-placement="top" title="Nachricht"><i class="fa fa-comment"></i></a>
                        <p>Rafael Reifler</p>
                    </li>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <a href="#" class="btn-et" data-toggle="tooltip" data-placement="top" title="Nachricht"><i class="fa fa-comment"></i></a>
                        <p>Rafael Reifler</p>
                    </li>
                    <li>
                        <img src="js/holder.js/40x40" alt="" class="img-circle"/>
                        <a href="#" class="btn-et" data-toggle="tooltip" data-placement="top" title="Nachricht"><i class="fa fa-comment"></i></a>
                        <p>Rafael Reifler</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@else
<div class="container">
    <div class="jumbotron">

        <h2>Willkommen auf Edutalk!</h2>
        <p>Entdecken Sie Edutalk und registrieren Sie sich noch heute!</p>
        <a class="btn btn-et btn-lg" href="{{ URL::route('register') }}">Registrieren</a>

    </div>
</div>
@endif

@stop
