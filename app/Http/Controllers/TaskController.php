<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\Task;
use App\Models\TipeProgress;
use App\Models\User;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Progress;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function searchData($member_id)
    {
        $task = Task::where('member_id', $member_id)->with(['kpi', 'member', 'owner', 'tipe_progress'])->get();
        $progress = Progress::all();
        return view('kpi.goals_foreach', compact('task', 'progress'));
    }

    public function index(request $request)
    {
        $uid = auth()->user()->id;
        $mid = Member::where('user_id', $uid)->value('id');

        $task_member = Task::where('member_id', $mid)->get();
        $task_adm = Task::all();
        $progress = Progress::all();
        // $taskResponse = $this->searchData($request);
        // $task = $taskResponse->getData()->task;
        // return $task;
        $task = [];
        $member = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->where('jabatan_id', '!=', null)->get();
        // return $member;
        $tipe = TipeProgress::all();
        $kpi = KPI::where('isActive', true)->get();
        return view('kpi.goals', compact('task', 'task_member', 'member', 'tipe', 'task_adm', 'mid', 'kpi', 'progress'));
    }



    public function get_member(Request $request, $kpiId)
    {
        $kpi = KPI::findOrFail($kpiId);
        if ($kpi->divisi_id != null && $kpi->jabatan_id != null) {
            $members = Member::whereHas('user', function($query) {
                $query->whereHas('role', function ($user) {
                    $user->where('role', '!=', 'admin');
                });
            })->where('divisi_id', $kpi->divisi_id)->where('jabatan_id', $kpi->jabatan->id)->with('divisi', 'jabatan')->get();
        } elseif ($kpi->divisi_id != null) {
            $members = Member::whereHas('user', function($query) {
                $query->whereHas('role', function ($user) {
                    $user->where('role', '!=', 'admin');
                });
            })->where('divisi_id', $kpi->divisi_id)->with('divisi', 'jabatan')->get();
        } elseif ($kpi->jabatan_id != null) {
            $members = Member::whereHas('user', function($query) {
                $query->whereHas('role', function ($user) {
                    $user->where('role', '!=', 'admin');
                });
            })->where('jabatan_id', $kpi->jabatan_id)->with('divisi', 'jabatan')->get();
        } else {
            $members = Member::whereHas('user', function($query) {
                $query->whereHas('role', function ($user) {
                    $user->where('role', '!=', 'admin');
                });
            })->whereNotNull('jabatan_id')->with('divisi', 'jabatan')->get();
        }
        return response()->json($members);
    }

    public function group_data()
    {
        // $kpi_mapping = ;
        $kpi = KPI::all();
        // return $kpi;

        return view('kpi.groupdata');
    }


    public function update_adm(Request $Request)
    {
        $delete = $Request->delete;
        $mark = $Request->mark;
        $task_id = $Request->task_id;
        $task = Task::find($task_id);

        if ($mark) {
            $progress = $task->goal_target;
            $task->update([
                // 'goal_progress' => $progress,
                'status' => $mark
            ]);

            // mengirim notifikasi ke user
            $user = User::where('id', $task->member->user->id)->first();
            $judul = "Tugas";
            $message = $judul." Telah Diupdate !!\nStatus Diubah Jadi ".ucfirst($mark);
            $notification = new NewNotification($judul, $message);
            $notification->setUrl(route('goals.index')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('Task berhasil diupdate');
        }

        if ($delete) {
            // mengirim notifikasi ke user
            $user = User::where('id', $task->member->user->id)->first();
            $judul = "Tugas";
            $message = $judul." ".$task->kpi->group_name." \nTelah Dihapus Oleh Admin ".auth()->user()->member->nama;
            $notification = new NewNotification($judul, $message);
            $notification->setUrl(route('goals.index')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            $task->delete();

            sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('Task berhasil dihapus');
        }

        // return redirect()->back();

        return redirect()->route('goals.index');
    }

    public function view_prog(Request $Request)
    {
        $task = Task::find($Request->task_id);
        $previous_progress = Progress::where('tasks_id', $Request->task_id)->latest()->first();
        $mid = $task->member_id;
        $member = Member::find($mid);
        $member = $task->member;
        $kpi_id = $task->kpi_id;
        $kpi = KPI::find($kpi_id);
        $progress = Progress::where('tasks_id', $Request->task_id)->latest('created_at')->get();

        return view('kpi.score_data', compact('task', 'kpi', 'progress', 'previous_progress'));
    }



    public function progress(Request $request)
    {
        $cek = $request->keterangan;
        $tid =  $request->task_id;
        // $task = Task::where('id', $tid)->first();
        $task = Task::find($tid);
        $gp = $request->goal_progress;

        if ($cek == null) {
            $task->update([
                'grade' => $request->grade
            ]);

            // mengirim notifikasi ke user
            $user = User::where('id', $task->member->user->id)->first();
            $judul = "Tugas";
            $message = $judul." ".$task->kpi->group_name." \nTelah Dinilai Oleh Admin ".auth()->user()->member->nama."\n Nilai : ".$request->grade;
            $notification = new NewNotification($judul, $message);
            $notification->setUrl(route('goals.index')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            // nilai admin

            // end nilai admin
            sweetalert()
                ->icon('success')
                ->confirmButtonColor('#0d6efd')
                ->addSuccess('Task Berhasil Dinilai');
        } else {

            // return $request->range;

            // progress karyawan
            $satu = $task->goal_progress+1;
            $data = $request->validate([
                'goal_progress' => "numeric|min:$satu"
            ]);

            Progress::create([
                'tasks_id' => $request->task_id,
                'progress' => $data['goal_progress'],
                'keterangan' => $request->keterangan,
            ]);
            $task->update([
                'goal_progress' => $data['goal_progress']
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
            // $slider_val = $request->slider;
            // if ($slider_val) {
            //     $task->update([
            //         'grade' => $slider_val
            //     ]);
            // }

            // mengirim notifikasi ke user
            $user = User::where('id', $task->member->user->id)->first();
            $judul = "Tugas";
            $message = "Progress Berhasil Ditambahkan";
            $notification = new NewNotification($judul, $message);
            $notification->setUrl(route('goals.index')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            // mengirim notifikasi ke admin
            $user = User::whereHas('member', function($query) use ($task){
                $query->where('id', $task->owner_id);
            })->first();
            $judul = "Tugas";
            $message = "Progress Baru Telah Ditambahkan\nOleh : ".ucwords($task->member->nama);
            $notification = new NewNotification($judul, $message);
            $notification->setUrl(route('goals.index')); // Ganti dengan rute yang sesuai
            Notification::send($user, $notification);

            sweetalert()
                ->icon('success')
                ->confirmButtonColor('#0d6efd')
                ->addSuccess('Progress Berhasil Ditambahkan');
        }

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

        // mengirim notifikasi ke user
        $user = User::where('id', $task->member->user->id)->first();
        $judul = "Tugas";
        $message = "Ada ".$judul." Baru Untukmu\nNama : ".$task->kpi->group_name;
        $notification = new NewNotification($judul, $message);
        $notification->setUrl(route('goals.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('Task berhasil diberikan');

        return redirect()->back();
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
    }
}
