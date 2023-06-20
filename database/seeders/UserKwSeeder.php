<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserKwSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $user = [
            [
                'username' => 'ilhxm',
                'email' => 'ilhxm@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 1,
            ],
            [
                'username' => 'alip',
                'email' => 'alip@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 1,
            ],
            [
                'username' => 'steven',
                'email' => 'steven@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 1,
            ],
            [
                'username' => 'rafli',
                'email' => 'rafli@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 1,
            ],
            [
                'username' => 'employee1',
                'email' => 'employee1@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 2,
            ],
            [
                'username' => 'employee2',
                'email' => 'employee2@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 2,
            ],
            [
                'username' => 'employee3',
                'email' => 'employee3@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 2,
            ],
            [
                'username' => 'employee4',
                'email' => 'employee4@gmail.com',
                'password' => bcrypt('123'),
                'role_id' => 2,
            ],
        ];
        User::insert($user);
    }
}
