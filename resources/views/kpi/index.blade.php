@extends('layout.body')
@section('title', 'Data Employee')
@section('content')


    <div class="container">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-3">Data Employee</h4>
        </div>
        @if ($new->isNotEmpty())
            <div class="alert alert-warning">
                Ada Employee Baru ! <br>Silahkan isi Jabatannya Untuk Memberinya Tugas !
            </div>
        @endif
        <!-- <div class="row">
                                            <div class="col">
                                                <button class="btn btn-info mb-2 text-white" data-bs-toggle="modal" data-bs-target="#addTask">Add
                                                    New Employee</button>
                                            </div>
                                        </div> -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">

                                <table class="table mt-4 " style="outline: 2px">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>NO.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($member->isEmpty())
                                            <tr>
                                                <td colspan="6">
                                                    <p class="text-center h1">Belum Ada Employee</p>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($member as $m)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td>{{ $m->nama }}</td>
                                                    <td>{{ $m->nik }}</td>
                                                    <td class="text-capitalize">{{ $m->divisi->nama_divisi }}</td>
                                                    <td class="text-capitalize">{{ $m->jabatan }}</td>
                                                    <td>
                                                        <a href="" class="btn" data-bs-toggle="dropdown">
                                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.edit', $m->id) }}"><i
                                                                        class="fa-solid fa-clipboard-check fa-lg"></i>Edit
                                                                    Data</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.show', $m->id) }}"><i
                                                                        class="fa-solid fa-eye"></i>Show Data</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.hapus', $m->id) }}"><i
                                                                        class="fa-solid fa-trash fa-lg"></i>Delete Data</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.show', $m->id) }}"><i
                                                                        class="fa-solid fa-star fa-lg"></i>Lihat Nilai</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Divisi -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addDivisi">Tambah
                            Divisi</button>
                        <table class="table mt-4" style="outline: 2px;">
                            <thead class="table-secondary">
                                <th>NO.</th>
                                <th>Nama Divisi</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_divisi }}</td>
                                        <td>
                                            <a href="{{ route('divisi.hapus', $d->id) }}" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

    @endsection
