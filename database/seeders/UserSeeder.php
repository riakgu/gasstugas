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
        $user = new User();
        $user->name = "Rizky";
        $user->email = "rizky@mail.com";
        $user->phone = "081222771607";
        $user->password = Hash::make('rizky');
        $user->save();

        $user->assignRole('admin');
    }
}
