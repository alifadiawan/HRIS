<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\User;
use App\Notifications\NewNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $jabatan = new Jabatan();
        $jabatan->nama_jabatan = $request->nama_jabatan;
        $jabatan->save();

        // mengirim notifikasi ke admin
        $user = User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->get();
        $judul = "Jabatan";
        $message = $judul." Baru Berhasil Ditambahkan !!";
        $notification = new NewNotification($judul, $message);
        $notification->setUrl(route('employee.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('Jabatan Berhasil Ditambah');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->nama_jabatan = $request->edit_jabatan;
        $jabatan->save();

        // mengirim notifikasi ke admin
        $user = User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->get();
        $judul = "Jabatan";
        $message = $judul." Berhasil Diupdate !!";
        $notification = new NewNotification($judul, $message);
        $notification->setUrl(route('employee.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('Jabatan Berhasil Diupdate');

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        //
    }

    public function hapus($id)
    {
        $jabatan = Jabatan::find($id);
        $jabatan->delete();

        // mengirim notifikasi ke admin
        $user = User::whereHas('role', function ($query) {
            $query->where('role', 'admin');
        })->get();
        $judul = "Jabatan";
        $message = $judul." Berhasil Dihapus !!";
        $notification = new NewNotification($judul, $message);
        $notification->setUrl(route('employee.index')); // Ganti dengan rute yang sesuai
        Notification::send($user, $notification);

        sweetalert()
            ->icon('success')
            ->confirmButtonColor('#0d6efd')
            ->addSuccess('Jabatan Berhasil Dihapus');

        return redirect()->back();
    }
}
