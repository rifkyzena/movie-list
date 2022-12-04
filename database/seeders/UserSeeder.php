<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'username' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'),
                'role' => 'admin'
            ],
            [
                'username' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('user'),
                'role' => 'user'
            ],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
