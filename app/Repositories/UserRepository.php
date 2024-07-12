<?php

namespace App\Repositories;

use App\DTO\UserDTO;
use App\Interfaces\UserInterface;
use App\Models\User;

class UserRepository implements UserInterface
{
    public function store(UserDTO $userDTO): User
    {
        return User::create($userDTO->toArray());
    }
}
