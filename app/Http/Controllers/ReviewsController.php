<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use App\Http\Requests\StoreReviewsRequest;
use App\Http\Requests\UpdateReviewsRequest;
use App\Models\Offer;
use App\Models\Review;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{
    public function showUserReviews()
    {
        $user = auth()->user();
        $services = Service::where("user_id", $user->id)->get();
        $offers = Offer::whereIn("service_id", $services->pluck("id"))
            ->where("status", "accepted")
            ->get();
        $tasks = Task::whereIn("offer_id", $offers->pluck("id"))
            ->where("status", "completed")
            ->get();
        $offersWithoutRv = Offer::whereIn("id", $tasks->pluck("offer_id"))
            ->whereNotIn("id", Review::pluck("offer_id"))
            ->get();
        $offersWithRv = Offer::whereIn("id", $tasks->pluck("offer_id"))
            ->whereIn("id", Review::pluck("offer_id"))
            ->get();

        return view("user.feedback", [
            "user" => $user,
            "offerswithoutRv" => $offersWithoutRv,
            "offerswithRv" => $offersWithRv,
        ]);
    }
    public function storeReview(Request $request, Offer $offer)
    {
        $validated = $request->validate([
            'overall' => 'required|integer|min:1|max:5',
            'review' => 'nullable|string|max:1000',
        ]);
        Review::create([
            "rating" => $validated['overall'],
            "comment" => $validated['review'],
            "offer_id" => $offer->id,
        ]);
        return redirect()->back()->with('success', 'Review submitted!');
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
    public function store(StoreReviewsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Reviews $reviews)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reviews $reviews)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewsRequest $request, Reviews $reviews)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reviews $reviews)
    {
        //
    }
}
