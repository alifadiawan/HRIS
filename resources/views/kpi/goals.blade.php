@extends('layout.body')
@section('title', 'List Tugas')
@section('page-title', 'List Tugas')
@section('content')

    <section class="goals">
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


        <div class="content">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        @if (auth()->user()->role->role == 'admin')
                            <div class="col-lg-4 col-12">
                                <div class="input-group mt-3">
                                    <select class="form-select" id="option1" onchange="show()">
                                        <option>Choose...</option>
                                        @foreach ($member as $m)
                                            <option value="{{ $m->id }}">{{ $m->nama }} -
                                                {{ $m->divisi->nama_divisi }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        @endif
                        <div class="col-lg-4 col-9">
                            <div class="input-group mt-3">
                                <select class="form-select" id="inputGroupSelect03" onchange="show()">
                                    <option selected>Select Status</option>
                                    <option value="todo">Todo</option>
                                    <option value="doing">Doing</option>
                                    <option value="checking">Checking</option>
                                    <option value="done">Done</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="input-group mt-3">
                                <button onClick="window.location.reload();" class="btn btn-outline-secondary"><i class="fa-solid fa-rotate fa-lg"></i></button>
                            </div>
                        </div>
                    </div>


                    <!-- table -->
                    <div class="table-responsive-lg" id="div_tasks">
                        <table class="table mt-3 " style="outline: 2px" id="tabel_tasks">
                            <thead class="table-secondary table-responsive">
                                <tr style="text-align: start">
                                    <th>Goal ID</th>
                                    <th>Goal Name</th>
                                    <th>Goal Owner</th>
                                    <th>To</th>
                                    <th>Goal Progress</th>
                                    <th>Status</th>
                                    <th>Grade</th>
                                    <th></th>
                                </tr>
                            </thead>
                            {{-- sort employee --}}

                            <tbody>
                                @foreach (auth()->user()->role->role == 'admin' ? $task_adm : $task_member as $t)
                                    <tr class="main-row">
                                        <td scope="row">
                                            <button data-bs-toggle="collapse"
                                                data-bs-target="#flush-collapse{{ $t->id }}" id="button_collapse"><i
                                                    class="fa-solid fa-chevron-right me-3" aria-expanded="true"></i>
                                            </button> {{ $t->goal_id }}
                                        </td>
                                        <td class="fw-bold" id="kpi_groupname">{{ $t->kpi->group_name }} <span
                                                style="font-weight: normal">
                                                <p id="range_tanggal">{{ date('d F Y', strtotime($t->created_at)) }} -
                                                    {{ date('d F Y', strtotime($t->tanggal_target)) }}</p>
                                            </span></td>
                                        <td id="owner">{{ $t->owner->nama }}</td>
                                        <td id="member">{{ $t->member->nama }}</td>
                                        {{-- tipe progress --}}
                                        @if ($t->tipe_progress->nama_tipe == 'idr')
                                            <td>{{ $t->goal_progress }} / Rp. {{ number_format($t->goal_target) }}
                                                <div class="progress">
                                                    @if ($t->status == 'todo')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                    @if ($t->status == 'doing')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                    @if ($t->status == 'checking')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif


                                                    @if ($t->status == 'done')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        @elseif ($t->tipe_progress->nama_tipe == 'persentase')
                                            <td>{{ $t->goal_progress }}% / {{ $t->goal_target }}% <div class="progress">
                                                    @if ($t->status == 'todo')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                    @if ($t->status == 'doing')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                    @if ($t->status == 'checking')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif

                                                    @if ($t->status == 'done')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        @elseif ($t->tipe_progress->nama_tipe == 'nominal')
                                            <td>{{ $t->goal_progress }} / {{ number_format($t->goal_target) }} <div
                                                    class="progress">
                                                    @if ($t->status == 'todo')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                    @if ($t->status == 'doing')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                    @if ($t->status == 'checking')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif

                                                    @if ($t->status == 'done')
                                                        <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                                            style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                                        </div>
                                                    @endif
                                                </div>
                                            </td>
                                        @endif
                                        {{-- status --}}
                                        @if ($t->status == 'todo')
                                            <td class="text-capitalize">{{ $t->status }}</td>
                                        @elseif ($t->status == 'doing')
                                            <td class="text-capitalize text-primary">{{ $t->status }}</td>
                                        @elseif ($t->status == 'checking')
                                            <td class="text-capitalize text-warning">{{ $t->status }}</td>
                                        @elseif ($t->status == 'done')
                                            <td class="text-capitalize text-success">{{ $t->status }}</td>
                                        @endif
                                        @if ($t->grade == null)
                                            <td>-</td>
                                        @else
                                            <td>{{ $t->grade }}</td>
                                        @endif
                                        <td>
                                            @if (auth()->user()->role->role == 'admin')
                                                <a href="" class="btn" data-bs-toggle="dropdown">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>
                                            @endif
                                            @if (auth()->user()->role->role == 'employee')
                                                @if ($t->status == 'doing' || $t->status == 'todo')
                                                    <form action="{{ route('goals.view_prog') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="task_id" value="{{ $t->id }}">
                                                        <button type="submit" class="btn btn-warning btn-sm"><i
                                                                class="fa-solid fa-edit fa-lg"></i>
                                                            Update Progress</button>
                                                    </form>
                                                @endif
                                            @endif
                                            <ul class="dropdown-menu">
                                                @if (auth()->user()->role->role == 'admin')
                                                    @if ($t->status != 'done')
                                                        <form action="{{ route('goals.update_adm') }}" method="POST">
                                                            @csrf
                                                            <li><button class="dropdown-item" name="mark"
                                                                    value="done"><i
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
                                                            <input type="hidden" name="task_id"
                                                                value="{{ $t->id }}">
                                                            <li><button class="dropdown-item" type="submit"><i
                                                                        class="fa-solid fa-star fa-lg"></i>Beri
                                                                    Nilai</button></li>
                                                        </form>
                                                    @endif
                                                    {{-- <li><button class="dropdown-item" data-bs-toggle="modal"
                                                            data-bs-target="#hapustugas_{{ $t->id }}"><i
                                                                class="fa-solid fa-trash fa-lg"></i>Hapus
                                                            Tugas</button>
                                                    </li> --}}
                                                    <form action="{{ route('goals.update_adm') }}" method="GET">
                                                        @csrf
                                                        <input type="hidden" name="delete" value="delete">
                                                        <input type="hidden" name="task_id"
                                                            value="{{ $t->id }}">
                                                        <button type="submit" class="dropdown-item"><i
                                                                class="fa-solid fa-trash fa-lg"></i>Hapus
                                                            Tugas</button>
                                                    </form>
                                                @endif

                                            </ul>
                                        </td>
                                    </tr>
                                    <tr id="flush-collapse{{ $t->id }}" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <td colspan="8 bg-light">
                                            <div class="row p-3 justify-content-center">
                                                <!-- kanan -->
                                                <div class="col-8">
                                                    <div class="row p-3">
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
                                                                    <div class="content list-progress">
                                                                        @foreach ($progress->where('tasks_id', $t->id) as $p)
                                                                            <div class="row my-2 align-items-center">
                                                                                <div class="col-lg col-12">
                                                                                    <div class="fw-bold">
                                                                                        {{ $p->progress }}</div>
                                                                                    <div class="status text-muted">
                                                                                        {{ $p->keterangan }}</div>
                                                                                </div>
                                                                                <div class="col-lg-3 col-12">
                                                                                    <div class=" text-end">
                                                                                        {{ $p->created_at->format('d M Y') }}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endforeach
                                                                    </div>
                                                                </div>
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
                                                        <input type="hidden" name="task_id"
                                                            value="{{ $t->id }}">
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
                                @endforeach
                            </tbody>


                        </table>
                    </div>
                </div>
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
                            <label for="goal_id" class="fw-bold">Goal ID</label>
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
                            <label for="member_id" class="fw-bold">Employee</label>
                            <select name="member_id" id="member_id" class="form-select text-capitalize" required>
                                <option value="">Choose..</option>
                            </select>
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
                            <label for="goal_target" class="fw-bold">Goal Target</label>
                            <input type="number" name="goal_target" id="goal_target" class="form-control"
                                placeholder="0" min="1" required>

                        </div>
                        <div class="form-group mt-2">
                            <label for="tanggal_target" class="fw-bold">Tenggat</label>
                            <input type="date" class="form-control" name="tanggal_target" id="tanggal_target"
                                min="{{ date('Y-m-d') }}" required>
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
        // sortir employee 

        $(document).ready(function() {
            $('#inputGroupSelect03').on('change', function() {
                findStatus();
            });
        })

        function findStatus() {
            var descriptionFilter = $('#inputGroupSelect03').val().toLowerCase();
            $('.main-row').hide().filter(function() {
                var description = $(this).find('td:eq(5)').text().toLowerCase();
                var matchesDescriptionFilter = description.includes(descriptionFilter);
                var kosong = !description.includes(descriptionFilter);

                return matchesDescriptionFilter;
            }).show();


        }

        // {{-- function changeData(task_id) {
        //     var member_id = $('#option1').val();
        //     console.log(member_id);
        //     $.ajax({
        //         url: '{{ route('api.search.data') }}',
        //         type: "POST",
        //         data: {
        //             member_id: member_id,
        //             task_id: task_id
        //         },
        //         dataType: "json",
        //         success: function(response) {

        //             var tasks = response.task;
        //             console.log(tasks);
        //             var tbody = $('tbody');
        //             tbody.empty();

        //             $('#task').innerhtml(tasks);
        //             console.log(tasks);
        //             // console.log(task_id);

        //         },
        //         error: function(xhr, status, error) {
        //             // Menangani kesalahan jika terjadi
        //             console.log(error);
        //         }
        //     });
        // } --}}

        function show() {
            var member_id = $('#option1').val();
            // console.log(member_id);

            $.post('{{ route('api.search.data', '') }}/' + member_id, function(data) {
                // var tasks = data.task;
                $('#div_tasks').html(data);
                // console.log(data);
            })
        }

        function formatNumber(number) {
            // Implement your own number formatting logic here if needed
            return number.toLocaleString();
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
