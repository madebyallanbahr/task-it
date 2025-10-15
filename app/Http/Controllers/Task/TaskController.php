<?php

namespace App\Http\Controllers\Task;

use App\DTO\TaskDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Task;
use App\Services\TaskService;

class TaskController extends Controller
{
    private TaskService $taskService;
    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function index()
    {
//        todo: fazer paginação / conclusão de tarefas/mudança de status
//        $tasks->withPath('/admin/users');
        return view('tasks.index', ['tasks' => auth()->user()->tasks()->paginate(5)]);
    }

    public function create()
    {
       return view('tasks.create');
    }

    public function store(StoreTaskRequest $request)
    {
        $this->taskService->store(TaskDTO::fromRequest($request));

        return redirect()->route('dashboard.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTaskRequest $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Task::find($id)->delete();

        return back();
    }
}
