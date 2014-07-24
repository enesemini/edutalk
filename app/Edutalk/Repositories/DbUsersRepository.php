<?php

namespace Edutalk\Repositories;
use User;

class DbUsersRepository implements UsersRepositoryInterface {

    /* Alle Talks von allen Benutzern suchen */
    public function getAll()
    {
        return User::orderBy('username', 'asc')->get();
    }

    /* Talk mit der ID $id suchen */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    public function getWithTalks($id)
    {
        $user = User::with(['talks' => function($query)
        {
            $query->orderBy('created_at', 'desc');
        }])->find($id);

        return $user;
    }


}