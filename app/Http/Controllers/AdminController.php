<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use App\Role;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();
        $users->load('role');

        return view('admin/index', compact('users'));
    }

    public function create()
    {
        $roles = Role::orderBy('id', 'asc')
            ->get()
            ->pluck('name', 'id');

        return view('admin/create', compact('roles'));
    }

    public function edit(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $roles = Role::orderBy('id', 'asc')
            ->get()
            ->pluck('name', 'id');

        return view('admin/edit', compact('user', 'roles'));
    }

    public function store(Request $request)
    {
        $user = new User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->role_id = $request['role'];
        $user->password =
            '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm';
        $user->save();

        return redirect('admin/')->with(
            'status',
            'Saved user! Reset password email sent to ' . $request['name']
        );
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update($request->all());

        return redirect('admin/')->with(
            'status',
            'Updated user' . $request['name']
        );
    }

    public function destroy(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('admin/')->with(
            'status',
            'Deleted user!' . $request['name']
        );
    }
}
