<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Http\Requests\StoreConversationRequest;
use App\Http\Requests\UpdateConversationRequest;
use App\Models\Offer;
use App\Models\Service;

class ConversationController extends Controller
{


    public function showMessages()
    {
        $user = auth()->user();
        $services = Service::where('user_id', $user->id)->get();
        $serviceIds = $services->pluck('id')->toArray();
        $offers = Offer::where('status', 'accepted')
            ->whereIn('service_id', $serviceIds)
            ->get();
        $offerIds = $offers->pluck('id')->toArray();
        $conversations = Conversation::whereIn('offer_id', $offerIds)->get();
        return view("user.messages", [
            "user" => $user,
            "conversations" => $conversations,
        ]);
    }

    public function showusermsg(Conversation $conversation)
    {
        $user = auth()->user();
        $messages = $conversation->messages()->where('conversation_id', $conversation->id)->get();
        return view("user.contactUser", [
            "user" => $user,
            "messages" => $messages,
        ]);
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreConversationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Conversation $conversation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Conversation $conversation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConversationRequest $request, Conversation $conversation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Conversation $conversation)
    {
        //
    }
}
