<?php

namespace App\Services;

use App\DTO\UserDTO;
use App\Interfaces\UserInterface;
use App\Models\User;
use App\Repositories\UserRepository;

// todo: revisar conceito de services / repositories e outras patterns
// todo: desenvolver ui/ux e interface.
// todo: ...

class UserService implements UserInterface
{
    private UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

     public function store(UserDTO $userDTO) : User
     {
        return $this->userRepository->store($userDTO);
     }
}
