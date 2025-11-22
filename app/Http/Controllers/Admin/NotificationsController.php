<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function index()
    {
        $notifications = Contact::where('is_read', false)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get()
            ->map(function ($contact) {
                return [
                    'id' => $contact->id,
                    'title' => 'New Contact from ' . $contact->name,
                    'message' => $contact->subject ?: substr($contact->message, 0, 50) . '...',
                    'time' => $contact->created_at->diffForHumans(),
                    'email' => $contact->email,
                ];
            });

        $unreadCount = Contact::where('is_read', false)->count();

        return response()->json([
            'notifications' => $notifications,
            'unread_count' => $unreadCount,
        ]);
    }

    public function markAsRead($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }

    public function markAllAsRead()
    {
        Contact::where('is_read', false)->update(['is_read' => true]);

        return response()->json(['success' => true]);
    }
}
