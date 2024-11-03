<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\UserUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::paginate();

        return view('admin.users.index', compact('users'));
    }

    public function save(UserUpdateRequest $request, ?User $user)
    {
        $data = $request->validated();

        if (!$user->id || $request->password) {
            $request->validate([
                'password' => 'required|confirmed|string|min:6',
            ]);
            $data['password'] = Hash::make($request->password);
        }

        $user->fill($data);
        $user->save();

        return redirect()->back()->with('success', 'Muvaffaqiyatli saqlandi');
    }

}
