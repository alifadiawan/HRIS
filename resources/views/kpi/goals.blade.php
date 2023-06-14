@extends('layout.body')
@section('title', 'Goals Team')
@section('content')

    <section class="goals">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-4">Goals Team</h4>
        </div>
        <div class="row">
            <div class="col">

                <button class="btn btn-info mb-2 text-white" data-bs-toggle="modal" data-bs-target="#addTask">Tambah
                    Tugas</button>

            </div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
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
                            <th>To</th>
                            <th>Goal Progress</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($task as $t)
                        <tr>
                            <td scope="row"><a href="" class="href"><i
                                        class="fa-solid fa-chevron-right me-3"></i></a> {{$t->goal_id}}</td>
                            <td class="fw-bold">{{$t->goal_name}} <span style="font-weight: normal">
                                    <p>{{date('d F Y', strtotime($t->created_at))}} - {{date('d F Y', strtotime($t->tanggal_target))}}</p>
                                </span></td>
                            <td>{{$t->owner->nama}}</td>
                            <td>{{$t->member->nama}}</td>
                            @if($t->tipe_progress->nama_tipe == 'idr')
                            <td>{{$t->goal_progress}} / Rp. {{number_format($t->goal_target)}} <div class="progress">
                                    @if($t->status == 'todo')
                                    <div class="progress-bar bg-secondary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'doing')
                                    <div class="progress-bar bg-primary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'checking')
                                    <div class="progress-bar bg-warning" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
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
    <div class="modal fade" id="addTask" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

                    <form action="{{ route('goals.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="goal_id">Goal ID</label>
                            <div class="input-group">
                                <span class="input-group-text" id="inputGroupPrepend">#</span>
                                <input type="number" name="goal_id" id="goal_id" class="form-control"
                                    placeholder="7777" min="1000" required>
                            </div>
                        </div>
                        <div class="form-gorup mt-2">
                            <label for="goal_name" class="fw-bold">Goal Name</label>
                            <input type="text" class="form-control" placeholder="nama tugas" name="goal_name"
                                id="goal_name" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="goal_target">Goal Target</label>
                            <input type="number" name="goal_target" id="goal_target" class="form-control"
                                placeholder="0" min="1" required>

                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="fw-bold">Tipe Progress</label>
                            <select name="tipe_id" id="tipe_id" class="form-select text-uppercase" required>
                                <option value="">Pilih tipe progress</option>
                                @foreach ($tipe as $t)
                                    <option value="{{ $t->id }}">{{ $t->nama_tipe }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal_target" class="fw-bold">Tenggat</label>
                            <input type="date" class="form-control" name="tanggal_target" id="tanggal_target"
                                min="{{ date('Y-m-d') }}" required>
                        </div>
                        <div class="form-group mt-2">
                            <label for="member_id" class="fw-bold">Employee</label>
                            <select name="member_id" id="member_id" class="form-select text-capitalize" required>
                                <option value="">Choose..</option>
                                @foreach ($member as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <input type="hidden" class="form-control" name="status" value="todo">
                            <button type="submit" class="btn btn-primary">Submit</button>
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
