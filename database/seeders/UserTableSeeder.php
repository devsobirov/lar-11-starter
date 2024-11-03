<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    public function run()
    {

        if (!DB::table('users')->where('email', 'admin@mail.com')->exists()) {
            User::create([
                'email' => 'admin@mail.com',
                'name' => 'Админ',
                'role' => User::ADMIN,
                'password' => Hash::make('secret')
            ]);
        }
        if (!DB::table('users')->where('email', 'worker@mail.com')->exists()) {
            User::create([
                'email' => 'worker@mail.com',
                'name' => 'Админ',
                'role' => User::WORKER,
                'password' => Hash::make('secret')
            ]);
        }
    }
}
