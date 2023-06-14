@extends('layout.body')
@section('title', 'Goals Team')
@section('content')

    <section class="goals">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-4">Goals Team</h4>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-info mb-2 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah
                    Tugas</button>
            </div>
        </div>

        <!-- table -->
        <div class="content ">
            <div class="card">
                <div class="row ">
                    <div class="col-lg-4">
                        <div class="input-group ms-4 mt-3">
                            <select class="form-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <option value="1"><span><img
                                            src="https://assets.entrepreneur.com/content/3x2/2000/20200429211042-GettyImages-1164615296.jpeg"
                                            alt="Profile" class="rounded-circle"></span>Haffiyyan</option>
                                <option data-thumbnail="images/icon-chrome.png">Chrome</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group ms-4 mt-3">
                            <select class="form-select" id="inputGroupSelect02">
                                <option selected>Ongoing Goals</option>
                                <option value="1"><img src="assets/img/profile-img.jpg" alt="Profile"
                                        class="rounded-circle">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Steven -->
                <div class="card-body">
                    <table class="table mt-3 " style="outline: 2px">
                        <thead class="table-secondary">
                            <tr style="text-align: start">
                                <th>Goal ID</th>
                                <th>Goal Name</th>
                                <th>Goal Owner</th>
                                <th>Goal Progress</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($task as $t)
                                <tr>
                                    <td scope="row"><a href="" class="href"><i
                                                class="fa-solid fa-chevron-right me-3"></i></a> {{ $t->goal_id }}</td>
                                    <td class="fw-bold">{{ $t->goal_name }} <span style="font-weight: normal">
                                            <p>{{ date('d F Y', strtotime($t->created_at)) }} -
                                                {{ date('d F Y', strtotime($t->tanggal_target)) }}</p>
                                        </span></td>
                                    <td>{{ $t->owner->username }}</td>
                                    @if ($t->tipe_progress->nama_tipe == 'idr')
                                        <td>{{ $t->goal_progress }} / Rp. {{ number_format($t->goal_target) }} <div
                                                class="progress">
                                                @if ($t->status == 'todo')
                                                    <div class="progress-bar bg-secondary"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                                @if ($t->status == 'doing')
                                                    <div class="progress-bar bg-primary"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                                @if ($t->status == 'checking')
                                                    <div class="progress-bar bg-warning"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif

                                                @if ($t->status == 'done')
                                                    <div class="progress-bar bg-success"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                    @if ($t->tipe_progress->nama_tipe == 'persentase')
                                        <td>{{ $t->goal_progress }}% / {{ $t->goal_target }}% <div class="progress">
                                                @if ($t->status == 'todo')
                                                    <div class="progress-bar bg-secondary"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                                @if ($t->status == 'doing')
                                                    <div class="progress-bar bg-primary"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                                @if ($t->status == 'checking')
                                                    <div class="progress-bar bg-warning"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif

                                                @if ($t->status == 'done')
                                                    <div class="progress-bar bg-success"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                    @if ($t->tipe_progress->nama_tipe == 'nominal')
                                        <td>{{ $t->goal_progress }} / {{ number_format($t->goal_target) }} <div
                                                class="progress">
                                                @if ($t->status == 'todo')
                                                    <div class="progress-bar bg-secondary"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                                @if ($t->status == 'doing')
                                                    <div class="progress-bar bg-primary"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                                @if ($t->status == 'checking')
                                                    <div class="progress-bar bg-warning"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif

                                                @if ($t->status == 'done')
                                                    <div class="progress-bar bg-success"
                                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    @endif
                                    @if ($t->status == 'todo')
                                        <td class="text-capitalize">{{ $t->status }}</td>
                                    @endif
                                    @if ($t->status == 'doing')
                                        <td class="text-capitalize text-primary">{{ $t->status }}</td>
                                    @endif
                                    @if ($t->status == 'checking')
                                        <td class="text-capitalize text-warning">{{ $t->status }}</td>
                                    @endif
                                    @if ($t->status == 'done')
                                        <td class="text-capitalize text-success">{{ $t->status }}</td>
                                    @endif
                                    <td>
                                        <a href="" class="btn" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="#"><i
                                                        class="fa-solid fa-clipboard-check fa-lg"></i>Mark as done</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#nilai"><i
                                                        class="fa-solid fa-star fa-lg"></i>Beri
                                                    Nilai</a></li>
                                            <li><a class="dropdown-item" data-bs-toggle="modal"
                                                    data-bs-target="#hapustugas"><i
                                                        class="fa-solid fa-trash fa-lg"></i>Hapus Tugas</a></li>
                                        </ul>
                                    </td>
                                    <div class="modal fade" id="nilai" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nilai 1 - 100</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="range" class="form-range" min="1"
                                                        max="100"
                                                        oninput="this.nextElementSibling.value = this.value">
                                                    <output class="fw-bold text-center">0</output>

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </tr>
                            @endforeach
                            <!-- <tr>
                                                    <td scope="row"><a href="" class="href"><i
                                                                class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                                                    <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                                            <p>1 Jul 2023 - 15 Agustus 2023</p>
                                                        </span></td>
                                                    <td>Self</td>
                                                    <td>0 / Rp 5.000.000.000 <div class="progress">
                                                            <div class="progress-bar bg-info" style="width:30%"></div>
                                                        </div>
                                                    </td>
                                                    <td class="text-success">Updated</td>
                                                    <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><a href="" class="href"><i
                                                                class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                                                    <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                                            <p>1 Jul 2023 - 15 Agustus 2023</p>
                                                        </span></td>
                                                    <td>Self</td>
                                                    <td>0 / Rp 5.000.000.000 <div class="progress">
                                                            <div class="progress-bar bg-success" style="width:10%"></div>
                                                        </div>
                                                    </td>
                                                    <td>Not Updated</td>
                                                    <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                                                </tr>
                                                <tr>
                                                    <td scope="row"><a href="" class="href"><i
                                                                class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                                                    <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                                            <p>1 Jul 2023 - 15 Agustus 2023</p>
                                                        </span></td>
                                                    <td>Self</td>
                                                    <td>0 / Rp 5.000.000.000 <div class="progress">
                                                            <div class="progress-bar bg-warning" style="width:47%"></div>
                                                        </div>
                                                    </td>
                                                    <td>Not Updated</td>
                                                    <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                                                </tr> -->
                        </tbody>
                    </table>
                </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="head px-3 pt-3">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="fw-bold">Tambah Tugas</h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="modal-body">
                    <form action="">
                        <div class="form-gorup">
                            <label for="" class="fw-bold">Nama Tugas</label>
                            <input type="text" class="form-control" placeholder="nama tugas" name=""
                                id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="fw-bold">Tipe Progress</label>
                            <select name="" id="" class="form-select">
                                <option value="">Pilih tipe progress</option>
                                <option value="">Persentasi</option>
                                <option value="">Rupiah</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="fw-bold">Tenggat</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="Employee" class="fw-bold">Employee</label>
                            <select name="" id="" class="form-select">
                                <option value="">seekfni</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                                <option value="">7</option>
                                <option value="">8</option>
                                <option value="">9</option>
                                <option value="">10</option>
                                <option value="">11</option>
                                <option value="">12</option>
                                <option value="">13</option>
                                <option value="">14</option>
                                <option value="">15</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <a href="" class="btn btn-primary">Submit</a>
                            <a href="" class="btn" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                </div>



                <style>
                    table {
                        border: 1px solid;
                    }
                </style>
            @endsection
