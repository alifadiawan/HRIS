<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TipeProgress;

class TipeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $tipe =
        [
            [
                'nama_tipe' =>'nominal',
            ],
            [
                'nama_tipe' =>'presentase',
            ],
            [
                'nama_tipe' =>'idr',
            ],
        ];

        TipeProgress::insert($tipe);
    }
}
