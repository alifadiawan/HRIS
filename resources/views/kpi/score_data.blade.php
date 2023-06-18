@extends('layout.body')
@section('title', 'KPI Group Data')
@section('page-title', 'Create Score Data')
@section('content')

    @if (auth()->user()->role->role == 'admin')
        <section class="score_data">
            <div class="content">
                <div class="card text-left">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col">
                                <p class="p-0 m-0 fw-bold">Period</p>
                                <p class="text-muted m-0 p-0">July 2023</p>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column">
                                    <p class="my-0 fw-bold">To Employee</p>
                                    <p class="text-info my-2">{{ $task->member->nama }}</p>
                                    <div class="d-flex flex-row gap-2">
                                        <a href="#"
                                            class="btn btn-success px-3">{{ $task->member->divisi->nama_divisi }}</a>
                                        <a href="#" class="btn btn-info px-3">{{ $task->member->jabatan }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-left mt-3">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <p class="text-muted mt-3">Computer Skill KPI KPI</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light">Parameter</th>
                                    <th class="bg-light">Weight</th>
                                    <th class="bg-light">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Bahasa pemrograman yang dikuasai</td>
                                    <td>30</td>
                                    <td>
                                        <input type="range" class="w-75" value="0" min="1" max="100"
                                            id="range" oninput="rangenumber.value=value" />
                                        <input type="number" class="text-center rounded-4" id="rangenumber" min="1"
                                            max="100" value="0" oninput="range.value=value"
                                            style="background-color: #e6e6e6">
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </section>
    @endif


    @if (auth()->user()->role->role == 'employee')
        <section class="score_data">
            <div class="content">
                <div class="card text-left">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <div class="row mt-2">
                            <div class="col">
                                <p class="p-0 m-0 fw-bold">Period</p>
                                <p class="text-muted m-0 p-0">July 2023</p>
                            </div>
                            <div class="col">
                                <div class="d-flex flex-column">
                                    <p class="my-0 fw-bold">To Employee</p>
                                    <p class="text-info my-2">{{ $task->member->nama }}</p>
                                    <div class="d-flex flex-row gap-2">
                                        <a href="#"
                                            class="btn btn-success px-3">{{ $task->member->divisi->nama_divisi }}</a>
                                        <a href="#" class="btn btn-info px-3">{{ $task->member->jabatan }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card text-left mt-3">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <p class="text-muted mt-3">{{ $task->goal_id }} - {{ $kpi->group_name }}</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light">Parameter</th>
                                    <th class="bg-light">Weight</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $kpi->parameter }}</td>
                                    <td>{{ $kpi->weight }}</td>
                                    {{-- <td>
                                        <input type="range" class="w-75" value="0" min="1" max="100"
                                            id="range" oninput="rangenumber.value=value" readonly/>
                                        <input type="number" class="text-center rounded-4" id="rangenumber" min="1"
                                            max="100" value="{{ $task->grade }}" oninput="range.value=value"
                                            style="background-color: #e6e6e6" readonly>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card text-left mt-3">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <p class="text-muted mt-3">previous Progress</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light">Progress</th>
                                    <th class="bg-light">keterangan</th>
                                    <th class="bg-light">Goal target</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    @if ($progress == null)
                                        <td>0</td>
                                        <td>-</td>
                                        <td>{{ $task->goal_target }}</td>
                                    @else
                                        <td>{{ $progress->progress }}</td>
                                        <td>{{ $progress->keterangan }}</td>
                                        <td>{{ $task->goal_target }}</td>
                                    @endif
                                    {{-- <td>
                                        <input type="range" class="w-75" value="0" min="1" max="100"
                                            id="range" oninput="rangenumber.value=value" readonly/>
                                        <input type="number" class="text-center rounded-4" id="rangenumber" min="1"
                                            max="100" value="{{ $task->grade }}" oninput="range.value=value"
                                            style="background-color: #e6e6e6" readonly>
                                    </td> --}}
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="card text-left mt-3">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <p class="text-muted mt-3">Progress</p>
                            <form action="{{ route('goals.progress') }}" method="POST">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="progress">Progress</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="goal_target">Goal Target</label>
                                        <div class="input-group">
                                            <input type="number" name="goal_target" id="goal_target"
                                                class="form-control" value="{{ $task->goal_target }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="goal_progress">Goal Progress</label>
                                        <div class="input-group">
                                            <input type="range" class="form-range" min="1"
                                                max="{{ $task->goal_target }}" id="slider"
                                                value="{{ $task->goal_progress }}" oninput="updateOutput()"
                                                name="goal_progress">
                                            <output class="fw-bold text-center"
                                                id="sliderValue">{{ $task->goal_progress }}</output>
                                            {{-- <input type="number" name="goal_progress" id="goal_progress"
                                                class="form-control"
                                                placeholder="previous progress : {{ $task->goal_progress }}"
                                                min="{{ $task->goal_progress + 1 }}" max="{{ $task->goal_target }}"
                                                required> --}}
                                        </div>
                                    </div>


                                    <div class="form-group mt-2">
                                        <label for="keterangan">Keterangan</label>
                                        <div class="input-group">
                                            <textarea type="number" name="keterangan" id="keterangan" class="form-control" value="{{ $task->goal_target }}"
                                                required></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="task_id" value="{{ $task->id }}">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">saving it</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </section>
    @endif
    <script>
        function updateOutput(taskId) {
            var slider = document.getElementById("slider");
            var output = document.getElementById("sliderValue");

            output.textContent = slider.value;
        }
        // var slider = document.getElementById("slider");
        // slider.addEventListener("change", function() {
        //     var minValue = {{ $task->goal_progress + 1 }};
        //     if (slider.value < minValue) {
        //         slider.value = minValue;
        //     }
        // });
    </script>
@endsection
