<?php

namespace App\DTO;

use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;

class ProjectDTO extends DTO
{
    public function __construct(public string $name,
                                public string $description,
    )
    {
    }

    public static function fromRequest(StoreProjectRequest $request): ProjectDTO
    {
        return new self(...$request->validated());
    }

    public static function fromUpdateUserRequest(UpdateProjectRequest $request): ProjectDTO
    {
        return new self(...$request->validated());
    }
}
