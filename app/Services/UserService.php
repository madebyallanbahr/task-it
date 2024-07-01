<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Models\User;

class UserService
{
     public function store(UserDTO $dto)
     {
        return User::create($dto->toArray());
     }
}
