<?php

namespace Edutalk\Repositories;

interface UsersRepositoryInterface {
    public function getAll();
    public function getAllPaginated($count);
    public function find($id);
    public function getWithTalks($id);
    public function getPaginatedFollowing($id);
    public function getPaginatedFollowers($id);
}