<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:users.create')->only('create', 'store');
        $this->middleware('can:users.read')->only('index', 'show');
        $this->middleware('can:users.update')->only('edit', 'update');
        $this->middleware('can:users.delete')->only('destroy');
    }

    public function index()
    {
        $users = User::where('id', '!=', auth()->user()->id)->get();

        return view('users.index', [
            'title' => 'Users',
            'users' => $users,
        ]);
    }

    public function create()
    {
        $roles = Role::all();

        return view('users.create', [
            'title' => 'Create User',
            'roles' => $roles
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users', 'max:255'],
            'phone' => ['required', 'regex:/(08)[0-9]{9}/', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'],
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'password' => Hash::make($validated['password']),
        ]);

        $user->assignRole($validated['role']);
        // $user->createDefaultCategories();

        return redirect('/users')->with('success', 'User has been created!');
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('users.edit', [
            'title' => 'Edit User',
            'user' => $user,
            'roles' => $roles
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id, 'max:255'],
            'phone' => ['required', 'regex:/(08)[0-9]{9}/', 'unique:users,phone,' . $user->id],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'in:admin,user'],
        ]);

        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        $user->removeRole($user->roles->first()->name);
        $user->assignRole($validated['role']);

        if ($request->filled('password')) {
            $user->update([
                'password' => Hash::make($validated['password']),
            ]);
        }

        return redirect('/users')->with('success', 'User has been updated!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect('/users')->with('success', 'User has been deleted!');
    }
}
