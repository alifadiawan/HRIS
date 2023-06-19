@extends('layout.body')
@section('title', 'Edit Profile')
@section('page-title', 'Edit Profile')
@section('content')

    <section id="profile" class="container">
        <form action="{{route('employee.update', $member->id)}}" method="POST">
            @csrf
            @method('put')
            <div class="card mb-4">
                <div class="card-body">
                        @if(auth()->user()->member->id === $member->id)
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0">Username</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{auth()->user()->username}}"
                                    placeholder="username" name="username" id="">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" value="{{auth()->user()->email}}" name="email"
                                    placeholder="example@gmail.com">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">password</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password"
                                    placeholder="diisi jika ingin mengganti password !!!">
                            </div>
                        </div>
                        @endif
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
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$member->nama}}" name="nama">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nomor Telp</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{$member->no_hp}}" name="no_hp">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIK</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="{{$member->nik}}" name="nik">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$member->alamat}}" name="alamat">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jenis Kelamin</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$member->jk}}" name="jk">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Tanggal Lahir</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="date" class="form-control" value="{{$member->tgl_lahir}}" name="tgl_lahir">
                            </div>
                        </div>
                        @if(auth()->user()->role->role == 'admin')
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Jabatan</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="{{$member->jabatan}}" name="jabatan">
                            </div>
                        </div>
                        @endif
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Divisi</p>
                            </div>
                            <div class="col-sm-9">
                                <select class="form-control form-select" name="divisi_id">
                                    <option>Pilih Divisi</option>
                                    @foreach($divisi as $d)
                                    <option value="{{$d->id}}" @if($member->divisi_id == $d->id) selected @endif>{{$d->nama_divisi}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="{{route('employee.index')}}" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </section>

@endsection
