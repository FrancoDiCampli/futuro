<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(){
        return user()->notifications;
    }
    public function unread(){
        $notifications = user()->unreadNotifications;
        foreach (user()->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return view('messages.show',compact('notifications'));
    }
}
