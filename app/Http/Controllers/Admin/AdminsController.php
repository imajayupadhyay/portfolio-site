<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Inertia\Inertia;

class AdminsController extends Controller
{
    public function index()
    {
        $admins = User::select('id', 'name', 'email', 'created_at')
            ->orderBy('created_at', 'desc')
            ->get();

        return Inertia::render('Admin/Admins', [
            'admins' => $admins,
            'user' => auth()->user()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Admin created successfully');
    }

    public function update(Request $request, User $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
        ]);

        $admin->update($validated);

        return redirect()->back()->with('success', 'Admin updated successfully');
    }

    public function updatePassword(Request $request, User $admin)
    {
        $validated = $request->validate([
            'password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $admin->update([
            'password' => Hash::make($validated['password']),
        ]);

        return redirect()->back()->with('success', 'Password updated successfully');
    }

    public function destroy(User $admin)
    {
        // Prevent deleting the last admin
        if (User::count() <= 1) {
            return redirect()->back()->withErrors(['error' => 'Cannot delete the last admin']);
        }

        // Prevent deleting yourself
        if ($admin->id === auth()->id()) {
            return redirect()->back()->withErrors(['error' => 'You cannot delete your own account']);
        }

        $admin->delete();

        return redirect()->back()->with('success', 'Admin deleted successfully');
    }
}
