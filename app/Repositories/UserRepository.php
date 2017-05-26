<?php

namespace App\Repositories;

use App\User;

class UserRepository extends AbstractRepository
{

    function __construct(User $model)
    {
        $this->model = $model;
    }
}