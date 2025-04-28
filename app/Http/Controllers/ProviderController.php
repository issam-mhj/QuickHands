<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Review;
use App\Models\Task;
use App\Models\User;

class ProviderController extends Controller
{
    public function showProviderDashboard()
    {
        $user = auth()->user();
        $completedTasks = Task::where("status", "completed")->get();
        $mycompletedTasks = Task::select('tasks.*')
            ->join('offers', 'tasks.offer_id', '=', 'offers.id')
            ->where('tasks.status', 'completed')
            ->where('offers.provider_id', $user->provider->id)
            ->get();
        $inprogressTasks = Task::where("status", "in-progress")->get();
        $notstartedTasks = Task::where("status", "not-started")->get();
        $reviews = Review::all();
        $countRvw = 0;
        $rvwNUM = 0;
        $earnSum = 0;
        $countinprogress = 0;
        $countnotstarted = 0;
        foreach ($reviews as $rvw) {
            if ($user->provider->id == $rvw->offer->provider_id) {
                $countRvw += $rvw->rating;
                $rvwNUM++;
            }
        }
        foreach ($completedTasks as $task) {
            if ($user->provider->id == $task->offer->provider_id) {
                $earnSum += $task->offer->proposed_amount;
            }
        }
        foreach ($inprogressTasks as $task) {
            if ($user->provider->id == $task->offer->provider_id) {
                $countinprogress++;
            }
        }
        foreach ($notstartedTasks as $task) {
            if ($user->provider->id == $task->offer->provider_id) {
                $countnotstarted++;
            }
        }
        $skills[] = explode(",", $user->provider->skills);
        $reviews =  Review::select('reviews.*')
            ->join('offers', 'reviews.offer_id', '=', 'offers.id')
            ->where('offers.provider_id', $user->provider->id)
            ->get();
        return view("provider.dashboard", [
            "user" => $user,
            "tasks" => $completedTasks,
            "reviewsAVG" => $countRvw / $rvwNUM,
            "reviewsNum" => $rvwNUM,
            "earnSum" => $earnSum,
            "inprogress" => $countinprogress,
            "notstarted" => $countnotstarted,
            "notcompleted" => $countnotstarted + $countinprogress,
            "myCompletedTasks" => $mycompletedTasks,
            "skills" => $skills,
            "reviews" => $reviews,
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
    public function store(StoreProviderRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Provider $provider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Provider $provider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProviderRequest $request, Provider $provider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Provider $provider)
    {
        //
    }
}
