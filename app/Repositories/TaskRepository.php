<?php

namespace App\Repositories;

use App\DTO\TaskDTO;
use App\Models\Task;

class TaskRepository
{
    public function store(TaskDTO $taskDTO): Task
    {
        return Task::create($taskDTO->toArray());
    }
}
