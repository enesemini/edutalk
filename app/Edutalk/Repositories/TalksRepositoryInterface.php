<?php

namespace Edutalk\Repositories;

interface TalksRepositoryInterface {
    public function getAll();
    public function find($id);
}