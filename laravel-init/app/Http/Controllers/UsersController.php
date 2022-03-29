<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

class UsersController extends Controller
{

    public function index(User $user)
    {
        return view('users.index', ['users' => User::all()]);
    }


    public function create()
    {
        return view('users.create');
    }


    public function store(StoreUserRequest $request)
    {
        $input = $request->only(['name', 'email', 'password', 'is_admin']);
        $input['password'] = bcrypt ($input['password']); // bcrypt pour Crypter le mot de passe
        $user = User::create($input);


        return redirect()->route('users.index');
    }


    public function show(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.show', ['user' => $user]);
    }


    public function edit(User $user): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        return view('users.edit', ['user' => $user]);
    }


    public function update(UpdateUserRequest $request, User $user): \Illuminate\Http\RedirectResponse
    {
        $input = $request->only(['name', 'email', 'is_admin']);
        $user->update($input);

        return redirect()->route('users.show', $user);
    }


    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index');
    }
}
