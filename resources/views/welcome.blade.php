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
                @if(auth()->user()->hasIncompleteProfile())
                <div class="alert alert-warning">
                    Silahkan Lengkapi Profile Terlebih Dahulu. <a href="{{route('employee.create')}}">Klik Ini.</a>
                </div>
                @endif
            <p class="text-muted">See a summary of your employee's progress</p>
        </div>

        @if(auth()->user()->hasProfile())
        <div class="content">
            <div class="row">

                <!-- payroll summary -->
                <div class="col-lg-8">
                    <div class="card" style="height: 34.8rem">
                        {{-- <div class="card"> --}}
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h4 class="card-title">KPI Task Summary</h4>
                                </div>
                                <div class="col-lg-2 col-5">
                                    <select name="" class="form-select" id="">
                                        <option value="">Yearly</option>
                                        <option value="">Monthly</option>
                                        <option value="">Daily</option>
                                    </select>
                                </div>
                            </div>

                            <!-- card content -->
                            <div class="row mt-3">
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: #0861fd;"></i>Doing
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: orange;"></i>Checking
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                        style="color: rgb(105, 211, 109);"></i>Done
                                </div>
                            </div>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>
                            <!-- End Line Chart -->

                        </div>
                    </div>
                </div>


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
                                            @if($task->isEmpty())
                                                <p class="h1 text-center">Belum Ada Tugas</p>
                                            @else
                                            @foreach($task as $t)
                                            <div class="row my-2 align-items-center">
                                                <div class="col">
                                                    <div class="fw-bold" style="font-size: 14px;">{{$t->kpi->group_name}}</div>
                                                    <div class="status text-muted text-truncate text-capitalize"
                                                        style="font-size: 13px; max-width:13rem">{{$t->status}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="text-danger text-end" style="font-size: 13px;">{{ date('d F Y', strtotime($t->created_at)) }} -
                                                {{ date('d F Y', strtotime($t->tanggal_target)) }}</div>
                                                </div>
                                            </div>
                                            <hr class="my-2 align-content-center text-muted">
                                            @endforeach
                                            @endif
                                            {{-- <div class="accordion accordion-flush" id="accordionFlushExample">
                                                    <div class="accordion-item">
                                                        <h2 class="accordion-header">
                                                            <button class="accordion-button collapsed" type="button"
                                                                data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                                                aria-expanded="false" aria-controls="flush-collapseOne">
                                                                Tugas 1
                                                            </button>
                                                        </h2>
                                                        <div id="flush-collapseOne" class="accordion-collapse collapse"
                                                            data-bs-parent="#accordionFlushExample">
                                                            <div class="accordion-body">
                                                                <p class="pepek">Lorem ipsum dolor sit, amet consectetur
                                                                    adipisicing elit. Consectetur earum cupiditate expedita
                                                                    dolorum doloremque, iste optio molestias sunt quod dolores
                                                                    est rerum neque id laborum natus harum eligendi perferendis
                                                                    consequuntur?</p>
                                                                    <a href="/progress">Show More</a>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne2" aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                    Tugas 2
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne2" class="accordion-collapse collapse"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <p class="pepek">Lorem ipsum dolor sit, amet consectetur
                                                                        adipisicing elit. Consectetur earum cupiditate expedita
                                                                        dolorum dolor</p>
                                                                        <a href="/progress">Show More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <h2 class="accordion-header">
                                                                <button class="accordion-button collapsed" type="button"
                                                                    data-bs-toggle="collapse"
                                                                    data-bs-target="#flush-collapseOne3" aria-expanded="false"
                                                                    aria-controls="flush-collapseOne">
                                                                    Tugas 3
                                                                </button>
                                                            </h2>
                                                            <div id="flush-collapseOne3" class="accordion-collapse collapse"
                                                                data-bs-parent="#accordionFlushExample">
                                                                <div class="accordion-body">
                                                                    <p class="pepek">Lorem </p>
                                                                        <a href="/progress">Show More</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> --}}
                                        </div>
                                    </div>
                                @else
                                    <div class="content time-off" style="">

                                        {{-- <div class="d-flex flex-column">
                                            <div class="row my-2 align-items-center">
                                                <img src="{{ asset('illustration/pp.png') }}" alt=""
                                                    style="max-width: 70px">
                                                <div class="col">
                                                    Haffiyan
                                                    <br>
                                                    <div class="status text-muted" style="font-size: 13px">Ijin</div>
                                                </div>
                                                <div class="col">
                                                    <div class="text-danger text-end">5 - 10 Juni 2021</div>
                                                </div>
                                            </div>
                                            <hr class="my-2 align-content-center text-muted">
                                        </div> --}}

                                        <div class="d-flex flex-column">
                                            @if($task_adm->isEmpty())
                                                <p class="h1 text-center">Belum Ada Tugas</p>
                                            @else
                                            @foreach($task_adm as $t)
                                            <div class="row my-2 align-items-center">
                                                <div class="col">
                                                    <div class="fw-bold" style="font-size: 14px;">{{$t->kpi->group_name}}</div>
                                                    <div class="status text-muted text-truncate text-capitalize"
                                                        style="font-size: 13px; max-width:13rem">{{$t->member->nama}}</div>
                                                </div>
                                                <div class="col">
                                                    <div class="text-danger text-end" style="font-size: 15px;">{{ date('d F Y', strtotime($t->created_at)) }}</div>
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
                        @if($task_all->count() > 0 && $task_doing->count() > 0 &&$task_checking->count() > 0 && $task_done->count() > 0 && $task_todo->count() > 0)
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
                                    <div class="h4 fw-bold">{{$task_all->count()}}</div>
                                    <div class="text-muted mx-2" style="font-size: 13px">Tugas</div>
                                </div>
                                <div class="bar">
                                    <div class="biru"></div>
                                    <div class="orange"></div>
                                    <div class="ijo"></div>
                                    <div class="abu"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-3">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: #0861fd;"></i>{{($task_doing->count() / $task_all->count()) * 100}}%
                                    </div>
                                    <div class="col-3">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: orange;"></i>{{($task_checking->count() / $task_all->count()) * 100}}%
                                    </div>
                                    <div class="col-3">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                            style="color: rgb(105, 211, 109);"></i>{{($task_done->count() / $task_all->count()) * 100}}%
                                    </div>
                                    <div class="col-3">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                            style="color: gray;"></i>{{($task_todo->count() / $task_all->count()) * 100}}%
                                    </div>
                                </div>
                                <div class="row text-muted" style="font-size: 13px">
                                    <div class="col-3">Doing</div>
                                    <div class="col-3">Checking</div>
                                    <div class="col-3">Done</div>
                                    <div class="col-3">To-do</div>
                                </div>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>


            <!-- second row -->
            <!-- <div class="row">
                <div class="col-lg-8">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title">Profit Margin Analysis</h4> -->

                            <!-- Bar Chart -->
                            <!-- <canvas id="barChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-left">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        {{-- <div class="card-body m-0 p-0">
                            <div class="content">
                                <div class="month">
                                    <ul>
                                        <li class="prev">&#10094;</li>
                                        <li class="next">&#10095;</li>
                                        <li>
                                            August<br>
                                            <span style="font-size:18px">2021</span>
                                        </li>
                                    </ul>
                                </div>
    
                                <ul class="weekdays">
                                    <li>Mo</li>
                                    <li>Tu</li>
                                    <li>We</li>
                                    <li>Th</li>
                                    <li>Fr</li>
                                    <li>Sa</li>
                                    <li>Su</li>
                                </ul>
    
                                <ul class="days">
                                    <li>1</li>
                                    <li>2</li>
                                    <li>3</li>
                                    <li>4</li>
                                    <li>5</li>
                                    <li>6</li>
                                    <li>7</li>
                                    <li>8</li>
                                    <li>9</li>
                                    <li><span class="active">10</span></li>
                                    <li>11</li>
                                    <li>12</li>
                                    <li>13</li>
                                    <li>14</li>
                                    <li>15</li>
                                    <li>16</li>
                                    <li>17</li>
                                    <li>18</li>
                                    <li>19</li>
                                    <li>20</li>
                                    <li>21</li>
                                    <li>22</li>
                                    <li>23</li>
                                    <li>24</li>
                                    <li>25</li>
                                    <li>26</li>
                                    <li>27</li>
                                    <li>28</li>
                                    <li>29</li>
                                    <li>30</li>
                                    <li>31</li>
                                </ul>
                            </div>
                        </div> --}}
                        <div class="card-body m-0 p-0">
                            <div class="content mt-3">
                                <div class="calendar calendar-first" id="calendar_first">
                                    <div class="calendar_header">
                                        <button class="switch-month switch-left"> <i
                                                class="fa fa-chevron-left"></i></button>
                                        <h2></h2>
                                        <button class="switch-month switch-right"> <i
                                                class="fa fa-chevron-right"></i></button>
                                    </div>
                                    <div class="calendar_weekdays"></div>
                                    <div class="calendar_content"></div>
                                </div>
                            </div>
                        </div>
                        {{-- <b-row>
                            <b-col md="auto">
                                <b-calendar v-model="value" @context="onContext" locale="en-US"></b-calendar>
                            </b-col>
                            <b-col>
                                <p>Value: <b>'{{ value }}'</b></p>
                                <p class="mb-0">Context:</p>
                                <pre class="small">{{ context }}</pre>
                            </b-col>
                        </b-row> --}}
                    </div>
                </div>
            </div> -->
        </div>
        @endif


    </section>

    <style>
        * {
            box-sizing: border-box;
        }

        ul {
            list-style-type: none;
        }

        body {
            font-family: Verdana, sans-serif;
        }

        .month {
            padding: 70px 25px;
            width: 100%;
            background: #1abc9c;
            text-align: center;
        }

        .month ul {
            margin: 0;
            padding: 0;
        }

        .month ul li {
            color: white;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 3px;
        }

        .month .prev {
            float: left;
            padding-top: 10px;
        }

        .month .next {
            float: right;
            padding-top: 10px;
        }

        .weekdays {
            margin: 0;
            padding: 10px 0;
            background-color: #ddd;
        }

        .weekdays li {
            display: inline-block;
            width: 13.6%;
            color: #666;
            text-align: center;
        }

        .days {
            padding: 10px 0;
            background: #eee;
            margin: 0;
        }

        .days li {
            list-style-type: none;
            display: inline-block;
            width: 13.6%;
            text-align: center;
            margin-bottom: 5px;
            font-size: 12px;
            color: #777;
        }

        .days li .active {
            padding: 5px;
            background: #1abc9c;
            color: white !important
        }

        /* Add media queries for smaller screens */
        @media screen and (max-width:720px) {

            .weekdays li,
            .days li {
                width: 13.1%;
            }
        }

        @media screen and (max-width: 420px) {

            .weekdays li,
            .days li {
                width: 12.5%;
            }

            .days li .active {
                padding: 2px;
            }
        }

        @media screen and (max-width: 290px) {

            .weekdays li,
            .days li {
                width: 12.2%;
            }
        }


        /* Progress bar */
        .bar {
            width: 100%;
            height: 30px;
            border-radius: 10px;
            background-color: #ffffff;
            color: white;
            text-align: center;
        }
        @if(auth()->user()->hasProfile() && $task_all->count() > 0 && $task_doing->count() > 0 &&$task_checking->count() > 0 && $task_done->count() > 0 && $task_todo->count() > 0)

        .biru {
            width: {{($task_doing->count() / $task_all->count()) * 100}}%;
            height: 100%;
            background-color: rgb(12, 36, 252);
            float: left;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .orange {
            width: {{($task_checking->count() / $task_all->count()) * 100}}%;
            height: 100%;
            background-color: orange;
            float: left;
        }

        .ijo {
            width: {{($task_done->count() / $task_all->count()) * 100}}%;
            height: 100%;
            background-color: rgb(105, 211, 109);
            float: left;
        }

        .abu {
            width: {{($task_todo->count() / $task_all->count()) * 100}}%;
            height: 100%;
            background-color: gray;
            float: left;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
        }
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
        const calendarHeader = document.querySelector('.calendar_header h2');
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
        });
    </script>

@endsection
