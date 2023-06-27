<?php

namespace App\Http\Controllers;

use App\Charts\Find_Employee_pie;
use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Member;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;
// use ArielMejiaDev\LarapexCharts\LarapexChart;

class DashboardController extends Controller
{
    // protected $chart;

    // public function __construct(LarapexChart $chart)
    // {
    //     $this->chart = $chart;
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        //employee chart
        $user = auth()->user()->member->id;
        $employee = Task::where('member_id', $user)->get();

        $todoCount = $employee->where('status', 'todo')->count();
        $doingCount = $employee->where('status', 'doing')->count();
        $checkingCount = $employee->where('status', 'checking')->count();
        $doneCount = $employee->where('status', 'done')->count();

        if ($employee->isEmpty()) {
            $employee_chart = [];
        } else {

            $employee_chart = LarapexChart::setType('pie')
                ->setLabels(['To do', 'Doing', 'Checking', 'Done'])
                ->setColors(['#808080', '#0861fd', '#ffa500', '#69d36d'])
                ->setDataset([$todoCount, $doingCount, $checkingCount, $doneCount]);
        }

        //admin chart
        $tasks = Task::all();

        $todoCount = $tasks->where('status', 'todo')->count();
        $doingCount = $tasks->where('status', 'doing')->count();
        $checkingCount = $tasks->where('status', 'checking')->count();
        $doneCount = $tasks->where('status', 'done')->count();

        $admin_chart = LarapexChart::setType('pie')
            ->setLabels(['To do', 'Doing', 'Checking', 'Done'])
            ->setColors(['#808080', '#0861fd', '#ffa500', '#69d36d'])
            ->setDataset([$todoCount, $doingCount, $checkingCount, $doneCount]);

        if (auth()->user()->hasProfile()) {
            $new = Member::whereHas('user', function ($query) {
                $query->whereHas('role', function ($user) {
                    $user->where('role', '!=', 'admin');
                });
            })->where('jabatan_id', null)->get();
            $task = Task::where('member_id', auth()->user()->member->id)->where('status', '!=', 'done')->latest()->take(4)->get();
            $task_adm = Task::latest()->take(5)->get();
            $task_all = Task::all();
            $task_todo = Task::where('status', 'todo')->get();
            $task_doing = Task::where('status', 'doing')->get();
            $task_done = Task::where('status', 'done')->get();
            $task_checking = Task::where('status', 'checking')->get();
            $member = Member::whereHas('user', function ($query) {
                $query->whereHas('role', function ($user) {
                    $user->where('role', '!=', 'admin');
                });
            })->get();

            return view('welcome', compact('task', 'task_adm', 'task_all', 'task_todo', 'task_doing', 'task_checking', 'task_done', 'new', 'employee_chart', 'member', 'admin_chart'));
        } else {
            return view('welcome');
        }
    }



    public function ria($id)
    {
        //admin chart

        $chart = $this->build($id);

        // $admin_chart = LarapexChart::setType('pie')
        //     ->setLabels(['To do', 'Doing', 'Checking', 'Done'])
        //     ->setDataset([$todoCount, $doingCount, $checkingCount, $doneCount]);

        // return response()->json(['admin_chart' => $admin_chart]);
        // return response()->json(['todoCount'=>$todoCount]);
        return view('chart',  ['chart' => $chart]);
        // return $admin_chart;
    }

    // public function build($id): \ArielMejiaDev\LarapexCharts\PieChart
    // {
    //     $tasks = Task::where('member_id', $id)->get();

    //     $todoCount = $tasks->where('status', 'todo')->count();
    //     $doingCount = $tasks->where('status', 'doing')->count();
    //     $checkingCount = $tasks->where('status', 'checking')->count();
    //     $doneCount = $tasks->where('status', 'done')->count();

    //     return $this->chart->pieChart()
    //         ->setTitle('Top 3 scorers of the team.')
    //         ->setSubtitle('Season 2021.')
    //         ->addData([
    //             $todoCount, $doingCount, $checkingCount, $doneCount
    //         ])->setColors(['#808080', '#0861fd', '#ffa500', '#69d36d'])
    //         ->setLabels(['To do', 'Doing', 'Checking', 'Done']);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
