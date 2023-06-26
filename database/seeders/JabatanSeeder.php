<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jabatan;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jabatan = [
            [
                'nama_jabatan' => 'karyawan',
            ],
            [
                'nama_jabatan' => 'supervisor',
            ],
            [
                'nama_jabatan' => 'staff',
            ],
            [
                'nama_jabatan' => 'hrd',
            ],
        ];

        Jabatan::insert($jabatan);
    }
}
