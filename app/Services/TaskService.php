<?php

namespace App\Services;

use App\DTO\TaskDTO;
use App\Models\Task;
use App\Repositories\TaskRepository;

class TaskService
{
    private TaskRepository $taskRepository;

    public function __construct(TaskRepository $taskRepository)
    {
        $this->taskRepository = $taskRepository;
    }
    public function store(TaskDTO $taskDTO) : Task
    {
        return $this->taskRepository->store($taskDTO);
    }
}
