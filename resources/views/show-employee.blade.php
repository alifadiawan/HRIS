@extends('layout.body')
@section('title', 'Show Employee')
@section('page-title', 'Show Employee')
@section('content')

    <section id="profile" class="container">
        <div class="card mb-4">
            <div class="card-body">
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nama Lengkap</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control" value="{{ $member->nama }}" name="name">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Nomor Telp</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="number" class="form-control" value="{{ $member->no_hp }}" name="no_hp"
                            placeholder="087654">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">NIK</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="number" class="form-control" value="{{ $member->nik }}" name="nik"
                            placeholder="3578231">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Alamat</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control" value="{{ $member->alamat }}" name="alamat"
                            placeholder="Indonesia">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jenis Kelamin</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control" value="{{ $member->jk }}" name="jk"
                            placeholder="Indonesia">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Tanggal Lahir</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control" value="{{ $member->tgl_lahir }}"
                            name="tgl_lahir">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Jabatan</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control text-capitalize" value="{{ $member->jabatan }}"
                            name="alamat">
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-sm-3">
                        <p class="mb-0">Divisi</p>
                    </div>
                    <div class="col-sm-9">
                        <input disabled type="text" class="form-control text-capitalize"
                            value="{{ $member->divisi->nama_divisi }}" name="alamat" placeholder="Indonesia">
                    </div>
                </div>
            </div>
        </div>
        <a class="btn btn-primary" href="/employee">Back</a>
    </section>

@endsection