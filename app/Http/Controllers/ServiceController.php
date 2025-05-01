<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Offer;
use App\Models\Review;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showServiceDetail(Service $service)
    {
        $user = auth()->user();
        //offers where service_id = $service->id and status = accepted
        $offers = Offer::where("service_id", $service->id)
            ->where("status", "accepted")
            ->get();
        $review = Review::where("offer_id", $offers[0]->id)
            ->get();

        return view("user.serviceDetails", [
            "user" => $user,
            "service" => $service,
            "offer" => $offers,
            "review" => $review,
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
    public function store(StoreServiceRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        //
    }
}
