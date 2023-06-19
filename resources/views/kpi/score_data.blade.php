@extends('layout.body')
@section('title', 'KPI Group Data')
@section('page-title', 'Create Score Data')
@section('content')


    <section class="score_data">
        < class="content">
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

            @if (auth()->user()->role->role == 'admin')
                <div class="card text-left mt-3">
                    <img class="card-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <p class="text-muted mt-3">{{ $task->goal_id }} - {{ $kpi->group_name }}</p>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light">Parameter</th>
                                    <th class="bg-light">Weight</th>
                                    <th class="bg-light">Score</th>
                                </tr>
                            </thead>
                            <tbody>
                                <form action="{{ route('goals.progress') }}" method="POST">
                                    @csrf
                                    <tr>
                                        <td>{{ $kpi->parameter }}</td>
                                        <td>{{ $kpi->weight }}</td>
                                        <td>
                                            <input type="hidden" name="task_id" value="{{ $task->id }}">
                                            <input type="range" class="w-75" value="0" min="1"
                                                max="100" id="slider" oninput="updateOutput()" name="grade" />
                                            <input type="number" class="text-center rounded-4" id="sliderValue"
                                                min="1" max="100"value="0"
                                                style="background-color: #e6e6e6" oninput="updateSlider()"
                                                onchange="validateMaxValue()" name="grade">
                                        </td>
                                    </tr>
                                    <button class="btn btn-success" type="submit">nilai </button>
                                </form>
                            </tbody>
                        </table>
                    </div>
            @endif

            @if (auth()->user()->role->role == 'employee')
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

                <div class="row">

                    <!-- Previous Progress -->
                    <div class="col">
                        <div class="card text-left mt-3">
                            <img class="card-img-top" src="holder.js/100px180/" alt="">
                            <div class="card-body">
                                <p class="text-muted mt-3">Previous Progress</p>
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
                        </div>
                    </div>

                    <!-- Upcoming Progress -->
                    <div class="col">
                        <div class="card text-left mt-3">
                            <img class="card-img-top" src="holder.js/100px180/" alt="">
                            <div class="card-body">
                                <p class="text-muted mt-3">Upcoming Progress</p>
                                <form action="{{ route('goals.progress') }}" method="POST">


                                    @csrf
                                    <div class="form-group">
                                        <label for="goal_target">Goal Target</label>
                                        <div class="input-group">
                                            <input type="number" name="goal_target" id="goal_target" class="form-control"
                                                value="{{ $task->goal_target }}" readonly>
                                        </div>
                                    </div>
                                    <div class="form-group mt-2">
                                        <label for="goal_progress">Goal Progress</label>
                                        <div class="input-group">

                                            <input type="range" class="w-75" min="{{ $task->goal_progress }}"
                                                max="{{ $task->goal_target }}" value="{{ $task->goal_progress }}"
                                                name="goal_progress" id="slider" oninput="updateOutput()" />
                                            <input type="number" class="text-center rounded-4" id="sliderValue"
                                                min="{{ $task->goal_progress + 1 }}" max="{{ $task->goal_target }}"
                                                value="{{ $task->goal_progress }}" style="background-color: #e6e6e6"
                                                oninput="updateSlider()" onchange="validateMaxValue()"
                                                name="goal_progress">
                                        </div>
                                    </div>


                                    <div class="form-group mt-2">
                                        <label for="keterangan">Keterangan</label>
                                        <div class="input-group">
                                            <textarea type="number" name="keterangan" id="keterangan" class="form-control" value="{{ $task->goal_target }}"
                                                required></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group mt-3">
                                        <input type="hidden" name="task_id" value="{{ $task->id }}">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
            @endif
            </div>
    </section>

    <script>
        function updateOutput() {
            var slider = document.getElementById("slider");
            var sliderVal = document.getElementById("sliderValue");

            sliderVal.value = slider.value;
            localStorage.setItem("sliderValue", slider.value);
        }

        function updateSlider() {
            var slider = document.getElementById("slider");
            var sliderVal = document.getElementById("sliderValue");

            slider.value = sliderVal.value;
            localStorage.setItem("sliderValue", sliderVal.value);
        }

        function validateMaxValue() {
            var sliderVal = document.getElementById("sliderValue");
            var maxValue = parseInt(sliderVal.max);

            if (parseInt(sliderVal.value) > sliderVal.max) {
                sliderVal.value = sliderVal.max;
            }
        }

        window.onload = function() {
            var storedValue = localStorage.getItem("sliderValue");

            if (storedValue) {
                var slider = document.getElementById("slider");
                var sliderVal = document.getElementById("sliderValue");

                slider.value = storedValue;
                sliderVal.value = storedValue;
            }
        }
    </script>
@endsection
