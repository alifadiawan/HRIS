<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Models\Member;
use App\Models\User;
use ArielMejiaDev\LarapexCharts\Facades\LarapexChart;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $Request)
    {

        //employee chart
        $user = auth()->user()->member->id;
        $employee = Task::where('member_id', $user)->get();

        $todoCount = $employee->where('status', 'todo')->count();
        $doingCount = $employee->where('status', 'doing')->count();
        $checkingCount = $employee->where('status', 'checking')->count();
        $doneCount = $employee->where('status', 'done')->count();

        $employee_chart = LarapexChart::setType('pie')
            ->setLabels(['To do', 'Doing', 'Checking', 'Done'])
            ->setColors(['#808080', '#0861fd', '#ffa500', '#69d36d'])
            ->setDataset([$todoCount, $doingCount, $checkingCount, $doneCount]);

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
            return view('welcome', compact('task', 'task_adm', 'task_all', 'task_todo', 'task_doing', 'task_checking', 'task_done', 'new', 'employee_chart', 'member' ,'admin_chart'));
        } else {
            return view('welcome');
        }
    }

    public function ria(Request $Request, $id)
    {
        //admin chart
        $tasks = Task::where('member_id',$id);


        $todoCount = $tasks->where('status', 'todo')->get()->count();
        $doingCount = $tasks->where('status', 'doing')->get()->count();
        $checkingCount = $tasks->where('status', 'checking')->get()->count();
        $doneCount = $tasks->where('status', 'done')->get()->count();

        $admin_chart = LarapexChart::setType('pie')
            ->setLabels(['To do', 'Doing', 'Checking', 'Done'])
            ->setDataset([$todoCount, $doingCount, $checkingCount, $doneCount]);

            // return response()->json(['admin_chart'=>$admin_chart]);
            return view('chart', compact('admin_chart'));
            // return $admin_chart;
    }

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
