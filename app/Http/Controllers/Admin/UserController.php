<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::when(request()->q, function ($users) {
            $users = $users->where('name', 'like', '%' . request()->q . '%');
        })
            ->where('id', '!=', 1)
            ->latest()
            ->paginate(10);

        $users->appends(['q' => request()->q]);

        return inertia('Admin/Users/Index', [
            'users' => $users,
        ]);
    }

    public function create()
    {
        return inertia('Admin/Users/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|unique:users',
            'password'      => 'required|confirmed',
        ]);

        User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'password'      => $request->password,
        ]);

        return redirect()->route('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return inertia('Admin/Users/Edit', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'email'         => 'required|unique:users,email,' . $user->id,
            'password'      => 'confirmed'
        ]);

        if ($request->password == "") {

            $user->update([
                'name'          => $request->name,
                'email'         => $request->email,
            ]);
        } else {

            $user->update([
                'name'          => $request->name,
                'email'         => $request->email,
                'password'      => $request->password,
            ]);
        }

        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
