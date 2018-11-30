<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public static $menu = ['name' => 'Users', 'route' => 'admin.users.index', 'icon' => 'icon-people'];
    public static $breadcrumb = [['title' => 'Users', 'route' => 'admin.users.index']];

    public function index()
    {
        $users = User::paginate(20);

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $this->addToBreadcrumb(['title' => 'Edit User']);

        return view('admin.users.edit', compact('user'));
    }

    public function create()
    {
        $this->addToBreadcrumb(['title' => 'Create User']);

        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);

        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('admin.users.index');
    }

    public function update(Request $request, User $user)
    {
        $data = $request->except(['_token']);

        $user->update($data);

        return redirect()->route('admin.users.index');
    }

    public function toggleEmailNotification(User $user)
    {
        Setting::toggleState($user->email . '_notification');

        return redirect()->route('admin.users.index');
    }

    public function toggle(User $user)
    {
        $user->active = !$user->active;
        $user->save();

        return redirect()->route('admin.users.index');
    }
}
