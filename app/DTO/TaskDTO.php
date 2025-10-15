<?php

namespace App\DTO;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskDTO extends DTO
{
    public function __construct(public string $name,
                                public string $description,
                                public ?string $due_date,
                                public string $priority,
                                public string $status,
                                public ?string $user_id = null,
                                public ?string $project_id = null,
                                public bool $is_completed = false,
                                public bool $favorite = false,
                            )
    {
        $this->user_id = auth()->id();
    }

    public static function fromRequest(StoreTaskRequest $request): TaskDTO
    {
        return new self(...$request->validated());
    }

    public static function fromUpdateUserRequest(UpdateTaskRequest $request): TaskDTO
    {
        return new self(...$request->validated());
    }
}
