<?php

namespace App\DTO;

use App\Enums\PriorityEnum;
use App\Enums\StatusEnum;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Support\Facades\Hash;

class TaskDTO extends DTO
{
    public function __construct(public string $name,
                                public string $description,
                                public string $due_date,
                                public PriorityEnum $priority,
                                public StatusEnum $status,
                                public string $user_id,
                                public ?string $project_id = null,
                                public bool $is_completed = false,
                                public bool $favorite = false,
                            )
    {
    }

    public static function fromStoreUserRequest(StoreUserRequest $request): UserDTO
    {
        return new self(...$request->validated());
    }

    public static function fromUpdateUserRequest(UpdateUserRequest $request): UserDTO
    {
        return new self(...$request->validated());
    }
}
