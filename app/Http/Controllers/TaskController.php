<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showTask()
    {
        $user = auth()->user();
        $tasks = Task::count();
        $alltasks = Task::all();
        $Activetasks = Task::where("status", "in-progress")->count();
        $notStartedTasks = Task::where("status", "not-started")->count();
        $completedTasks = Task::where("status", "completed")->count();
        $completationRate = $completedTasks * 100 / $tasks;
        return view("admin.tasks", [
            "user" => $user,
            "taskNum" => $tasks,
            "activeTaskNum" => $Activetasks,
            "notStartedTasks" => $notStartedTasks,
            "rateCompleted" => $completationRate,
            "tasks" => $alltasks,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTaskRequest $request)
    {
        //
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
    public function deleteTask(Task $id)
    {
        $id->delete();
        return redirect()->back();
    }
}
