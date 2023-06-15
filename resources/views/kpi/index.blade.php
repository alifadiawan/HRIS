@extends('layout.body')
@section('title', 'KPI Data Employe')
{{-- @section('page-title', 'KPI Data Employe') --}}
@section('content')
    <div class="container">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-3">Data Employe</h4>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-info mb-2 text-white" data-bs-toggle="modal" data-bs-target="#addTask">Add
                    New Employee</button>
            </div>
        </div>
        <div class="card">
                <div class="card-body">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="card-body">
                            <table class="table mt-4 " style="outline: 2px">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>ID</th>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Divisi</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td scope="row">#22929</td>
                                        <td>Moas</td>
                                        <td>352626262626226</td>
                                        <td>IT</td>
                                        <td>Programmer</td>
                                        <td>
                                            <a href="" class="btn" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fa-solid fa-clipboard-check fa-lg"></i>Edit Data</a>
                                                </li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#nilai"><i class="fa-solid fa-eye"></i>Show Data</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#hapustugas"><i
                                                            class="fa-solid fa-trash fa-lg"></i>Delete Data</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="row">#22929</td>
                                        <td>Moas</td>
                                        <td>352626262626226</td>
                                        <td>IT</td>
                                        <td>Programmer</td>
                                        <td>
                                            <a href="" class="btn" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </a>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="#"><i
                                                            class="fa-solid fa-clipboard-check fa-lg"></i>Edit Data</a>
                                                </li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#nilai"><i class="fa-solid fa-eye"></i></i>Show Data</a></li>
                                                <li><a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#hapustugas"><i
                                                            class="fa-solid fa-trash fa-lg"></i>Delete Data</a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
