<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Http\Requests\StoreMessageRequest;
use App\Http\Requests\UpdateMessageRequest;
use App\Models\Conversation;
use App\Models\Offer;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function showMsg()
    {
        $user = auth()->user();
        //get all offers where provider->user->id = $user->provider->user()->id and status = accepted
        $offers = Offer::where("provider_id", $user->provider->id)
            ->where("status", "accepted")
            ->get();
        //get all conversations where offer_id = $offers->id
        $conversations = Conversation::where("offer_id", $offers[0]->id)->get();
        return view("provider.messages", ["user" => $user, "conversations" => $conversations]);
    }
    //create function to send message
    public function storemsg(Request $request, Conversation $conversation)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        $user = auth()->user();
        Message::create([
            "content" => $validated['content'],
            "conversation_id" => $conversation->id,
            "user_id" => $user->id,
        ]);
        return redirect()->back()->with('success', 'Message sent!');
    }
    public function showusermsg(Conversation $conversation)
    {
        $user = auth()->user();
        $messages = $conversation->messages()->where('conversation_id', $conversation->id)->get();
        return view("provider.contactUser", [
            "user" => $user,
            "messages" => $messages,
        ]);
    }
    public function sendToUsermsg(Request $request, Conversation $conversation)
    {
        $validated = $request->validate([
            'content' => 'required|string|max:1000',
        ]);
        $user = auth()->user();
        Message::create([
            "content" => $validated['content'],
            "conversation_id" => $conversation->id,
            "user_id" => $user->id,
        ]);
        return redirect()->back()->with('success', 'Message sent!');
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
    public function store(StoreMessageRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Message $message)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMessageRequest $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Message $message)
    {
        //
    }
}
