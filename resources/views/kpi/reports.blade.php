@extends('layout.body')
@section('title', 'KPI Reports')
@section('content')
    <section class="reports">
        <!-- page title -->
        <div class="page-title">
            <h4 class="fw-bold">Hi @if (auth()->user()->hasProfile())
                    {{ auth()->user()->member->nama }}
                @else
                    {{ auth()->user()->username }}
                @endif, How are you ? 👋</h4>
            <p class="text-muted">See a summary of your analysis development</p>
        </div>

        <div class="container">
            <div class="row">
                <!-- payroll summary -->
                <div class="col-lg-12">
                    <div class="card" style="height: 34.8rem">
                        {{-- <div class="card"> --}}
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-10">
                                    <h4 class="card-title">KPI Reports</h4>
                                </div>
                                <!-- <div class="col-2">
                                    <select name="" class="form-select" id="">
                                        <option value="">Export</option>
                                    </select>
                                </div> -->
                            </div>

                            <!-- card content -->
                            <div class="row gap-3">
                                <div class="col fw-bold">
                                    <button type="submit" class="btn btn-sm btn-primary active">12 Months</button>
                                    <button type="submit" class="btn btn-sm btn-primary">3 Months</button>
                                    <button type="submit" class="btn btn-sm btn-primary">30 Days</button>
                                    <button type="submit" class="btn btn-sm btn-primary">7 Days</button>
                                    <button type="submit" class="btn btn-sm btn-primary">24 Hours</button>
                                </div>
                            </div>

                            <!-- Line Chart -->
                            <div id="reportsChart"></div>
                            <!-- End Line Chart -->

                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <!-- payroll summary -->
                <!-- <div class="col-lg-8">
                    <div class="card text-left">
                        <div class="card-body">
                            <h4 class="card-title">Profit Margin Analysis</h4>
                            <div class="row mt-3">
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: #0861fd;"></i>Revenue
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0" style="color: rgb(75, 192, 192);"></i>Net Profit
                                </div>
                                <div class="col">
                                    <i class="fa-solid fa-square fa-2xl me-2 p-0"
                                        style="color: rgb(255, 159, 64);"></i>Net Profit Margin
                                </div>
                            </div> -->
                            <!-- Bar Chart -->
                            <!-- <canvas id="barChart" style="max-height: 400px;"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="mt-2 d-flex justify-content-between">Net Revenue <span class="ms-5"><i class="fa-solid fa-ellipsis"></i></span></p>
                            <h4 class="fw-bold">Rp 2.500.000,00</h4>
                            <p class="mt-2"><i class="fa-solid fa-arrow-up" style="color: #04e731;"></i>  5% in the last week</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="mt-2 d-flex justify-content-between">Net Salary<span class="ms-5"><i class="fa-solid fa-ellipsis"></i></span></p>
                            <h4 class="fw-bold">Rp 2.500.000,00</h4>
                            <p class="mt-2"><i class="fa-solid fa-arrow-up" style="color: #04e731;"></i>  5% in the last week</p>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <p class="mt-2 d-flex justify-content-between">Net Taxes<span class="ms-5"><i class="fa-solid fa-ellipsis"></i></span></p>
                            <h4 class="fw-bold">Rp 2.500.000,00</h4>
                            <p class="mt-2"><i class="fa-solid fa-arrow-up" style="color: #04e731;"></i>  5% in the last week</p>
                        </div>
                    </div>
                </div> -->
                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        new Chart(document.querySelector('#barChart'), {
                            type: 'bar',
                            data: {
                                labels: ['Q1', 'Q2', 'Q3', 'Q4', 'Q5', 'Q6', 'Q7'],
                                datasets: [{
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
                            series: [
                                
                            // {
                            //     name: 'Sales',
                            //     data: [31, 40, 28, 51, 42, 82, 56],
                            // }, 
                            {
                                name: 'KPI',
                                data: [11, 22, 33, 44, 55, 66, 77]
                            }, {
                                name: 'Employee',
                                data: [30, 11, 45, 18, 60, 24, 11]
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
                            colors: ['#4154f1', '#606C5D', '#ff771d'],
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
