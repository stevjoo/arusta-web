<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan semua pengguna
    public function index()
    {
        $users = User::all();
        return view('admin.admin', compact('users'));
    }

    // Menghapus pengguna
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return back()->with('success', 'User has been deleted successfully.');
        } else {
            return back()->with('error', 'User not found.');
        }
    }
}
