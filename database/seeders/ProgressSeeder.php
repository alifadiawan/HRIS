<?php

namespace Database\Seeders;

use App\Models\Progress;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class ProgressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $progress= [
            [
                'tasks_id' => 2,
                'progress' => 20,
                'keterangan' => 'cuman seperempat dulu aja',
                'created_at'=> carbon::parse('25-06-2023')
            ],
            [
                'tasks_id' => 3,
                'progress' => 100,
                'keterangan' => 'setengah jalan',
                'created_at'=> carbon::parse('25-06-2023')
            ],
            [
                'tasks_id' => 3,
                'progress' => 100,
                'keterangan' => 'done 200',
                'created_at'=> carbon::parse('25-06-2023')
            ],
            [
                'tasks_id' => 4,
                'progress' => 200,
                'keterangan' => '1 shot azzah',
                'created_at'=> carbon::parse('25-06-2023')
            ],
        ];

        Progress::insert($progress);
    }
}
