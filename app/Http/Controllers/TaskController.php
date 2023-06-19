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
        $mid = Member::where('user_id', $uid)->value('id');
        // return $mid;

        $task_member = Task::where('member_id', $mid)->get();
        $task_adm = Task::all();
        $progress = Progress::all();
        // return $task;
        $member = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->get();
        // return $member;
        $tipe = TipeProgress::all();
        $kpi = KPI::where('isActive', true)->get();
        return view('kpi.goals', compact('task_member', 'member', 'tipe', 'task_adm', 'mid', 'kpi', 'progress'));
    }
    
    public function searchData(Request $request)
    {
        $member_id = $request->input('member_id');
        $task = Task::where('member_id', $member_id)->get();

        // Mengembalikan respon dalam format JSON
        return response()->json(['task' => $task]);
    }

    public function get_member(Request $request, $kpiId)
    {
        $kpi = KPI::findOrFail($kpiId);
        $members = $kpi->mapping()->with('divisi')->get();
        return response()->json($members);
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
        $task_id = $request->task_id;
        $task = Task::find($task_id);

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

    public function view_prog(Request $Request)
    {
        $task = Task::find($Request->task_id);
        $mid = $task->member_id;
        $member = Member::find($mid);
        $member = $task->member;
        $kpi_id = $task->kpi_id;
        $kpi = KPI::find($kpi_id);
        $progress = Progress::where('tasks_id', $Request->task_id)->latest('created_at')->get();

        return view('kpi.score_data', compact('task', 'kpi', 'progress'));
    }



    public function progress(Request $request)
    {
        $cek = $request->keterangan;
        $tid =  $request->task_id;
        $task = Task::where('id', $tid)->first();
        $gp = $request->goal_progress;

        if ($cek == null) {
            $task->update([
                'grade' => $request->grade
            ]);
        } else {
            // progress karyawan
            Progress::create([
                'tasks_id' => $request->task_id,
                'progress' => $gp,
                'keterangan' => $request->keterangan,
            ]);
            $task->update([
                'goal_progress' => $gp
            ]);

            if ($task->goal_progress > 0) {
                $task->update([
                    'status' => 'doing'
                ]);
            }

            if ($gp == $task->goal_target) {
                $task->update([
                    'status' => 'checking'
                ]);
            }
            // end progress karyawan
            $slider_val = $request->slider;
            if ($slider_val) {
                $task->update([
                    'grade' => $slider_val
                ]);
            }
        }

        // nilai admin

        // end nilai admin
        return redirect()->route('goals.index');
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
            'kpi_id' => 'required',
            'goal_target' => 'required|numeric|min:1',
            'tipe_id' => 'required',
            'tanggal_target' => 'required',
            'member_id' => 'required',
            'status' => 'required',
        ]);

        $task = new Task();
        $task->goal_id = '#' . $data['goal_id'];
        $task->kpi_id = $data['kpi_id'];
        $task->owner_id = auth()->user()->member->id;
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
