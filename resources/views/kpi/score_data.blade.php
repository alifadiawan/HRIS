@extends('layout.body')
@section('title', 'KPI Group Data')
@section('page-title', 'Score Data')
@section('content')

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
                            <p class="text-info my-2">Jaya Raharja (00179B)</p>
                            <div class="d-flex flex-row gap-2">
                                <a href="#" class="btn btn-success px-3">Information Technology Division</a>
                                <a href="#" class="btn btn-info px-3">Supervisor</a>
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
                                <input type="range" class="w-75" value="0" min="1" max="100" id="range"
                                    oninput="rangenumber.value=value" />
                                <input type="number" class="text-center rounded-4" id="rangenumber" min="1" max="100"
                                    value="0" oninput="range.value=value" style="background-color: #e6e6e6">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection