<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Contact::orderBy('created_at', 'desc')->paginate(10);

        return Inertia::render('Admin/Messages', [
            'user' => Auth::user(),
            'messages' => $messages,
        ]);
    }

    public function show(Contact $contact)
    {
        if (!$contact->is_read) {
            $contact->update(['is_read' => true]);
        }

        return response()->json($contact);
    }

    public function markAsRead(Contact $contact)
    {
        $contact->update(['is_read' => true]);
        return back();
    }

    public function markAsUnread(Contact $contact)
    {
        $contact->update(['is_read' => false]);
        return back();
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return back()->with('success', 'Message deleted successfully.');
    }
}
