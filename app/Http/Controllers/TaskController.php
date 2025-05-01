<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Requests\StoreTaskRequest;
use App\Http\Requests\UpdateTaskRequest;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

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

    public function showPostTask()
    {
        $user = auth()->user();
        $taskcategories = ServiceCategory::all();
        return view("user.postTask", [
            "user" => $user,
            "taskcategories" => $taskcategories,
        ]);
    }
    public function storeTask(Request $request)
    {
        $validated = $request->validate(
            [
                'serviceTitle' => 'required|string|max:30',
                'serviceDescription' => 'required|string|max:1000',
                'service_category' => 'required|exists:service_categories,id',
                'serviceLocation' => 'required|string|max:100',
                'serviceDate' => 'required|date',
            ]
        );
        $user = auth()->user();
        $service = Service::create([
            "title" => $validated['serviceTitle'],
            "description" => $validated['serviceDescription'],
            "desired_date" => $validated['serviceDate'],
            "location" => $validated['serviceLocation'],
            "status" => "open",
            "user_id" => $user->id,
            "service_category_id" => $validated['service_category'],
        ]);
        return redirect()->back()->with("done", "You have posted the task successfully");
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
