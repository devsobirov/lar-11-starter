<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Users\ProfileUpdateRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        return view('admin.users.profile');
    }

    public function update(ProfileUpdateRequest $request)
    {
        if ($request->password) {
            $request->validate([
                'password' => 'required|confirmed|string|min:6',
            ]);
            auth()->user()->update(['password' => Hash::make($request->password)]);
        }

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'telegram_chat_id' => $request->telegram_chat_id
        ]);

        return redirect()->back()->with('success', 'Muvaffaqiyatli saqlandi');
    }

}
