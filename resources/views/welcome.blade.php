@extends('layout.body')
@section('title', 'Dashboard')
@section('content')

    <section class="Dashboard">

        <!-- page title -->
        <div class="page-title">
            <h4 class="fw-bold">Hi @if(auth()->user()->hasProfile()) {{auth()->user()->member->nama}} @else {{auth()->user()->username}} @endif, How are you ? 👋</h4>
            <p class="text-muted">See a summary of your employee's progress</p>
        </div>


        <div class="content">
            <div class="row">

                <!-- payroll summary -->
                <div class="col-lg-8">
                    <div class="card" style="height: 34.5rem">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h4 class="card-title">Payroll Summary</h4>
                                </div>
                                <div class="col-2">
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
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: #0861fd;"></i>Taxes
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: orange;"></i>Net Salary
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: rgb(105, 211, 109);"></i>Gross Salary
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
                                <div class="row align-items-center">
                                    <div class="col-9">
                                        <h4 class="card-title">Employee's Time-off</h4>
                                    </div>
                                    <div class="col-3">
                                        <a href="#" class="text-muted">View all</a>
                                    </div>
                                </div>

                                <!-- card-content -->
                                <div class="content time-off" style="">
                                    <div class="d-flex flex-column">
                                        <div class="row my-2 align-items-center">
                                            <img src="{{ asset('illustration/pp.png') }}" alt=""
                                                style="max-width: 70px">
                                            <div class="col">
                                                Haffiyan
                                                <br>
                                                <div class="status text-muted" style="font-size: 13px">Sick</div>
                                            </div>
                                            <div class="col">
                                                <div class="text-danger text-end">5 - 10 Juni 2021</div>
                                            </div>
                                        </div>
                                        <hr class="my-2 align-content-center text-muted">


                                        <div class="row my-2 align-items-center">
                                            <img src="{{ asset('illustration/pp.png') }}" alt=""
                                                style="max-width: 70px">
                                            <div class="col">
                                                Jaya Raharja
                                                <br>
                                                <div class="status text-muted" style="font-size: 13px">Penyesuaian Tidur
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-danger text-end">5 - 10 Juni 2021</div>
                                            </div>
                                        </div>
                                        <hr class="my-2 align-content-center text-muted">


                                        <div class="row my-2 align-items-center">
                                            <img src="{{ asset('illustration/pp.png') }}" alt=""
                                                style="max-width: 70px">
                                            <div class="col">
                                                Ega Aisha
                                                <br>
                                                <div class="status text-muted" style="font-size: 13px">Family Bussiness
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="text-danger text-end">5 - 10 Juni 2021</div>
                                            </div>
                                        </div>
                                        <hr class="my-2 align-content-center text-muted">


                                        <div class="row my-2 align-items-center">
                                            <img src="{{ asset('illustration/pp.png') }}" alt=""
                                                style="max-width: 70px">
                                            <div class="col">
                                                Anggita
                                                <br>
                                                <div class="status text-muted" style="font-size: 13px">Sick</div>
                                            </div>
                                            <div class="col">
                                                <div class="text-danger text-end">5 - 10 Juni 2021</div>
                                            </div>
                                        </div>
                                        <hr class="my-2 align-content-center text-muted">
                                        <div class="row my-2 align-items-center">
                                            <img src="{{ asset('illustration/pp.png') }}" alt=""
                                                style="max-width: 70px">
                                            <div class="col">
                                                Anggita
                                                <br>
                                                <div class="status text-muted" style="font-size: 13px">Sick</div>
                                            </div>
                                            <div class="col">
                                                <div class="text-danger text-end">5 - 10 Juni 2021</div>
                                            </div>
                                        </div>
                                        <hr class="my-2 align-content-center text-muted">
                                        
                                    </div>
                                </div>


                            </div>
                        </div>

                        <!-- payment status -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col">
                                        <h4 class="card-title">Payment Status</h4>
                                    </div>
                                    <div class="col text-end">
                                        <a href="#" class="btn btn-lg">
                                            <i class="bi bi-three-dots"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="h4 fw-bold">5.000</div>
                                    <div class="text-muted mx-2" style="font-size: 13px">Employee</div>
                                </div>
                                <div class="bar">
                                    <div class="biru"></div>
                                    <div class="orange"></div>
                                    <div class="ijo"></div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-5">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: #0861fd;"></i>68%
                                    </div>
                                    <div class="col-3">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: orange;"></i>15%
                                    </div>
                                    <div class="col-3">
                                        <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: rgb(105, 211, 109);"></i>17%
                                    </div>
                                </div>
                                <div class="row text-muted" style="font-size: 13px">
                                    <div class="col-5">Succesfully Paid</div>
                                    <div class="col-3">Pending</div>
                                    <div class="col-3">Unpaid</div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>


            <!-- second row -->
            <div class="row">
                <div class="col-lg-8">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title">Profit Margin Analysis</h4>

                            <!-- Bar Chart -->
                            <canvas id="barChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card text-left">
                        <img class="card-img-top" src="holder.js/100px180/" alt="">
                        <div class="card-body">
                            <h4 class="card-title">Title</h4>
                            <p class="card-text">Body</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <style>
        /* Time off */
        .time-off {
            /* max-height: 16.7rem;  */
            max-height: 14rem; 
            overflow-y: scroll; 
            overflow-x:hidden;
        }


        /* Progress bar */
        .bar {
            width: 100%;
            height: 30px;
            border-radius: 10px;
            background-color: #b3b3b3;
            color: white;
            text-align: center;
        }

        .biru {
            width: 68%;
            height: 100%;
            background-color: rgb(12, 36, 252);
            float: left;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
        }

        .orange {
            width: 17%;
            height: 100%;
            background-color: orange;
            float: left;
        }

        .ijo {
            width: 15%;
            height: 100%;
            background-color: rgb(105, 211, 109);
            float: left;
            border-radius: 10px;
        }
    </style>


    <script>
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
    </script>
    <!-- End Bar CHart -->

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            new ApexCharts(document.querySelector("#reportsChart"), {
                series: [{
                    name: 'Sales',
                    data: [31, 40, 28, 51, 42, 82, 56],
                }, {
                    name: 'Revenue',
                    data: [11, 32, 45, 32, 34, 52, 41]
                }, {
                    name: 'Customers',
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
    </script>
@endsection
