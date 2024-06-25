<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        if (auth()->user()->role_id == 1) {
            $users = User::get();
        } else {
            $users = User::whereId(auth()->user()->id)->get();
        }

        return view('back.user.index', [
            'users' => $users,
            'roles' => Role::all(),
        ]);
    }

    public function store(UserRequest $request) 
    {
        $data = $request->validated();

        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return back()->with('success', 'User has been created');
    }

    public function update(UserUpdateRequest $request, $id) 
    {
        $data = $request->validated();

        if (!empty($data['password'])) {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']);
        }

        $user = User::find($id);

        if (auth()->user()->role_id == 1) {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'password' => $data['password'] ?? $user->password,
            ]);
        } elseif (auth()->user()->id == $id) {
            $user->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'] ?? $user->password,
            ]);
        } else {
            return back()->withErrors('You do not have permission to edit this user');
        }

        return back()->with('success', 'User has been updated');
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();

        return back()->with('success', 'User has been deleted');
    }
}
