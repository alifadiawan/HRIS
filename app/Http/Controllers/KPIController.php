<?php

namespace App\Http\Controllers;

use App\Models\KPI;
use App\Models\Member;
use App\Models\Divisi;
use App\Models\Jabatan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class KPIController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kpis = KPI::orderBy('sort_no', 'asc')->get();
        // return $kpis;
        return view('kpi.groupdata', compact('kpis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();
        // return $jabatan;
        return view('kpi.input', compact('divisi', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function toggleIsActive(Request $request)
    {
        $kpiId = $request->input('kpiId');
        $kpi = KPI::findOrFail($kpiId);
        $kpi->isActive = !$kpi->isActive;
        $kpi->save();
        if ($kpi->isActive == false) {
            $status = 'non-aktif';
        } else {
            $status = 'aktifkan';
        }
        // Respon berhasil
        return response()->json(['success' => true, 'message' => 'KPI berhasil di' . $status]);
    }

    public function store(Request $request)
    {
        //validasi
        $data = $request->validate([
            'group_name' => 'required',
            'sort_no' => 'required|numeric|min:1',
            'deskripsi' => 'required',
            'parameter' => 'required',
            'divisi_id' => 'nullable',
            'jabatan_id' => 'nullable',
            'weight' => 'required|numeric|min:1',
            'min_treshold' => 'required|numeric|min:1',
            'max_treshold' => 'required|numeric|min:1',
            'isActive' => 'required|boolean',
        ]);

        //update sort number
        $sort = KPI::where('sort_no', '>=', $data['sort_no'])->get();
        // return $sort;
        foreach ($sort as $s) {
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
        if ($data['divisi_id'] != null) {
            $kpi->divisi_id = $data['divisi_id'];
        }
        if ($data['jabatan_id'] != null) {
            $kpi->jabatan_id = $data['jabatan_id'];
        }
        $kpi->save();

        //notif
        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('KPI Berhasil Ditambahkan !!');
            
        return redirect('/kpi');
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
    public function edit(KPI $kpi)
    {
        $divisi = Divisi::all();
        $jabatan = Jabatan::all();

        return view('kpi.edit', compact('divisi', 'jabatan', 'kpi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KPI $kpi)
    {
        //validasi
        $data = $request->validate([
            'group_name' => 'required',
            'sort_no' => 'required|numeric|min:1',
            'deskripsi' => 'required',
            'parameter' => 'required',
            'divisi_id' => 'nullable',
            'jabatan_id' => 'nullable',
            'weight' => 'required|numeric|min:1',
            'min_treshold' => 'required|numeric|min:1',
            'max_treshold' => 'required|numeric|min:1',
            'isActive' => 'required|boolean',
        ]);

        if ($kpi->sort_no != $data['sort_no']) {
            //update sort number
            $sort = KPI::where('sort_no', '>=', $data['sort_no'])->where('id', '!=', $kpi->id)->get();
            // return $sort;
            foreach ($sort as $s) {
                $s->sort_no = $s->sort_no + 1;
                $s->save();
            }
        }

        //update kpi
        $kpi->group_name = $data['group_name'];
        $kpi->deskripsi = $data['deskripsi'];
        $kpi->parameter = $data['parameter'];
        $kpi->sort_no = $data['sort_no'];
        $kpi->weight = $data['weight'];
        $kpi->min_treshold = $data['min_treshold'];
        $kpi->max_treshold = $data['max_treshold'];
        $kpi->isActive = $data['isActive'];
        if ($data['divisi_id'] == null) {
            $kpi->divisi_id = null;
        } else {
            $kpi->divisi_id = $data['divisi_id'];
        }
        if ($data['jabatan_id'] == null) {
            $kpi->jabatan_id = null;
        } else {
            $kpi->jabatan_id = $data['jabatan_id'];
        }
        $kpi->save();

        //notif
        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('KPI Berhasil Diupdate !!');

        return redirect('/kpi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KPI $kPI)
    {
        //
    }

    public function hapus($id)
    {
        $kpi = KPI::find($id);

        $sort = KPI::where('id', '!=', $kpi->id)->where('sort_no', '>=', $kpi->sort_no)->get();
        foreach ($sort as $s) {
            $s->sort_no = $s->sort_no - 1;
            $s->save();
        }

        $kpi->delete();

        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('KPI Berhasil dihapus !!');

        return redirect('/kpi');
    }
}
