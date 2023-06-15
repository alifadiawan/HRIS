<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Divisi;

class DivisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisi = [
            [
                'nama_divisi' => 'information technology',
            ],
            [
                'nama_divisi' => 'marketing',
            ],
        ];


        Divisi::insert($divisi);

    }
}
