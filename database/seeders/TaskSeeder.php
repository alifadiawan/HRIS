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
                'goal_id'=>'#1098',
                'goal_name'=>'HR company bookings target for Q3',
                'owner_id'=>1,
                'goal_target'=>5000000000,
                'goal_progress'=>null,
                'tipe_id'=>1,
                'tanggal_target'=>Carbon::parse('15-08-2023'),
                'grade'=>'',
                'status'=>'todo',
                'member_id'=>3,
            ],
            [
                'goal_id'=>'#2048',
                'goal_name'=>'',
                'owner_id'=>2,
                'goal_target'=>100,
                'goal_progress'=>50,
                'tipe_id'=>2,
                'tanggal_target'=>Carbon::parse('15-08-2023'),
                'grade'=>'',
                'status'=>'doing',
                'member_id'=>4,
            ],
            [
                'goal_id'=>'#3078',
                'goal_name'=>'',
                'owner_id'=>1,
                'goal_target'=>200,
                'goal_progress'=>null,
                'tipe_id'=>3,
                'tanggal_target'=>Carbon::parse('15-08-2023'),
                'grade'=>'',
                'status'=>'todo',
                'member_id'=>4,
            ],
        ];

        Task::insert($task);
    }
}
