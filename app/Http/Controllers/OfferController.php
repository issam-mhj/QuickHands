<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Http\Requests\StoreOfferRequest;
use App\Http\Requests\UpdateOfferRequest;
use App\Models\Service;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    public function sendOffer(Request $request, Service $id)
    {
        $validated = $request->validate([
            'amount' => 'required|numeric|min:1',
            'estimated_time' => 'required|integer|min:1',
            'message' => 'nullable|string|max:1000',
        ]);

        Offer::create([
            "proposed_amount" => $request->amount,
            "estimated_time" => $request->estimated_time,
            "provider_id" => auth()->user()->provider->id,
            "service_id" => $id->id,
        ]);

        return redirect()->back()->with('success', 'Offer submitted!');
    }
    public function acceptOffer(Request $request, Offer $offer)
    {
        $offer->update([
            'status' => 'accepted',
        ]);
        $task = Task::create([
            'start_date' => now(),
            'end_date' => now()->addHours($offer->estimated_time),
            'offer_id' => $offer->id,
            'service_id' => $offer->service_id,
            'status' => 'not-started',
        ]);

        return redirect()->back()->with('success', 'Offer accepted!');
    }
    public function rejectOffer(Request $request, Offer $offer)
    {
        $offer->update([
            'status' => 'rejected',
        ]);

        return redirect()->back()->with('success', 'Offer rejected!');
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
    public function store(StoreOfferRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Offer $offer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Offer $offer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOfferRequest $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return redirect()->back();
    }
}
