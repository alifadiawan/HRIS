<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\transaksi;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        return $this->call([
            
            RoleSeeder::class,
            DivisiSeeder::class,
            // UserSeeder::class,
            // MemberSeeder::class,
            UserKwSeeder::class,
            memberKwSeeder::class,
            TipeSeeder::class,

            // BankSeeder::class,
            // EwalletSeeder::class,
            // TransaksiSeeder::class,
            // PembayaranSeeder::class,
            // TransaksiDetailSeeder::class,
            KPISeeder::class,
            TaskSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
