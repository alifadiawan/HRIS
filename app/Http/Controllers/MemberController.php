<?php

namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\User;
use App\Models\Divisi;
use App\Models\KPI;
use App\Models\Progress;
use App\Models\Task;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $member = Member::all();
        $new = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->where('jabatan', null)->get();
        $divisi = Divisi::all();
        return view('kpi.index', compact('member', 'divisi', 'new'));
    }

    public function profile()
    {
        $kpi = KPI::all();
        $prog = Progress::all();
        return view('profile',compact('prog','kpi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::all();
        return view('add-profile', compact('divisi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $member = new Member();
        $member->nama = $request->nama;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->nik = $request->nik;
        $member->jk = $request->jk;
        $member->tgl_lahir = $request->tgl_lahir;
        $member->divisi_id = $request->divisi_id;
        $member->user_id = $request->user_id;
        $member->save();

        notify()->success('Profile Berhasil Ditambahkan', 'Data Profile');
        return redirect('/profile');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // $member = Member::find($id)->with('owner_task')->get();
        // return $member;
        $member = Member::find($id);
        $task = Task::where('member_id',$member->id)->get();
        $progress = Progress::all();    
        $kpi = KPI::all();    
        return view('show-employee', compact('member','progress','task','kpi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $divisi = Divisi::all();
        $member = Member::find($id);
        return view('edit-profile', compact('member', 'divisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $member = Member::find($id);
        $user = User::find($member->user->id);
        $member->nama = $request->nama;
        $member->no_hp = $request->no_hp;
        $member->alamat = $request->alamat;
        $member->nik = $request->nik;
        $member->jk = $request->jk;
        $member->tgl_lahir = $request->tgl_lahir;
        $member->jabatan = $request->jabatan;
        $member->divisi_id = $request->divisi_id;
        $member->save();

        if (auth()->user()->member->id === $member->id) {
            $user->username = $request->username;
            $user->email = $request->email;
            if ($request->password != null) {
                $user->password = bcrypt($request->password);
            }
            $user->save();
        }

        notify()->success('Data Berhasil Diupdate !!', 'Data Profile');
        if(auth()->user()->role->role == 'admin'){
            return redirect('/employee');
        } else {
            return redirect('/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Member $member)
    {
        //
    }

    public function hapus($id)
    {
        $member = Member::find($id);
        $user = User::find($member->user->id);
        $user->delete();

        notify()->success('Berhasil Hapus Data !!', 'Data Profile');
        return redirect('/employee');
    }
}
