<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\Member;
use App\Models\Divisi;
use Illuminate\Http\Request;

class KPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kpis = KPI::with('mapping')->get();
        $member = Member::whereHas('user', function ($query) {
            $query->whereHas('role', function ($user) {
                $user->where('role', '!=', 'admin');
            });
        })->get();
        return view('kpi.groupdata', compact('kpis', 'member'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::all();
        $jabatan = Member::where('jabatan', '!=', 'null')->pluck('jabatan')->unique();
        // return $jabatan;
        return view('kpi.input', compact('divisi', 'jabatan'));
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
    public function show(KPI $kPI)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KPI $kPI)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KPI $kPI)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KPI $kPI)
    {
        //
    }
}
