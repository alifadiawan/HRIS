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
        $kpis = KPI::with('mapping')->orderBy('sort_no', 'asc')->get();
        // return $kpis;
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
        //validasi
        $data = $request->validate([
            'group_name' => 'required',
            'sort_no' => 'required|numeric|min:1',
            'deskripsi' => 'required',
            'parameter' => 'required',
            'divisi_id' => 'nullable',
            'jabatan' => 'nullable',
            'weight' => 'required|numeric|min:1',
            'min_treshold' => 'required|numeric|min:1',
            'max_treshold' => 'required|numeric|min:1',
            'isActive' => 'required|boolean',
        ]);

        //update sort number
        $sort = KPI::where('sort_no' , '>=', $data['sort_no'])->get();
        // return $sort;
        foreach($sort as $s){
            $s->sort_no = $s->sort_no + 1;
            $s->save();
        }

        //create new kpi
        $kpi = new KPI();
        $kpi->group_name = $data['group_name'];
        $kpi->deskripsi = $data['deskripsi'];
        $kpi->parameter = $data['parameter'];
        $kpi->sort_no = $data['sort_no'];
        $kpi->weight = $data['weight'];
        $kpi->min_treshold = $data['min_treshold'];
        $kpi->max_treshold = $data['max_treshold'];
        $kpi->isActive = $data['isActive'];
        $kpi->save();

        if ($data['jabatan'] == null) {
            $employee = Member::whereHas('user', function ($q) {
                $q->whereHas('role', function ($u) {
                    $u->where('role', '!=', 'admin');
                });
            })->where('divisi_id', $data['divisi_id'])->get();
        }
        elseif ($data['divisi_id'] == null) {
            $employee = Member::whereHas('user', function ($q) {
                $q->whereHas('role', function ($u) {
                    $u->where('role', '!=', 'admin');
                });
            })->where('jabatan', $data['jabatan'])->get();
        }
        else {
            $employee = Member::whereHas('user', function ($q) {
                $q->whereHas('role', function ($u) {
                    $u->where('role', '!=', 'admin');
                });
            })->get();
        }

        $kpi->mapping()->attach($employee);

        //notif
        notify()->success('KPI Berhasil Ditambahkan !!', 'KPI');
        return redirect('/group-data');
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
