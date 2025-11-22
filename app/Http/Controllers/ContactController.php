<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Setting;
use App\Models\SocialLink;
use App\Mail\ContactFormSubmittedAdmin;
use App\Mail\ContactFormSubmittedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Inertia\Inertia;

class ContactController extends Controller
{
    public function index()
    {
        $settings = Setting::where('group', 'contact')->pluck('value', 'key');
        $socialLinks = SocialLink::active()->get();

        return Inertia::render('Contact', [
            'settings' => $settings,
            'socialLinks' => $socialLinks,
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $contact = Contact::create($validated);

        try {
            // Send email to admin
            Mail::to('ajayupadhyay030@gmail.com')->send(new ContactFormSubmittedAdmin($contact));

            // Send confirmation email to user
            Mail::to($contact->email)->send(new ContactFormSubmittedUser($contact));
        } catch (\Exception $e) {
            // Log the error but don't fail the request
            \Log::error('Failed to send contact form emails: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
