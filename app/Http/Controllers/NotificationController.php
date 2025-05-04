<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Http\Requests\StoreNotificationRequest;
use App\Http\Requests\UpdateNotificationRequest;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function showNotifications()
    {
        $user = auth()->user();
        $allNotif = Notification::count();
        $notif = Notification::all();
        $unreadNotif = Notification::where("read_status", "0")->count();
        return view("admin.notification", [
            "user" => $user,
            "notifNum" => $allNotif,
            "UnNotifNum" => $unreadNotif,
            "notifs" => $notif,
        ]);
    }

    public function markasread()
    {
        $notifs = Notification::all();
        foreach ($notifs as $notif) {
            $notif->update(["read_status" => "1"]);
        }
        return redirect()->back();
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
    public function store(StoreNotificationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotificationRequest $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
}
