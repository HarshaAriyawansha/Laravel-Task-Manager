<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
{
    $query = User::query();
    $users = $query->paginate(5)->withQueryString();

    return view('user.index', compact('users'));
}

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email',
        'password' => 'required|string|min:6|max:10|confirmed',
        'usertype' => 'required|in:admin,user', // only admin or user
    ]);

    User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password, // password auto-hashed by User model
        'usertype' => $request->usertype,
    ]);

    return redirect()->route('users.index')->with('status', 'User Created Successfully');
}

    public function edit(User $user)
{
    return view('user.edit', [
        'user' => $user
    ]);
}


    public function update(Request $request, User $user)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        'password' => 'nullable|string|min:6|max:10|confirmed',
        'usertype' => 'required|in:admin,user',
    ]);

    $user->update([
        'name' => $request->name,
        'email' => $request->email,
        'password' => $request->password ? Hash::make($request->password) : $user->password,
        'usertype' => $request->usertype,
    ]);

    return redirect()->route('users.index')->with('status', 'User Updated Successfully');
}


    public function destroy($userId)
    {
        $user = User::find($userId);
        $user->delete();
        return redirect('users')->with('status', 'User Deleted Successfully');
    }
}
