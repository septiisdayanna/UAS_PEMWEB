<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
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
            'roles' => Role::all(), // Mengambil semua roles
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
    
        // Hanya update password jika password diisi
        if ($data['password'] != '') {
            $data['password'] = bcrypt($data['password']);
        } else {
            unset($data['password']); // Hapus password dari data jika tidak diubah
        }
    
        // Hanya update role jika pengguna yang sedang login adalah admin
        if (auth()->user()->role_id == 1) {
            User::find($id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'role_id' => $data['role_id'],
                'password' => $data['password'] ?? null,
            ]);
        } else {
            User::find($id)->update([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $data['password'] ?? null,
            ]);
        }
    
        return back()->with('success', 'User has been updated');
    }      

    public function destroy(string $id)
    {
        User::find($id)->delete();

        return back()->with('success', 'User has been deleted');
    }
}
