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
                'username' =>'ilhxm',
                'email' =>'ilhxm@gmail.com',
                'password' =>bcrypt('123'),
                'role_id' =>1,
            ],
            [
                'username' =>'alip',
                'email' =>'alip@gmail.com',
                'password' =>bcrypt('123'),
                'role_id' =>1,
            ],
            [
                'username' =>'steven',
                'email' =>'steven@gmail.com',
                'password' =>bcrypt('123'),
                'role_id' =>1,
            ],
            [
                'username' =>'rafli',
                'email' =>'rafli@gmail.com',
                'password' =>bcrypt('123'),
                'role_id' =>1,
            ],
        ];

        user::insert($user);
    }
}
