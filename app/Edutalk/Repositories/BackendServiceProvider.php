<?php namespace Edutalk\Repositories;

use Illuminate\Support\ServiceProvider;

class BackendServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->app->bind(
            'Edutalk\Repositories\TalksRepositoryInterface',
            'Edutalk\Repositories\DbTalksRepository'
        );
        $this->app->bind(
            'Edutalk\Repositories\UsersRepositoryInterface',
            'Edutalk\Repositories\DbUsersRepository'
        );


    }

}