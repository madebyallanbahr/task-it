<?php

namespace App\Interfaces;

use App\DTO\UserDTO;
use App\Models\User;

interface UserInterface
{
    public function store(UserDTO $userDTO): User;
}
