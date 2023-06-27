<?php

namespace Database\Seeders;

use App\Models\Task;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

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
                'goal_id' => '#1098',
                'kpi_id' => 5,
                'owner_id' => 1,
                'goal_target' => 5000000000,
                'goal_progress' => 0,
                'tipe_id' => 3,
                'tanggal_target' => Carbon::parse('15-08-2023'),
                'grade' => '',
                'status' => 'todo',
                'member_id' => 3,
                'created_at' => Carbon::parse('14-06-2023'),
            ],
            [
                'goal_id' => '#2048',
                'kpi_id' => 3,
                'owner_id' => 2,
                'goal_target' => 100,
                'goal_progress' => 20,
                'tipe_id' => 2,
                'tanggal_target' => Carbon::parse('15-08-2023'),
                'grade' => '',
                'status' => 'doing',
                'member_id' => 4,
                'created_at' => Carbon::parse('14-06-2023'),
            ],
            [
                'goal_id' => '#3078',
                'kpi_id' => 7,
                'owner_id' => 1,
                'goal_target' => 200,
                'goal_progress' => 200,
                'tipe_id' => 1,
                'tanggal_target' => Carbon::parse('15-08-2023'),
                'grade' => '',
                'status' => 'checking',
                'member_id' => 4,
                'created_at' => Carbon::parse('14-06-2023'),
            ],
            [
                'goal_id' => '#3489',
                'kpi_id' => 6,
                'owner_id' => 2,
                'goal_target' => 200,
                'goal_progress' => 200,
                'tipe_id' => 1,
                'tanggal_target' => Carbon::parse('15-08-2023'),
                'grade' => '69',
                'status' => 'done',
                'member_id' => 4,
                'created_at' => Carbon::createFromFormat('d-m-Y H:i:s', '14-06-2023 12:10:00'),
                // 'update_at' => Carbon::createFromFormat('d-m-Y H:i:s','24-06-2023 10:10:10'),
            ],
            [
                'goal_id' => '#2321',
                'kpi_id' => 8,
                'owner_id' => 2,
                'goal_target' => 100,
                'goal_progress' => 0,
                'tipe_id' => 2,
                'tanggal_target' => Carbon::parse('15-08-2023'),
                'grade' => '',
                'status' => 'todo',
                'member_id' => 4,
                'created_at' => Carbon::parse('14-06-2023'),
            ],
        ];

        Task::insert($task);

        $task = Task::all();
        foreach ($task as $t) {
            $t->updated_at =   Carbon::createFromFormat('d-m-Y H:i:s', '30-06-2023 06:09:00');
            $t->save();
        }

    }
}
