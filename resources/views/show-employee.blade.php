@extends('layout.body')
@section('title', 'Show Employee')
@section('page-title', Str::html(__('<a class="btn btn-lg text-secondary" href="/employee"><i
            class="fa-solid fa-arrow-left"></i></a> Show Employee')))
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
                            <tr class="text-center">
                                <th>Goals Name</th>
                                <th colspan="2">Tanggal Deadline - Jam</th>
                                <th>Tanggal Dinilai</th>
                                <th>Goals Name</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>


                            @foreach ($task as $t)
                                @if ($t->grade != null)
                                    <tr class="text-center">
                                        @foreach ($kpi as $k)
                                            @if ($t->kpi_id == $k->id)
                                                <td class="text-start">
                                                    <button class="btn text-primary" data-bs-toggle="collapse"
                                                        data-bs-target="#r1{{ $t->id }}"
                                                        id="accordion{{ $t->id }}"><i
                                                            class="fa-solid fa-chevron-down"></i></button>{{ $k->group_name }}
                                                </td>
                                            @endif
                                        @endforeach
                                        <td>{{ $t->created_at->format('d-m-Y') }} </td>
                                        <td>{{ $t->created_at->format('H:i') }}</td>
                                        <td>{{ \Carbon\Carbon::parse($t->tanggal_target)->format('d-m-Y') }}</td>
                                        <td>{{ $t->updated_at->format('d-m-Y') }}</td>
                                        <td>{{ $t->grade }}</td>
                                    </tr>
                        <tbody class="collapse accordion-collapse" id="r1{{ $t->id }}"
                            data-bs-parent="#accordion{{ $t->id }}">

                            <td colspan="6" class="text-center">
                                <div class="table-resonsive">
                                    <table class="table table-borderless table-hover">
                                        <thead>
                                            <th>Tanggal Progress</th>
                                            <th>Progress</th>
                                            <th>Keterangan</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($progress as $p)
                                                @if ($p->tasks_id == $t->id)
                                                    <tr>
                                                        <td>
                                                            {{ $p->created_at->format('d M Y') }}
                                                        </td>
                                                        <td>
                                                            {{ $p->progress }}
                                                        </td>
                                                        <td>
                                                            {{ $p->keterangan }}
                                                        </td>
                                                    </tr>
                                                @elseif($p == null)
                                                    <tr>
                                                        <td colspan="3">
                                                            <h4 class="fw-bold">Belum ada progress</h4>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tbody>
                        @endif
                        @endforeach
                        {{-- @foreach ($task as $t)
                                @if ($t->grade != null)
                                    <tr>
                                        <td>
                                            <div class="accordion" id="accordion{{$t->id}}">
                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="headingOne">
                                                        <button class="accordion-button" type="button"
                                                            data-bs-toggle="collapse" data-bs-target="#collapse{{$t->id}}"
                                                            aria-expanded="true" aria-controls="collapse{{$t->id}}">
                                                            
                                                        </button>
                                                    </h2>
                                                    <div id="collapse{{$t->id}}" class="accordion-collapse collapse"
                                                        aria-labelledby="headingOne" data-bs-parent="#accordion{{$t->id}}">
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
                            @endforeach --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

@endsection
