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
                <div style="padding: 0px 40px 0px 30px; color:#012970">
                    <h4 class="fw-bold mt-3">Data Diri</h4>
                </div>
                <div class="row" style="padding: 0px 30px 0px 30px; margin-top:20px">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label for="formlabel" class="form-label fw-bold">Nama Lengkap</label>
                            <input type="text" id="name" class="form-control" disabled
                                placeholder="{{ $member->nama }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label fw-bold" for="lastName">NIK</label>
                            <input type="number" id="lastName" class="form-control" disabled
                                placeholder="{{ $member->nik }}">
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 0px 30px 0px 30px">
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label for="formlabel" class="form-label fw-bold">Alamat</label>
                            <input type="text" id="alamat" class="form-control" disabled
                                placeholder="{{ $member->alamat }}">
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="form-outline">
                            <label class="form-label fw-bold" for="lastName">Jenis Kelamin</label>
                            <input type="text" name="jk" class="form-control" disabled
                                placeholder="{{ $member->jk }}">
                        </div>
                    </div>
                </div>
                <div class="row" style="padding: 0px 30px 0px 30px">
                    <div class="col-md-4 mb-4">
                        <div class="form-outline">
                            <label for="formlabel" class="form-label fw-bold">Tanggal Lahir</label>
                            <input type="text" id="alamat" class="form-control" disabled
                                placeholder="{{ $member->tgl_lahir }}">
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="form-outline">
                            <label class="form-label fw-bold" for="lastName">Jabatan</label>
                        </div>
                        @if ($member->jabatan != null)
                            <div>
                                <input disabled type="text" class="form-control text-capitalize"
                                    value="{{ $member->jabatan->nama_jabatan }}" name="alamat">
                            </div>
                        @else
                            <div>
                                <input disabled type="text" class="form-control text-capitalize"
                                    value="Tidak Punya Jabatan" name="alamat">
                            </div>
                        @endif
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="form-outline">
                            <label for="formlabel" class="form-label fw-bold">Divisi</label>
                            <input type="text" id="alamat" class="form-control" disabled
                                placeholder="{{ $member->divisi->nama_divisi }}">
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center" style="padding: 0px 30px 0px 30px">
                    <div class="col-lg-12">
                        <a href="{{ route('employee.hapus', $member->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                        <a href="{{ route('employee.edit', $member->id) }}" class="btn btn-warning"><i class="fa-solid fa-pen-to-square" style="color: #f9fafb;"></i></a>
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
