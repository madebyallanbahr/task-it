<?php

namespace App\DTO;

use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Hash;

class UserDTO extends DTO
{

    public function __construct(public string $name,
                                public string $email,
                                public string $password)
    {
        $this->password = Hash::make($this->password);
    }

    public static function fromRequest(StoreUserRequest $request): UserDTO
    {
        return new UserDTO(...$request->validated());
    }
}
