<?php

namespace Edutalk\Repositories;

use Talk;
use User;

class DbTalksRepository implements TalksRepositoryInterface {

    /* Alle Talks von allen Benutzern suchen */
    public function getAll()
    {
        return Talk::orderBy('created_at', 'desc')->get();
    }

    /* Talk mit der ID $id suchen */
    public function find($id)
    {
        return Talk::findOrFail($id);
    }



} 