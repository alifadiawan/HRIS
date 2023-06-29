<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function read(Request $request)
    {
        $user = Auth::user();
        $url = $request->input('notificationUrl');

        // Temukan notifikasi dengan URL yang sesuai dan tandai sebagai "dibaca"
        $notification = $user->unreadNotifications()->where('data->url', $url)->first();
        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['success' => true]);

    }

    public function get_notif()
    {
        $notifications = auth()->user()->unreadNotifications;

        return view('notification.notif-fetch', compact('notifications'));
    }
}
