@extends('layout.body')
@section('title', 'Show Employee')
@section('page-title',
    Str::html(
    __('<a class="btn btn-lg text-secondary" href="/employee"><i class="fa-solid fa-arrow-left"></i></a> Show Employee'),
    ))
@section('content')

    <section id="profile" class="container">
        <div class="card my-3">
            <div class="card-body">
                <div class="row mt-3">
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
    </section>


    <!-- nilai employee -->
    <section id="nilai-employee" class="container">
        <div class="card" style="border-radius: 10px">
            <div class="card-body">
                <h4 class="card-title">Nilai dari {{ $member->nama }}</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Tanggal Dibuat</th>
                                <th>Tanggal Deadline</th>
                                <th>Tanggal Dinilai</th>
                                <th>Goals Name</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $t)
                                @if ($t->status == 'done')
                                    <tr>
                                        <td>
                                            <div class="accordion" id="accordionExample">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                                            aria-expanded="true" aria-controls="collapseOne">
                                                            v
                                                        </button>
                                                    </h2>
                                                    <div id="collapseOne" class="accordion-collapse collapse"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                        <div class="accordion-body">
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <th>progress</th>
                                                                    <th>keterangan</th>
                                                                    <th>tanggal</th>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($progress as $p)
                                                                        @if ($p->tasks_id == $t->id)
                                                                            <tr>
                                                                                <td>
                                                                                    {{ $p->progress }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $p->keterangan }}
                                                                                </td>
                                                                                <td>
                                                                                    {{ $p->created_at }}
                                                                                </td>
                                                                            </tr>
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $t->created_at }}</td>
                                        <td>{{ $t->tanggal_target }}</td>
                                        <td>{{ $t->updated_at }}</td>
                                        @foreach ($kpi as $k)
                                            @if ($t->kpi_id == $k->id)
                                                <td>{{ $k->group_name }}</td>
                                            @endif
                                        @endforeach
                                        <td>{{ $t->grade }}</td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
