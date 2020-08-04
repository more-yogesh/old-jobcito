<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        return auth()->user()->unreadNotifications()->paginate(5);
    }

    public function markNotificationAsRead($notification)
    {
        $notifications = auth()->user()->notifications()->find($notification);
        if ($notifications) {
            $notifications->markAsRead();
        }
        return response()->json(['success' => 'marked as read'], '200');
    }

    public function allNotifications()
    {
        $notifications = auth()->user()->notifications()->paginate(5);
        return view('notification.index', compact('notifications'));
    }
}
