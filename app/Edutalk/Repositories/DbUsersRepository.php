<?php

namespace Edutalk\Repositories;
use Follow;
use User;

class DbUsersRepository implements UsersRepositoryInterface {

    /* Alle Talks von allen Benutzern suchen */
    public function getAll()
    {
        return User::orderBy('username', 'asc')->get();
    }
    public function getAllPaginated($count)
    {
        return User::orderBy('username', 'asc')->paginate($count);
    }

    /* User mit der ID $id suchen */
    public function find($id)
    {
        return User::findOrFail($id);
    }

    /* User($id) mit all seinen Talks, geordnet nach Erstellungsdatum */
    public function getWithTalks($id)
    {
        $user = User::with(['talks' => function($query)
        {
            $query->orderBy('created_at', 'desc');
        }])->find($id);

        return $user;
    }

    /* Alle User welche dem User mit der ID $id folgen*/
    public function getPaginatedFollowers($id)
    {
        return Follow::where('follow', $id)->paginate(28);
    }

    /* Alle User denen der User mit der ID $id folgt */
    public function getPaginatedFollowing($id)
    {
        return Follow::where('user_id', $id)->paginate(28);
    }

    /* Alle User denen der User mit der ID $id folgt */
    public function getFollowingTalks($id)
    {
        $following = Follow::where('user_id', $id);
        $users = [];

        foreach ($following as $user)
        {
            $users = array_add($users, "user", $user);
        }

        return $following;
    }

}