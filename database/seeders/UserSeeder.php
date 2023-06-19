<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = [
            [
                'username' =>'admin',
                'email' =>'admin@gmail.com',
                'password' =>bcrypt('123'),
                'role_id' =>1,
            ],
            [
                'username' =>'employee',
                'email' =>'employee@gmail.com',
                'password' =>bcrypt('123'),
                'role_id' =>2,
            ],
        ];

        User::insert($user);
    }
}
