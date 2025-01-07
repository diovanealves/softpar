<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateCompletedTaskRequest;
use App\Http\Resources\TaskResource;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController
{
    public function index(Request $request)
    {
        $order = $request->query('order', 'desc');

        if(!in_array($order, ['asc', 'desc'])){
            return response()->json(['error', 'Invalid order value. Use asc or desc'], 400);
        }

        $tasks = Task::orderBy('created_at', $order)->get();
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
