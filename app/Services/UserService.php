<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Interfaces\UserInterface;
use App\Models\User;

class UserService implements UserInterface
{
     public function store(UserDTO $userDTO) : User
     {
        return User::create($userDTO->toArray());
     }
}
