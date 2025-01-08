<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
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

    public function update(UpdateTaskRequest $request, Task $task)
    {
        if($request->status === 'completed') {
            $task->concluded_at = now();
        }

        $task->update($request->validated());
        return new TaskResource($task);
    }

    public function destroy(Task $task)
    {
        $task->delete();
        return response(null, 204);
    }
}
