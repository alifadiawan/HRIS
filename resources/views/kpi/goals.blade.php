@extends('layout.body')
@section('title', 'Goals Team')
@section('content')

    <section class="goals">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-4">Goals Team</h4>
        </div>
        <div class="row">
            <div class="col">
                @if (auth()->user()->role->role == 'admin')
                    <button class="btn btn-info mb-2 text-white" data-bs-toggle="modal" data-bs-target="#addTask">Tambah
                        Tugas</button>
                @endif
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
                            <select class="form-select" id="inputGroupSelect02" onchange="searchData()">
                                <option selected>Choose...</option>
                                @foreach ($member as $m)
                                    <option value="{{ $m->id }}">{{ $m->nama }} - {{ $m->divisi->nama_divisi }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group ms-4 mt-3">
                            <select class="form-select" id="inputGroupSelect02">
                                <option selected>Ongoing Goals</option>
                                <option value="">Todo</option>
                                <option value="">Doing</option>
                                <option value="">Checking</option>
                                <option value="">Done</option>
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
                                {{-- <th>Goal Owner</th> --}}
                                <th>To</th>
                                <th>Goal Progress</th>
                                <th>Status</th>
                                {{-- <th>Grade</th> --}}
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach (auth()->user()->role->role == 'admin' ? $task_adm : $task as $t)
                                <tr>
                                    <td scope="row">
                                        <button data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{ $t->id }}"><i
                                                class="fa-solid fa-chevron-right me-3" aria-expanded="true"
                                                aria-controls="flush-collapseOne"></i>
                                        </button> {{ $t->goal_id }}
                                    </td>
                                    <td class="fw-bold">{{ $t->kpi->group_name }} <span style="font-weight: normal">
                                            <p>{{ date('d F Y', strtotime($t->created_at)) }} -
                                                {{ date('d F Y', strtotime($t->tanggal_target)) }}</p>
                                        </span></td>
                                    {{-- <td>{{ $t->owner->nama }}</td> --}}
                                    <td>{{ $t->member->nama }}</td>
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
                                    {{-- @if ($t->grade == null)
                                        <td>-</td>
                                    @else
                                        <td>{{ $t->grade }}</td>
                                    @endif --}}
                                    <td>
                                        <a href="" class="btn" data-bs-toggle="dropdown">
                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                        </a>
                                        <ul class="dropdown-menu">
                                            @if (auth()->user()->role->role == 'admin')
                                                @if ($t->status != 'done')
                                                    <form action="{{ route('goals.update_adm') }}" method="POST">
                                                        @csrf
                                                        <li><button class="dropdown-item" name="mark" value="done"><i
                                                                    class="fa-solid fa-clipboard-check fa-lg"></i>Mark
                                                                as
                                                                done</button>
                                                            <input type="hidden" value="{{ $t->id }}"
                                                                name="task_id">
                                                        </li>
                                                    </form>
                                                @endif
                                                @if ($t->status == 'done')
                                                    <form action="{{ route('goals.view_prog') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="task_id" value="{{ $t->id }}">
                                                        <li><button class="dropdown-item" type="submit"><i
                                                                    class="fa-solid fa-star fa-lg"></i>Beri
                                                                Nilai</button></li>
                                                    </form>
                                                @endif
                                                <li><button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#hapustugas_{{ $t->id }}"><i
                                                            class="fa-solid fa-trash fa-lg"></i>Hapus Tugas</button>
                                                </li>
                                            @elseif(auth()->user()->role->role == 'employee')
                                                @if ($t->status == 'doing' || $t->status == 'todo')
                                                    <form action="{{ route('goals.view_prog') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="task_id" value="{{ $t->id }}">
                                                        <li><button type="submit" class="dropdown-item"><i
                                                                    class="fa-solid fa-edit fa-lg"></i>
                                                                Update Progress</button></li>
                                                    </form>
                                                @endif
                                            @endif
                                        </ul>
                                    </td>
                                <tr id="flush-collapseOne{{ $t->id }}" class="accordion-collapse collapse "
                                    data-bs-parent="#accordionFlushExample">
                                    <td colspan="6 bg-light">
                                        <div class="row">
                                            <!-- kiri -->
                                            <div class="col border-end">
                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        kpi yang dinilai
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->kpi->group_name }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        parameter
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->kpi->parameter }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        weight
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->kpi->weight }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        jabatan
                                                    </div>
                                                    <div class="col text-start text-capitaliz">
                                                        {{ $t->member->jabatan }}
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        divisi
                                                    </div>
                                                    <div class="col text-start text-capitalize">
                                                        {{ $t->member->divisi->nama_divisi }}
                                                    </div>
                                                </div>
                                                <hr>
                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        Goal Owner
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->owner->nama }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        Grade
                                                    </div>
                                                    <div class="col text-start text-uppercase text-danger">
                                                        @if ($t->grade == null)
                                                            belum dinilai
                                                        @else
                                                            {{ $t->grade }}
                                                        @endif
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        goal target
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->goal_target }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        tipe tugas
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->tipe_progress->nama_tipe }}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col text-capitalize fw-bold">
                                                        Tanggal dibuatnya target
                                                    </div>
                                                    <div class="col text-start">
                                                        {{ $t->created_at->format('d M Y') }}
                                                    </div>
                                                </div>
                                                
                                            </div>


                                            <!-- kanan -->
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-12 text-center text-capitalize fw-bold mb-3">
                                                        List Progress
                                                    </div>
                                                    @if ($progress->isEmpty())
                                                        <div class="col text-center text-capitalize">
                                                           - Belum ada progress -
                                                        </div>
                                                    @else
                                                        <div class="col text-start text-capitalize">
                                                            <div class="d-flex flex-column">
                                                                <div class="content time-off">
                                                                    @foreach ($progress->where('tasks_id', $t->id) as $p)
                                                                    <div class="row my-2 align-items-center">
                                                                        <div class="col">
                                                                            <div class="fw-bold">{{ $p->progress }}</div>
                                                                            <div class="status text-muted">
                                                                                {{ $p->keterangan }}</div>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class=" text-end">{{ $p->created_at->format('d M Y') }}</div>
                                                                        </div>
                                                                    </div>
                                                                    @endforeach
                                                                    <div class="row my-2 align-items-center">
                                                                        <div class="col">
                                                                            <div class="fw-bold">100</div>
                                                                            <div class="status text-muted">
                                                                                ajwoiajdjaoijsidjiaj jaoijwoai ijoaw iaijo ioj joijo i</div>
                                                                        </div>
                                                                        <div class="col-3">
                                                                            <div class=" text-end">14 Agustus 2023</div>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                </div>
                                                            </div>
                                                            {{-- <table class="table table-borderless">
                                                                <thead>
                                                                    <th>Tanggal Submit</th>
                                                                    <th>Progress</th>
                                                                    <th>Ket</th>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach ($progress->where('tasks_id', $t->id) as $p)
                                                                        <tr>
                                                                            <td>{{ $p->created_at->format('d M Y') }}</td>
                                                                            <td>{{ $p->progress }}</td>
                                                                            <td>{{ $p->keterangan }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table> --}}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>


                                    </td>
                                </tr>
                                {{-- <tr id="flush-collapseOne{{ $t->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <td class="bg-light">
                                        <div class="card">
                                            <div>
                                                <div class="text-center">
                                                    tabel tasks
                                                </div>
                                                <div>
                                                    goal owner : {{ $t->owner->nama }}
                                                </div>
                                                <div>
                                                    @if ($t->grade == null)
                                                        grade : belum dinilai
                                                    @else
                                                        grade : {{ $t->grade }}
                                                    @endif
                                                </div>
                                                <div>
                                                    goal target : {{ $t->goal_target }}
                                                </div>
                                                <div>
                                                    tipe tugas : {{ $t->tipe_progress->nama_tipe }}
                                                </div>
                                                <div>
                                                    tanggal target : {{ $t->tanggal_target }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center">
                                                    tabel kpi
                                                </div>

                                                <div>
                                                    kpi yang dinilai : {{ $t->kpi->group_name }}
                                                </div>
                                                <div>
                                                    parameter : {{ $t->kpi->parameter }}
                                                </div>
                                                <div>
                                                    weight : {{ $t->kpi->weight }}
                                                </div>

                                            </div>
                                            <div>

                                                <div class="text-center">
                                                    tabel member
                                                </div>
                                                <div>
                                                    jabatan : {{ $t->member->jabatan }}
                                                </div>
                                                <div>
                                                    divisi : {{ $t->member->divisi->nama_divisi }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center">
                                                    tabel progress
                                                </div>
                                                @foreach ($progress->where('tasks_id', $t->id) as $p)
                                                    <div>
                                                        {{ $p->progress }}
                                                    </div>
                                                    <div>
                                                        {{ $p->keterangan }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}

                                {{-- modal hapus --}}
                                <div class="modal fade" id="hapustugas_{{ $t->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="hapustugas">deleting this?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                r u sure ?
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('goals.update_adm') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="delete" value="delete">
                                                    <input type="hidden" name="task_id" value="{{ $t->id }}">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Yes i
                                                        do</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- end modal --}}
                                </tr>
                            @endforeach
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
                            <label for="kpi_id" class="fw-bold">Goal KPI</label>
                            <select type="text" class="form-control form-select" name="kpi_id" id="kpi_id"
                                required>
                                <option value="">Pilih KPI</option>
                                @foreach ($kpi as $k)
                                    <option value="{{ $k->id }}">{{ $k->group_name }}</option>
                                @endforeach
                            </select>
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
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <input type="hidden" class="form-control" name="status" value="todo">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="" class="btn" data-bs-dismiss="modal">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <style>
        table {
            border: 1px solid;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function searchData() {
            // Mengambil nilai yang dipilih
            var memberId = $("#inputGroupSelect02").value();

            // Mengirim request AJAX
            $.ajax({
                url: "{{ route('api.search.data') }}",
                type: "POST",
                data: {
                    member_id: memberId
                },
                dataType: "json",
                success: function(response) {
                    // Menghapus isi .card-body
                    $(".card-body table tbody").empty();

                    response.forEach(function(task) {
                        var row = '<tr>' +
                            '<td>' + task.goal_id + '</td>' +
                            '<td  class="fw-bold">' + task.kpi.group_name + '</td>' +
                            '<td>' + task.member.nama + '</td>';
                        // Tambahkan kolom-kolom tambahan
                        if (task.tipe_progress.nama_tipe == 'idr') {
                            row += '<td>' + task.goal_progress + ' / Rp. ' + task.goal_target +
                                '</td>' +
                                '<td>' +
                                '<div class="progress">';
                            if (task.status == 'todo') {
                                row += '<div class="progress-bar bg-secondary" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'doing') {
                                row += '<div class="progress-bar bg-primary" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'checking') {
                                row += '<div class="progress-bar bg-warning" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'done') {
                                row += '<div class="progress-bar bg-success" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            row += '</div></td>';
                        }

                        if (task.tipe_progress.nama_tipe == 'persentase') {
                            row += '<td>' + task.goal_progress + '% / ' + task.goal_target + '%</td>' +
                                '<td>' +
                                '<div class="progress">';
                            if (task.status == 'todo') {
                                row += '<div class="progress-bar bg-secondary" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'doing') {
                                row += '<div class="progress-bar bg-primary" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'checking') {
                                row += '<div class="progress-bar bg-warning" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'done') {
                                row += '<div class="progress-bar bg-success" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            row += '</div></td>';
                        }

                        if (task.tipe_progress.nama_tipe == 'nominal') {
                            row += '<td>' + task.goal_progress + ' / ' + task.goal_target + '</td>' +
                                '<td>' +
                                '<div class="progress">';
                            if (task.status == 'todo') {
                                row += '<div class="progress-bar bg-secondary" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'doing') {
                                row += '<div class="progress-bar bg-primary" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'checking') {
                                row += '<div class="progress-bar bg-warning" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            if (task.status == 'done') {
                                row += '<div class="progress-bar bg-success" style="width:' + (task
                                    .goal_progress / task.goal_target) * 100 + '%"></div>';
                            }
                            row += '</div></td>';
                        }

                        // Tambahkan kolom status
                        if (task.status == 'todo') {
                            row += '<td class="text-capitalize">' + task.status + '</td>';
                        }
                        if (task.status == 'doing') {
                            row += '<td class="text-capitalize text-primary">' + task.status + '</td>';
                        }
                        if (task.status == 'checking') {
                            row += '<td class="text-capitalize text-warning">' + task.status + '</td>';
                        }
                        if (task.status == 'done') {
                            row += '<td class="text-capitalize text-success">' + task.status + '</td>';
                        }

                        // Tambahkan kolom aksi
                        row += '<td>' +
                            '<a href="" class="btn" data-bs-toggle="dropdown">' +
                            '<i class="fa-solid fa-ellipsis-vertical"></i>' +
                            '</a>' +
                            '<ul class="dropdown-menu">';

                        if (task.status != 'done' && "{{ auth()->user()->role->role }}" == 'admin') {
                            row += '<form action="{{ route('goals.update_adm') }}" method="POST">' +
                                '@csrf' +
                                '<li>' +
                                '<button class="dropdown-item" name="mark" value="done">' +
                                '<i class="fa-solid fa-clipboard-check fa-lg"></i>' +
                                'Mark as done' +
                                '</button>' +
                                '<input type="hidden" value="' + task.id + '" name="task_id">' +
                                '</li>' +
                                '</form>';
                        }

                        if (task.status == 'done' && "{{ auth()->user()->role->role }}" == 'admin') {
                            row += '<form action="{{ route('goals.view_prog') }}" method="GET">' +
                                '@csrf' +
                                '<input type="hidden" name="task_id" value="' + task.id + '">' +
                                '<li>' +
                                '<button class="dropdown-item" type="submit">' +
                                '<i class="fa-solid fa-star fa-lg"></i>' +
                                'Beri Nilai' +
                                '</button>' +
                                '</li>' +
                                '</form>';
                        }

                        row += '<li>' +
                            '<button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#hapustugas_' +
                            task.id + '">' +
                            '<i class="fa-solid fa-trash fa-lg"></i>' +
                            'Hapus Tugas' +
                            '</button>' +
                            '</li>';

                        if ("{{ auth()->user()->role->role }}" == 'employee' && (task.status ==
                                'doing' || task.status == 'todo')) {
                            row += '<form action="{{ route('goals.view_prog') }}" method="GET">' +
                                '@csrf' +
                                '<input type="hidden" name="task_id" value="' + task.id + '">' +
                                '<li>' +
                                '<button type="submit" class="dropdown-item">' +
                                '<i class="fa-solid fa-edit fa-lg"></i>' +
                                'Update Progress' +
                                '</button>' +
                                '</li>' +
                                '</form>';
                        }

                        row += '</ul>' +
                            '</td>';

                        row += '<tr id="flush-collapseOne' + task.id +
                            '" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">' +
                            '<td class="bg-light">' +
                            '<div class="card">' +
                            '<div>' +
                            '<div class="text-center">' +
                            'tabel tasks' +
                            '</div>' +
                            '<div>' +
                            'goal owner : ' + task.owner.nama +
                            '</div>' +
                            '<div>' +
                            (task.grade == null ? 'grade : belum dinilai' : 'grade : ' + task.grade) +
                            '</div>' +
                            '<div>' +
                            'goal target : ' + task.goal_target +
                            '</div>' +
                            '<div>' +
                            'tipe tugas : ' + task.tipe_progress.nama_tipe +
                            '</div>' +
                            '<div>' +
                            'tanggal target : ' + task.tanggal_target +
                            '</div>' +
                            '</div>' +
                            '<div>' +
                            '<div class="text-center">' +
                            'tabel kpi' +
                            '</div>' +
                            '<div>' +
                            'kpi yang dinilai : ' + task.kpi.group_name +
                            '</div>' +
                            '<div>' +
                            'parameter : ' + task.kpi.parameter +
                            '</div>' +
                            '<div>' +
                            'weight : ' + task.kpi.weight +
                            '</div>' +
                            '</div>' +
                            '<div>' +
                            '<div class="text-center">' +
                            'tabel member' +
                            '</div>' +
                            '<div>' +
                            'jabatan : ' + task.member.jabatan +
                            '</div>' +
                            '<div>' +
                            'divisi : ' + task.member.divisi.nama_divisi +
                            '</div>' +
                            '</div>' +
                            '<div>' +
                            '<div class="text-center">' +
                            'tabel progress' +
                            '</div>';

                        var progress = @json($progress);

                        for (var i = 0; i < progress.length; i++) {
                            var p = progress[i];
                            if (p.tasks_id == task.id) {
                                row += '<div>' + p.progress + '</div>';
                                row += '<div>' + p.keterangan + '</div>';
                            }
                        }

                        row += '</div>' +
                            '</div>' +
                            '</td>';


                    });
                    // Menambahkan tabel baru ke dalam .card-body
                    $(".card-body table tbody").append(row);
                },
                error: function() {
                    console.log("Error occurred during AJAX request");
                }
            });
        }
    </script>
    <script>
        $(document).ready(function() {
            $('#kpi_id').change(function() {
                var kpiId = $(this).val();
                if (kpiId) {
                    $.ajax({
                        url: '{{ route('api.goals.getMember', '') }}/' + kpiId,
                        type: 'GET',
                        dataType: 'json',
                        success: function(data) {
                            $('#member_id').empty();
                            $('#member_id').append('<option value="">Choose..</option>');
                            $.each(data, function(key, value) {
                                $('#member_id').append(
                                    '<option class="text-capitalize" value="' +
                                    value.id + '">' + value.nama + ' ( ' + value
                                    .divisi.nama_divisi + ' - ' + value.jabatan +
                                    ' )' + '</option>');
                            });
                        }
                    });
                } else {
                    $('#member_id').empty();
                    $('#member_id').append('<option value="">Choose..</option>');
                }
            });
        });
    </script>
@endsection
