@extends('layout.body')
@section('title', 'KPI Edit Profile')
@section('page-title', 'Edit Profile')
@section('content')

    <section id="profile" class="container">
        <form action="" method="POST">
            @csrf
            @method('put')
            <div class="card mb-4">
                <div class="card-body">
                        <div class="row mt-3">
                            <div class="col-sm-3">
                                <p class="mb-0">username</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="akwokwo"
                                    placeholder="username" name="username" id="">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Email</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" value="email" name="email"
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
                    {{-- @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
{{-- 
                    <input type="hidden" name="id_member" value="{{ $nextNumber }}">
                    <input type="hidden" name="user_id" value="{{ $uid }}"> --}}
                    <hr>
                    {{-- @if ($member->isEmpty()) --}}
                        {{-- <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" placeholder="nama lengkap" name="name">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nomor Telp</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="no_hp" placeholder="087654">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIK</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="nik" placeholder="3578231">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="alamat" placeholder="Indonesia">
                            </div>
                        </div> --}}
                        {{-- @else --}}
                    {{-- @endif
                    @foreach ($member as $m) --}}
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nama Lengkap</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="nama-lengkap" name="name">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Nomor Telp</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="tlp" name="no_hp"
                                    placeholder="087654">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">NIK</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" value="nik" name="nik"
                                    placeholder="3578231">
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-sm-3">
                                <p class="mb-0">Alamat</p>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" value="alamat" name="alamat"
                                    placeholder="Indonesia">
                            </div>
                        </div>
                    {{-- @endforeach --}}
                    {{-- @endif --}}

                </div>
            </div>
            <button class="btn btn-primary" type="submit">Save</button>
            <a href="#" class="btn btn-outline-secondary">Cancel</a>
        </form>
    </section>

@endsection
