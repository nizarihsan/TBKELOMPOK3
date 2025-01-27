<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function showProfile()
    {
        $user = auth()->user();
        return view('user.profile', compact('user'));
    }

    public function showDashboard()
    {
        $user = auth()->user();
        return view('user.beranda', compact('user'));
    }

    public function settings()
    {
        return view('user.settings');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());
        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function notifications()
    {
        $user = auth()->user();
        $notifications = $user->notifications ?? collect(); // Ensure it's a collection
        return view('user.notifications', compact('notifications'));
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();

        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            // Add other fields as necessary
        ]);

        // Update user profile
        $user->update($request->all());

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function index()
{
    $users = User::query()
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('admin.users.index', compact('users'));
}

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'role' => 'required|in:user,admin'
        ]);

        $user->update($validated);
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully');
    }

    public function destroy($id)
    {
        $item = user::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.users.index')->with('success', 'Item deleted successfully');
    }
}
