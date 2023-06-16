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
                'add_ons' => ','
            ],
            [
                'nama_tipe' =>'persentase',
                'add_ons' => '%'
            ],
            [
                'nama_tipe' =>'idr',
                'add_ons' => 'Rp. '
            ],
        ];

        TipeProgress::insert($tipe);
    }
}
