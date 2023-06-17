<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\Task;
use App\Models\TipeProgress;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Progress;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $uid = auth()->user()->id;
        $mid = member::where('user_id', $uid)->value('id');
        // return $mid;

        $task = Task::where('member_id', $mid)->get();
        $task_adm = Task::all();
        // return $task;
        $member = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->get();
        // return $member;
        $tipe = TipeProgress::all();
        return view('kpi.goals', compact('task', 'member', 'tipe', 'task_adm', 'mid'));
    }

    public function group_data()
    {
        // $kpi_mapping = ;
        $kpi = KPI::all();
        // return $kpi;

        return view('kpi.groupdata');
    }


    public function update_adm(request $request)
    {
        $delete = $request->delete;
        $mark = $request->mark;
        $slider_val = $request->slider;
        $task_id = $request->task_id;
        $task = Task::find($task_id);

        if ($slider_val) {
            $task->update([
                'grade' => $slider_val
            ]);
        }

        if ($mark) {
            $progress = $task->goal_target;
            $task->update([
                // 'goal_progress' => $progress,
                'status' => $mark
            ]);
        }

        if ($delete) {
            $task->delete();
        }

        return redirect()->back();
    }

    public function progress(Request $request)
    {
        $tid =  $request->task_id;
        $task = Task::where('id', $tid)->first();
        $gp = $request->goal_progress;

        Progress::create([
            'tasks_id' => $request->task_id,
            'progress' => $gp,
            'keterangan' => $request->keterangan,
        ]);

        $task->update([
            'goal_progress' => $gp
        ]);

        if ($gp == $task->goal_target) {
            $task->update([
                'status' => 'checking'
            ]);
        }
        return redirect()->back();
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
        $data = $request->validate([
            'goal_id' => 'required|numeric|min:1000',
            'goal_name' => 'required',
            'goal_target' => 'required|numeric|min:1',
            'tipe_id' => 'required',
            'tanggal_target' => 'required',
            'member_id' => 'required',
            'status' => 'required',
        ]);

        $task = new Task();
        $task->goal_id = '#' . $data['goal_id'];
        $task->goal_name = $data['goal_name'];
        $task->owner_id = auth()->user()->id;
        $task->goal_target = $data['goal_target'];
        $task->tipe_id = $data['tipe_id'];
        $task->tanggal_target = $data['tanggal_target'];
        $task->member_id = $data['member_id'];
        $task->status = $data['status'];
        $task->save();

        notify()->success('Tugas Telah Diberikan !', 'Tugas');
        return redirect('goals');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        //
    }
}
