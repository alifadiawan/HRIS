@extends('layout.body')
@section('title', 'Dashboard')
@section('welcome', 'active')
@section('content')

    <section class="Dashboard">

        <!-- page title -->
        <div class="page-title">
            <h4 class="fw-bold">Hi @if (auth()->user()->hasProfile())
                    {{ auth()->user()->member->nama }}
                @else
                    {{ auth()->user()->username }}
                @endif, How are you ? 👋</h4>
            @if (auth()->user()->hasIncompleteProfile())
                <div class="alert alert-warning">
                    Silahkan Lengkapi Profile Terlebih Dahulu. <a href="{{ route('employee.create') }}">Klik Ini.</a>
                </div>
            @endif
            @if (auth()->user()->role->role == 'admin' && $new->isNotEmpty())
                <div class="alert alert-warning">
                    Ada Employee Baru ! <br>Silahkan isi Jabatannya Untuk Memberinya Tugas ! <a href="/employee">Klik
                        ini.</a>
                </div>
            @endif
            <p class="text-muted">See a summary of your employee's progress</p>
        </div>


        @if (auth()->user()->hasProfile())
            <div class="content">
                <div class="row">

                    <!-- payroll summary -->
                    <div class="col-lg-8">
                        <div class="card" style="height: 100%">
                            {{-- <div class="card"> --}}
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-lg-8 col-12 text-center text-lg-start">
                                        <h4 class="card-title">KPI Task Summary</h4>
                                    </div>
                                    @if (auth()->user()->role->role == 'admin')
                                        <div class="col-lg-3 col-9 m-0 p-1">
                                            <select name="member-select" class="form-select" id="member-select">
                                                <option value="">All</option>
                                                @foreach ($member as $m)
                                                    <option value="{{ $m->id }}">{{ $m->nama }} -
                                                        {{ $m->divisi->nama_divisi }} - {{ $m->jabatan->nama_jabatan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-lg-1 col-3 m-0 p-1 text-center">
                                            <a href="" class="btn btn-outline-secondary"
                                                onclick="windows.location.reload()"><i
                                                    class="fa-solid fa-arrows-rotate"></i></a>
                                        </div>
                                    @endif
                                </div>

                                <!-- Chart -->
                                @if (auth()->user()->role->role == 'employee')
                                    {{-- @if ($employee_chart == null)
                                   <h1 class="fw-bold text-center text-uppercase text-danger"> belum ada tugas!! </h1>
                               @else --}}
                                    <div class="chart-container" id="employee-chart">
                                        {{-- {!! $employee_chart->container() !!} --}}
                                        @if (
                                            $todoCount_employee == null &&
                                                $doingCount_employee == null &&
                                                $checkingCount_employee == null &&
                                                $doneCount_employee == null)
                                            <h1 style="display: " class="fw-bold text-center" id="data_kosong">BELUM ADA TUGAS</h1>
                                        @else
                                            <canvas id="employee-canvas"></canvas>
                                        @endif
                                    </div>
                                    {{-- @endif --}}
                                @elseif (auth()->user()->role->role == 'admin')
                                    <div class="chart-container" id="admin-chart">
                                        {{-- {!! $admin_chart->container() !!} --}}
                                        <canvas id="admin-canvas"></canvas>
                                        <h1 style="display: none" class="fw-bold text-center" id="data_kosong">BELUM ADA TUGAS</h1>
                                        {{-- <h1 style="display: " id="role">{{ $role }}</h1> --}}
                                    </div>
                                @endif
                                <!-- End Chart -->

                            </div>
                        </div>
                    </div>

                    {{--  --}}

                    <!-- employee's time off -->
                    <div class="col-lg-4">
                        <div class="d-flex flex-column mt-2">
                            <div class="card">
                                <div class="card-body">

                                    <!-- card title -->
                                    @if (auth()->user()->role->role == 'employee')
                                        <div class="row align-items-center">
                                            <div class="col-lg-9 col-8">
                                                <h4 class="card-title">Daftar Tugas</h4>
                                            </div>
                                            <div class="col-lg-3 col-4">
                                                <a href="/goals" class="text-muted">View all</a>
                                            </div>
                                        </div>
                                    @else
                                        <div class="row align-items-center">
                                            <div class="col-lg-9 col-8">
                                                <h4 class="card-title">Tugas Terbaru</h4>
                                            </div>
                                            <div class="col-lg-3 col-4">
                                                <a href="/goals" class="text-muted">View all</a>
                                            </div>
                                        </div>
                                    @endif

                                    <!-- card-content -->
                                    @if (auth()->user()->role->role == 'employee')
                                        <div class="content time-off">
                                            <div class="d-flex flex-column">
                                                @if ($task->isEmpty())
                                                    <div class="col text-center">
                                                        - Belum ada Tugas -
                                                    </div>
                                                @else
                                                    @foreach ($task as $t)
                                                        <div class="row my-2 align-items-center">
                                                            <div class="col-5">
                                                                <div class="fw-bold text-truncate" style="font-size: 14px;">
                                                                    {{ $t->kpi->group_name }}</div>
                                                                <div class="status text-muted text-truncate text-capitalize"
                                                                    style="font-size: 13px; max-width:13rem">
                                                                    {{ $t->status }}
                                                                </div>
                                                            </div>
                                                            <div class="col-7">
                                                                <div class="text-danger text-end" style="font-size: 13px;">
                                                                    {{ date('d F Y', strtotime($t->created_at)) }} -
                                                                    {{ date('d F Y', strtotime($t->tanggal_target)) }}
                                                                    <br>
                                                                    ({{ \Carbon\Carbon::parse($t->tanggal_target)->diffInDays() }} days left)
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-2 align-content-center text-muted">
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <div class="content time-off" style="">
                                            <div class="d-flex flex-column">
                                                @if ($task_adm->isEmpty())

                                                    <div class="col text-center">
                                                        - Belum ada Tugas -
                                                    </div>
                                                @else
                                                    @foreach ($task_adm as $t)
                                                        <div class="row my-2 align-items-center">
                                                            <div class="col">
                                                                <div class="fw-bold" style="font-size: 14px;">
                                                                    {{ $t->kpi->group_name }}</div>
                                                                <div class="status text-muted text-truncate text-capitalize"
                                                                    style="font-size: 13px; max-width:13rem">
                                                                    {{ $t->member->nama }}</div>
                                                            </div>
                                                            <div class="col">
                                                                <div class="text-end me-2" style="font-size: 15px;">
                                                                    <div style="font-weight: 700">
                                                                        {{ date('d F Y', strtotime($t->created_at)) }}
                                                                    </div>
                                                                    
                                                                    <div class="text-muted" style="font-size: 13px; max-width:13rem">
                                                                        {{ $t->created_at->diffForHumans() }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr class="my-2 align-content-center text-muted">
                                                    @endforeach
                                                @endif
                                            </div>

                                        </div>
                                    @endif

                                </div>
                            </div>


                            <!-- payment status -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h4 class="card-title">Task Status</h4>
                                        </div>
                                        <div class="col text-end">
                                            <a href="#" class="btn btn-lg">
                                                <i class="bi bi-three-dots"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="d-flex align-items-center">
                                        @if (auth()->user()->role->role == 'admin')
                                            <div class="h4 fw-bold">{{ $task_all->count() }}</div>
                                        @else
                                            <div class="h4 fw-bold">{{ $employee->count() }}</div>
                                        @endif
                                        <div class="text-muted mx-2" style="font-size: 13px">Tugas</div>
                                    </div>
                                    <div class="bar">
                                        <div class="biru"></div>
                                        <div class="orange"></div>
                                        <div class="ijo"></div>
                                        <div class="abu"></div>
                                    </div>
                                    @if (auth()->user()->role->role == 'admin')
                                        <div class="row mt-3">
                                            @if ($task_doing->count() > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #0861fd;"></i>{{ ($task_doing->count() / $task_all->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #0861fd;"></i>0%
                                                </div>
                                            @endif
                                            @if ($task_checking->count() > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #ffa500;"></i>{{ ($task_checking->count() / $task_all->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: orange;"></i>0%
                                                </div>
                                            @endif
                                            @if ($task_done->count() > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #69d36d;"></i>{{ ($task_done->count() / $task_all->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: rgb(105, 211, 109);"></i>0%
                                                </div>
                                            @endif
                                            @if ($task_todo->count() > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #808080;"></i>{{ ($task_todo->count() / $task_all->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: gray;"></i>0%
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <div class="row mt-3">
                                            @if ($doingCount_employee > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #0861fd;"></i>{{ ($doingCount_employee / $employee->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #0861fd;"></i>0%
                                                </div>
                                            @endif
                                            @if ($checkingCount_employee > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #ffa500;"></i>{{ ($checkingCount_employee / $employee->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: orange;"></i>0%
                                                </div>
                                            @endif
                                            @if ($doneCount_employee > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: #69d36d;"></i>{{ ($doneCount_employee / $employee->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: rgb(105, 211, 109);"></i>0%
                                                </div>
                                            @endif
                                            @if ($todoCount_employee > 0)
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: rgb(128, 128, 128);"></i>{{ ($todoCount_employee / $employee->count()) * 100 }}%
                                                </div>
                                            @else
                                                <div class="col-3">
                                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                                        style="color: gray;"></i>0%
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                    <div class="row text-muted" style="font-size: 13px">
                                        <div class="col-3">Doing</div>
                                        <div class="col-3">Checking</div>
                                        <div class="col-3">Done</div>
                                        <div class="col-3">To-do</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        @endif


    </section>


    {{-- <script src="https://code.jquery.com/jquery-3.6.1.slim.js"
        integrity="sha256-tXm+sa1uzsbFnbXt8GJqsgi2Tw+m4BLGDof6eUPjbtk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // import LarapexChart from 'ArielMejiaDev\LarapexCharts\LarapexChart';
        // import LarapexChart from 'laravel-larapex-charts';

        $(document).ready(function() {
            // employee-chart
            // var role = {!! $role !!};
            // var role = document.getElementById("role");
            @if (auth()->user()->role->role == 'admin')
                //admin-chart
                var changepie = document.getElementById('admin-canvas');
                var chart_all = new Chart(changepie, {
                    type: 'pie',
                    data: {
                        labels: [
                            'To do',
                            'Doing',
                            'Checking',
                            'Done'
                        ],
                        datasets: [{
                            data: [
                                {!! $todoCount !!},
                                {!! $doingCount !!},
                                {!! $checkingCount !!},
                                {!! $doneCount !!}
                            ],
                            backgroundColor: [
                                '#808080',
                                '#0861fd',
                                '#ffa500',
                                '#69d36d'
                            ]
                        }]
                    }
                });
            @else
                var employee = document.getElementById('employee-canvas');
                new Chart(employee, {
                    type: 'pie',
                    data: {
                        labels: [
                            'To do',
                            'Doing',
                            'Checking',
                            'Done'
                        ],
                        datasets: [{
                            data: [
                                {!! $todoCount_employee !!},
                                {!! $doingCount_employee !!},
                                {!! $checkingCount_employee !!},
                                {!! $doneCount_employee !!}
                            ],
                            backgroundColor: [
                                '#808080',
                                '#0861fd',
                                '#ffa500',
                                '#69d36d'
                            ]
                        }]
                    }
                });
            @endif



            $('#member-select').on('change', function() {
                var id = $('#member-select').val()
                $.ajax({
                    url: '{{ route('api.dashboard.chart', '') }}/' + id,
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {

                        var todo = data.todoCount;
                        var doing = data.doingCount;
                        var checking = data.checkingCount;
                        var done = data.doneCount;
                        var kosong = data.null;

                        chart_all.destroy();
                        if (kosong == 1) {
                            document.getElementById('data_kosong').style.display = "inline";
                        } else {
                            // $('#admin').html('data kosong');
                            document.getElementById('data_kosong').style.display = "none";
                            chart_all = new Chart(changepie, {
                                type: 'pie',
                                data: {
                                    labels: [
                                        'To do',
                                        'Doing',
                                        'Checking',
                                        'Done'
                                    ],
                                    datasets: [{
                                        data: [
                                            todo,
                                            doing,
                                            checking,
                                            done
                                        ],
                                        backgroundcolor: [
                                            '#808080',
                                            '#0861fd',
                                            '#ffa500',
                                            '#69d36d'
                                        ]
                                    }]
                                }
                            });
                        }
                        // new LarapexChart().pieChart();
                        // chart.setLabels(['To do', 'Doing', 'Checking', 'Done'])
                        // chart.setColors(['#808080', '#0861fd', '#ffa500', '#69d36d'])
                        // chart.setDataset([todo, doing, checking, done]);
                        // // chart.setDataset(['1','2','3','4','5']);

                        // chart.render('#admin-chart')


                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                })
            })
        });
    </script>


    <!-- Chart -->
    {{-- @if (auth()->user()->role->role == 'employee')
        @if ($employee_chart == null)
        @else
            <script src="{{ $employee_chart->cdn() }}"></script>
            {{ $employee_chart->script() }}
        @endif
    @elseif (auth()->user()->role->role == 'admin')
        <script src="{{ $admin_chart->cdn() }}"></script>
        {{ $admin_chart->script() }}
    @endif --}}

    <style>
        @if (auth()->user()->hasProfile())

            @if ($task_doing->count() > 0)
                .biru {
                    width: {{ ($task_doing->count() / $task_all->count()) * 100 }}%;
                    height: 100%;
                    background-color: rgb(12, 36, 252);
                    float: left;
                    border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;
                }
            @else
                .biru {
                    width: 0%;
                    height: 100%;
                    background-color: rgb(12, 36, 252);
                    float: left;
                    border-top-left-radius: 10px;
                    border-bottom-left-radius: 10px;
                }
            @endif

            @if ($task_checking->count() > 0)
                .orange {
                    width: {{ ($task_checking->count() / $task_all->count()) * 100 }}%;
                    height: 100%;
                    background-color: orange;
                    float: left;
                }
            @else
                .orange {
                    width: 0%;
                    height: 100%;
                    background-color: orange;
                    float: left;
                }
            @endif

            @if ($task_done->count() > 0)
                .ijo {
                    width: {{ ($task_done->count() / $task_all->count()) * 100 }}%;
                    height: 100%;
                    background-color: rgb(105, 211, 109);
                    float: left;
                }
            @else
                .ijo {
                    width: 0%;
                    height: 100%;
                    background-color: rgb(105, 211, 109);
                    float: left;
                }
            @endif

            @if ($task_todo->count() > 0)
                .abu {
                    width: {{ ($task_todo->count() / $task_all->count()) * 100 }}%;
                    height: 100%;
                    background-color: gray;
                    float: left;
                    border-top-right-radius: 10px;
                    border-bottom-right-radius: 10px;
                }
            @else
                .abu {
                    width: 0%;
                    height: 100%;
                    background-color: gray;
                    float: left;
                    border-top-right-radius: 10px;
                    border-bottom-right-radius: 10px;
                }
            @endif
        @endif
        /* text truncate override */
        .pepek {
            display: -webkit-box;
            max-width: 320px;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>


    <script>
        // profit margin analysis
        document.addEventListener("DOMContentLoaded", () => {
            new Chart(document.querySelector('#barChart'), {
                type: 'bar',
                data: {
                    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
                    datasets: [{
                        label: 'Bar Chart',
                        data: [65, 59, 80, 81, 56, 55, 40],
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        });

        // payroll summarry
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                    name: 'Doing',
                    data: [31, 40, 28, 51, 42, 82, 56],
                }, {
                    name: 'Checking',
                    data: [11, 32, 45, 32, 34, 52, 41]
                }, {
                    name: 'Done',
                    data: [15, 11, 32, 18, 9, 24, 11]
                }],
                chart: {
                    height: 350,
                    type: 'area',
                    toolbar: {
                        show: false
                    },
                },
                markers: {
                    size: 4
                },
                colors: ['#4154f1', '#2eca6a', '#ff771d'],
                fill: {
                    type: "gradient",
                    gradient: {
                        shadeIntensity: 1,
                        opacityFrom: 0.3,
                        opacityTo: 0.4,
                        stops: [0, 90, 100]
                    }
                },
                dataLabels: {
                    enabled: false
                },
                stroke: {
                    curve: 'smooth',
                    width: 2
                },
                xaxis: {
                    type: 'datetime',
                    categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z",
                        "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z",
                        "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z",
                        "2018-09-19T06:30:00.000Z"
                    ]
                },
                tooltip: {
                    x: {
                        format: 'dd/MM/yy HH:mm'
                    },
                }
            }).render();
        });

        // calendar
        // Mendapatkan elemen-elemen yang diperlukan
        /* const calendarHeader = document.querySelector('.calendar_header h2');
        const calendarWeekdays = document.querySelector('.calendar_weekdays');
        const calendarContent = document.querySelector('.calendar_content');
        const switchLeft = document.querySelector('.switch-left');
        const switchRight = document.querySelector('.switch-right');

        // Daftar nama-nama hari dalam seminggu
        const weekdays = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];

        // Fungsi untuk mendapatkan nama bulan berdasarkan indeks bulan
        function getMonthName(monthIndex) {
            const months = [
                'January', 'February', 'March', 'April', 'May', 'June', 'July',
                'August', 'September', 'October', 'November', 'December'
            ];
            return months[monthIndex];
        }

        // Fungsi untuk mengisi konten kalender
        function populateCalendar(year, month) {
            calendarHeader.textContent = getMonthName(month) + ' ' + year;

            // Menghapus konten hari-hari sebelumnya
            calendarWeekdays.innerHTML = '';

            // Mengisi konten nama-nama hari
            weekdays.forEach(function(weekday) {
                const dayElement = document.createElement('div');
                dayElement.textContent = weekday;
                calendarWeekdays.appendChild(dayElement);
            });

            // Menghapus konten tanggal-tanggal sebelumnya
            calendarContent.innerHTML = '';

            // Mendapatkan tanggal awal dan akhir bulan
            const firstDay = new Date(year, month, 1).getDay();
            const lastDate = new Date(year, month + 1, 0).getDate();

            // Mengisi konten tanggal-tanggal
            for (let date = 1; date <= lastDate; date++) {
                const dayElement = document.createElement('div');
                dayElement.textContent = date;
                calendarContent.appendChild(dayElement);
            }
        }

        // Mendapatkan tanggal dan tahun saat ini
        const currentDate = new Date();
        const currentYear = currentDate.getFullYear();
        const currentMonth = currentDate.getMonth();

        // Mengisi konten kalender dengan bulan dan tahun saat ini
        populateCalendar(currentYear, currentMonth);

        // Event listener untuk tombol beralih ke bulan sebelumnya
        switchLeft.addEventListener('click', function() {
            const previousMonth = currentMonth - 1;
            populateCalendar(currentYear, previousMonth);
        });

        // Event listener untuk tombol beralih ke bulan berikutnya
        switchRight.addEventListener('click', function() {
            const nextMonth = currentMonth + 1;
            populateCalendar(currentYear, nextMonth);
        }); */
    </script>

@endsection
