<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateCompletedTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;

class TaskController
{
    public function index()
    {
        $tasks = Task::all();
        return TaskResource::collection($tasks);
    }

    public function store(StoreTaskRequest $request)
    {
        $task =Task::query()->create($request->validated());
        return new TaskResource($task, 201);
    }

    public function updateStatus(UpdateCompletedTaskRequest $request, Task $task){
        $task->status = $request->status;
        $task->save();

        return new TaskResource($task);
    }

    public function update(StoreTaskRequest $request, Task $task)
    {
        $task->update($request->validated());
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, 204);
    }
}
