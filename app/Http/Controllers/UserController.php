<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $users = User::with('review')->paginate(10);
        return view('admin.admin', compact('users'));
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user && !$user->isAdmin()) {  // Ensure non-admin users can be deleted
            $user->delete();
            return back()->with('success', 'User has been deleted successfully.');
        } else {
            return back()->with('error', 'Cannot delete an admin user.');  // Prevent admin deletion
        }
    }

    // Menampilkan form untuk mengedit pengguna
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.edit', compact('user'));
    }

    // Memperbarui pengguna setelah edit
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        return redirect()->route('admin')->with('success', 'User updated successfully');
    }
}
