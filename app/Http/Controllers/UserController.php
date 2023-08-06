<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{User, Role };


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', ['roles' => $roles]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|max:5',
            'roles' => 'required|array',
        ]);

        $user = User::create($request->all());
        $user->roles()->attach($request->input('roles'));
        return to_route('users.index')->with('success', 'User Created Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', ['user' => $user]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::get();
        return view('users.edit', ['user' => $user, 'roles' => $roles]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required|string|max:255'.$user->id,
            'email' => 'required|email',
            'roles' => 'required|array',
        ]);

        $user->update($request->all());
        $user->roles()->sync($request->input('roles'));
        return to_route('users.index')->with('success', 'User Created Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->roles()->detach();
        $user->delete();
        return to_route('users.index')->with('success', 'User Deleted Successfully.');
    }
}
