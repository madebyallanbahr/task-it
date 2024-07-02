<?php

namespace App\DTO;

use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class UserDTO extends DTO
{

    public function __construct(public string $name,
                                public string $email,
                                public string $password)
    {
        $this->password = Hash::make($this->password);
    }

    public static function fromStoreUserRequest(StoreUserRequest $request): UserDTO
    {
        return new self(...$request->validated());
    }

    public static function fromUpdateUserRequest(UpdateUserRequest $request): UserDTO
    {
        return new self(...$request->validated());
    }
    public static function fromAuthUserRequest(AuthUserRequest $request): UserDTO
    {
        return new self(...$request->validated());
    }
}
