<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Http\Requests\StoreProviderRequest;
use App\Http\Requests\UpdateProviderRequest;
use App\Models\Flag;
use App\Models\Offer;
use App\Models\Review;
use App\Models\Service;
use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use League\OAuth1\Client\Server\Server;

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

    public function showAvailableTasks()
    {
        $user = auth()->user();
        $servicesNum = Service::where("status", "open")->count();
        $services = Service::where("status", "open")->get();
        return view("provider.tasks", [
            "user" => $user,
            "servicesNum" => $servicesNum,
            "services" => $services,
        ]);
    }

    public function showTaskManage()
    {
        $user = auth()->user();
        $today = Carbon::today()->toDateString();

        $todayTasks = DB::table('tasks')
            ->join('offers', 'tasks.offer_id', '=', 'offers.id')
            ->join('providers', 'offers.provider_id', '=', 'providers.id')
            ->whereDate('tasks.end_date', $today)
            ->where('providers.user_id', auth()->id())
            ->count();
        $futureTasks = DB::table('tasks')
            ->join('offers', 'tasks.offer_id', '=', 'offers.id')
            ->join('providers', 'offers.provider_id', '=', 'providers.id')
            ->whereDate('tasks.end_date', '>', Carbon::today())
            ->where('providers.user_id', auth()->id())
            ->count();
        $notstarted = DB::table('tasks')
            ->join('offers', 'tasks.offer_id', '=', 'offers.id')
            ->join('providers', 'offers.provider_id', '=', 'providers.id')
            ->whereDate('tasks.end_date', '>', Carbon::today())
            ->where('providers.user_id', auth()->id())->where('tasks.status', 'not-started')
            ->count();
        $currentTasks = Task::with(['offer.provider'])
            ->whereHas('offer.provider', function ($query) {
                $query->where('user_id', auth()->id());
            })
            ->where('status', '!=', 'completed')
            ->get();
        $pendingOffers = Offer::where("provider_id", $user->provider->id)->where("status", "!=", "accepted")->get();
        $finishedTasks = Task::with(['offer.provider'])
            ->whereHas('offer.provider', function ($query) {
                $query->where('user_id', auth()->id());
            })->where('status', '=', 'completed')->get();

        $recievedFlags = Flag::where('user_id', auth()->id())->count();
        $flags = Flag::where('user_id', auth()->id())->get();
        return view("provider.taskmanage", [
            "user" => $user,
            "todayTasks" => $todayTasks,
            "futureTasks" => $futureTasks,
            "notstarted" => $notstarted,
            "tasks" => $currentTasks,
            "pendingOffers" => $pendingOffers,
            "finishedTasks" => $finishedTasks,
            "flagsNum" => $recievedFlags,
            "flags" => $flags,
        ]);
    }

    public function turntostarted(Task $id)
    {
        $id->update(["status" => "in-progress"]);
        return redirect()->back();
    }
    public function showReviews()
    {
        $user = auth()->user();
        $userRVW = Review::with(['offer.provider'])
            ->whereHas('offer.provider', function ($query) {
                $query->where('user_id', auth()->id());
            })->get();
        $countRV = 0;
        $rvNum = 0;
        $fiveStar = 0;
        foreach ($userRVW as $rvw) {
            $countRV += $rvw->rating;
            $rvNum++;
            if($rvw->rating >= 5){
                $fiveStar++;
            }
        }
        // dd($userRVW);
        return view("provider.reviews", [
            "user" => $user,
            "ratingAvg" => $countRV / $rvNum,
            "totalRv" => $rvNum,
            "fiveStar" => $fiveStar,
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
