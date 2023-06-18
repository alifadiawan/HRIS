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

                            @foreach (auth()->user()->role->role == 'admin' ? $task_adm : $task as $t)
                                <tr>
                                    <td scope="row">
                                        <button data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne{{ $t->id }}"><i
                                                class="fa-solid fa-chevron-right me-3"></i>
                                        </button> {{ $t->goal_id }}
                                    </td>
                                    <td class="fw-bold">{{ $t->kpi->group_name }} <span style="font-weight: normal">
                                            <p>{{ date('d F Y', strtotime($t->created_at)) }} -
                                                {{ date('d F Y', strtotime($t->tanggal_target)) }}</p>
                                        </span></td>
                                    <td>{{ $t->owner->nama }}</td>
                                    <td>{{ $t->member->nama }}</td>
                                    {{-- <td>{{ $t->goal_id}}</td> --}}
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
                                                {{-- <form action="{{ route('goals.update_adm') }}" method="POST">
                                                    @csrf
                                                    @method('delete') --}}
                                                <li><button class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#hapustugas_{{ $t->id }}"><i
                                                            class="fa-solid fa-trash fa-lg"></i>Hapus Tugas</button>
                                                </li>
                                                {{-- </form> --}}
                                            @elseif(auth()->user()->role->role == 'employee')
                                                @if ($t->status != 'done')
                                                <form action="{{ route('goals.view_prog') }}" method="GET">
                                                    @csrf
                                                    <input type="hidden" name="task_id" value="{{ $t->id }}">
                                                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#progress_{{ $t->id }}"><i
                                                                class="fa-solid fa-edit fa-lg"></i>
                                                            nilai</a></li>
                                                    <li><button type="submit" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#progress_{{ $t->id }}"><i
                                                                class="fa-solid fa-edit fa-lg"></i>
                                                            Update Progress</button></li>
                                                        </form>
                                                @endif
                                            @endif
                                        </ul>
                                    </td>
                                    {{-- modal nilai  --}}
                                    <div class="modal fade" id="nilai_{{ $t->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Nilai 1 -
                                                        100
                                                    </h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('goals.update_adm') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-body">
                                                        {{-- <input type="range" class="form-range" min="1"
                                                            max="100" id="slider_{{ $t->id }}"
                                                            oninput="updateOutput({{ $t->id }})" name="slider">
                                                        <output class="fw-bold text-center"
                                                            id="sliderValue_{{ $t->id }}">0</output> --}}
                                                    </div>
                                                    <input type="hidden" name="task_id" value="{{ $t->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Save
                                                            changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                <tr id="flush-collapseOne{{ $t->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <td class="bg-light"></td>
                                    <td class="bg-light">awdaoiw</td>
                                    <td class="bg-light">awdaoiw</td>
                                    <td class="bg-light">awdaoiw</td>
                                    <td class="bg-light">awdaoiw</td>
                                    <td class="bg-light">awdaoiw</td>
                                    <td class="bg-light">awdaoiw</td>
                                </tr>

                                {{-- end modal --}}
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
                                {{-- modal progress --}}
                                <div class="modal fade" id="progress_{{ $t->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">

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
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function updateOutput(taskId) {
            var slider = document.getElementById("slider_" + taskId);
            var output = document.getElementById("sliderValue_" + taskId);

            output.textContent = slider.value;
        }
    </script> --}}
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
