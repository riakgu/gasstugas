<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = "Admin";
        $admin->email = "admin@demo.com";
        $admin->phone = "0812345678900";
        $admin->password = Hash::make('admin');
        $admin->save();
        $admin->assignRole('admin');

        $user = new User();
        $user->name = "User";
        $user->email = "user@demo.com";
        $user->phone = "0812345678901";
        $user->password = Hash::make('user');
        $user->save();
        $user->assignRole('user');
    }
}
