<?php

namespace App\Charts;

use ArielMejiaDev\LarapexCharts\LarapexChart;
use App\Http\Controllers\DashboardController;
use App\Models\Task;

class Find_Employee_pie
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($id): \ArielMejiaDev\LarapexCharts\PieChart
    {
        $tasks = Task::where('member_id', $id)->get();

        $todoCount = $tasks->where('status', 'todo')->count();
        $doingCount = $tasks->where('status', 'doing')->count();
        $checkingCount = $tasks->where('status', 'checking')->count();
        $doneCount = $tasks->where('status', 'done')->count();


        return $this->chart->pieChart()
            ->setColors(['#808080', '#0861fd', '#ffa500', '#69d36d'])
            ->addData([$todoCount, $doingCount, $checkingCount, $doneCount])
            ->setLabels(['To do', 'Doing', 'Checking', 'Done']);
    }
}
