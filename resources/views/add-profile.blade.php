@extends('layout.body')
@section('title', 'Add Profile')
@section('page-title', 'Add Profile')
@section('content')

    <section id="profile" class="container">
        <form action="{{route('employee.store')}}" method="POST">
            @csrf
            <div class="card mb-4">
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <hr>
                        <input required type="hidden" name="user_id" value="{{auth()->user()->id}}">
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="nama">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nomor Telp</p>
                            </div>
                            <div class="col-sm-9">
                                <input required type="number" class="form-control" name="no_hp">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIK</p>
                            </div>
                            <div class="col-sm-9">
                                <input required type="number" class="form-control" name="nik">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="alamat">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jenis Kelamin</p>
                            </div>
                            <div class="col-sm-9">
                                <input required type="text" class="form-control" name="jk">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Tanggal Lahir</p>
                            </div>
                            <div class="col-sm-9">
                                <input required type="date" class="form-control" name="tgl_lahir">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Divisi</p>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control form-select" name="divisi_id" required>
                                    <option>Pilih Divisi</option>
                                    @foreach($divisi as $d)
                                    <option value="{{$d->id}}">{{$d->nama_divisi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{route('employee.profile')}}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </section>

@endsection