<?php

namespace FreelanceTest\Http\Controllers;

use Illuminate\Http\Request;
use FreelanceTest\User;

class UserNotificationsController extends Controller
{
    public function __construct() 
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return auth()->user()->unreadNotifications;
    }

    public function destroy(User $user, $notificationId = null)
    {
        auth()->user()->notifications()->findOrFail($notificationId)->markAsRead();
    }

    public function destroyAll(User $user, $notificationId = null)
    {
        $notifications = auth()->user()->notifications()->get();
        foreach ($notifications as $notification) {
            $notification->markAsRead();
        }
        return back();
    }
}
