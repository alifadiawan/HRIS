<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $task = [
            [
                'nama_tugas'=>'phase 1: know urself',
                'topik'=>'how to understanding gurl',
                'topik'=>'how to understanding gurl',
            ],
        ];

        Task::insert($task);
    }
}
