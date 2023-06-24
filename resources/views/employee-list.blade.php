@extends('layout.body')
@section('title', 'Goals Team')
@section('page-title', 'Employee list')
@section('content')


    <section class="employee-list">
        <div class="content">
            <div class="card">
                <div class="card-body">
                    <table class="table my-3">
                        <thead>
                            <tr>
                                <th class="bg-light">No</th>
                                <th class="bg-light">Nama</th>
                                <th class="bg-light">NIK</th>
                                <th class="bg-light">Jabatan</th>
                                <th class="bg-light"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Steven</td>
                                <td>3571820719</td>
                                <td>
                                    Backend Developer, IT support
                                </td>
                                <td>
                                    <a href="" class="btn btn-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Alif</td>
                                <td>3571820719</td>
                                <td>Frontend Developer</td>
                                <td>
                                    <a href="" class="btn btn-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Rafli</td>
                                <td>3571820719</td>
                                <td>Frontend Developer</td>
                                <td>
                                    <a href="" class="btn btn-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Ilham</td>
                                <td>3571820719</td>
                                <td>Backend Developer</td>
                                <td>
                                    <a href="" class="btn btn-warning text-white" data-bs-toggle="modal"
                                        data-bs-target="#edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" data-bs-backdrop="static" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="d-flex flex-row mt-3 justify-content-center">
                    <h5 class="text-center">Steven Alden</h5>
                </div>
                <hr class="mb-1">
                <div class="modal-body">
                    <form action="">
                        <div class="form-group">
                            <label for="">Nama</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">NIK</label>
                            <input type="number" class="form-control">
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Divisi</label>
                            <select name="" class="form-select" id="">
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="">Jabatan</label>
                            <input type="text" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="d-flex flex-row my-3 justify-content-center gap-2">
                    <button type="button" class="btn btn-success">Save changes</button>
                    <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>


@endsection
