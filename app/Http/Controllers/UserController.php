<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function create(): View
    {
        return view('users.create');
    }

    public function store(UserRequest $request): RedirectResponse
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $roles = implode(',', (array) $request->get('role'));
        $roles_array = explode(',', $roles);
        $user->roles()->attach($roles_array);
        return redirect()->route('user.index');
    }

    public function edit($id): View
    {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(UserRequest $request, $id): RedirectResponse
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $roles = implode(',', (array) $request->get('role'));
        $roles_array = explode(',', $roles);
        $user->roles()->sync($roles_array);
        return redirect()->route('user.index');
    }

    public function destroy($id): RedirectResponse
    {
        User::find($id)->delete();

        return redirect()->route('user.index');
    }
}
