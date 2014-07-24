<?php

namespace Edutalk\Repositories;

interface UsersRepositoryInterface {
    public function getAll();
    public function find($id);
    public function getWithTalks($id);
}