@extends('layout.body')
@section('title', 'KPI Detail Progres')
@section('page-title', 'Detail Progres')
@section('content')

    <section class="score_data">
        <div class="content">
            {{-- Card3 --}}
            <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col">
                            <div class="d-flex flex-column">
                                <tr>
                                    <td class="my-0">To Employee :</td>
                                    <td class="text-dark my-2">Rafli Dwi Ferdiansyah</td>
                                </tr>
                                <div class="d-flex flex-row gap-2 mt-3">
                                    <a href="#" class="btn btn-success px-3">IT</a>
                                    <a href="#" class="btn btn-primary px-3 text-white">Programmer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-left">
                    <img class="col-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light" style="width: 500px">Keterangan</th>
                                    <th class="bg-light" style="width: 150px">Tanggal</th>
                                    <th class="bg-light">Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Membuat view admin beserta dengan fungsi back-end nya, serta menambahkan beebrapa
                                        fungsi / fitur seperti modal dll</td>
                                    <td>30 Juni 2022</td>
                                    <td>
                                        {{-- <input type="range" class="w-75" value="0" min="1" max="100"
                                            id="range" oninput="rangenumber.value=value" />
                                        <input type="number" class="text-center rounded-4" id="rangenumber" min="1"
                                            max="100" value="0" oninput="range.value=value"
                                            style="background-color: #e6e6e6"> --}}
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 75%; text-align:center">75%</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Card2 --}}
            <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col">
                            <div class="d-flex flex-column">
                                <tr>
                                    <td class="my-0">Employee :</td>
                                    <td class="text-dark my-2">Inna</td>
                                </tr>
                                <div class="d-flex flex-row gap-2 mt-3">
                                    <a href="#" class="btn btn-success px-3">IT</a>
                                    <a href="#" class="btn btn-primary px-3 text-white">UIUX Designer</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-left">
                    <img class="col-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light" style="width: 500px">Keterangan</th>
                                    <th class="bg-light" style="width: 150px">Tanggal</th>
                                    <th class="bg-light">Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Membuat view admin beserta dengan fungsi back-end nya, serta menambahkan beebrapa
                                        fungsi / fitur seperti modal dll</td>
                                    <td>30 Juni 2022</td>
                                    <td>
                                        {{-- <input type="range" class="w-75" value="0" min="1" max="100"
                                            id="range" oninput="rangenumber.value=value" />
                                        <input type="number" class="text-center rounded-4" id="rangenumber" min="1"
                                            max="100" value="0" oninput="range.value=value"
                                            style="background-color: #e6e6e6"> --}}
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 20%; text-align:center">20%</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {{-- Card3 --}}
            <div class="card text-left">
                <img class="card-img-top" src="holder.js/100px180/" alt="">
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col">
                            <div class="d-flex flex-column">
                                <tr>
                                    <td class="my-0">Employee :</td>
                                    <td class="text-dark my-2">Orang 123</td>
                                </tr>
                                <div class="d-flex flex-row gap-2 mt-3">
                                    <a href="#" class="btn btn-success px-3">Marketing</a>
                                    <a href="#" class="btn btn-primary px-3 text-white">Content Creator</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-left">
                    <img class="col-img-top" src="holder.js/100px180/" alt="">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="bg-light" style="width: 500px">Keterangan</th>
                                    <th class="bg-light" style="width: 150px">Tanggal</th>
                                    <th class="bg-light">Progress</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Membuat view admin beserta dengan fungsi back-end nya, serta menambahkan beebrapa
                                        fungsi / fitur seperti modal dll</td>
                                    <td>30 Juni 2022</td>
                                    <td>
                                        {{-- <input type="range" class="w-75" value="0" min="1" max="100"
                                            id="range" oninput="rangenumber.value=value" />
                                        <input type="number" class="text-center rounded-4" id="rangenumber" min="1"
                                            max="100" value="0" oninput="range.value=value"
                                            style="background-color: #e6e6e6"> --}}
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"
                                                style="width: 90%; text-align:center">90%</div>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="card-body">
                                <table class="table mt-4 table-bordered" style="outline: 2px">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>No</th>
                                            <th>Employee</th>
                                            <th>Progress</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row">1</td>
                                            <td>Rafli Dwi Ferdiansyah</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 90%; text-align:center">90%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>30 Juni 2023</td>
                                            <td style="width: 500px">Membuat view admin beserta dengan fungsi back-end nya,
                                                serta menambahkan beebrapa
                                                fungsi / fitur seperti modal dll</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">2</td>
                                            <td>Rafli Dwi Ferdiansyah</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 90%; text-align:center">90%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>30 Juni 2023</td>
                                            <td style="width: 500px">Membuat view admin beserta dengan fungsi back-end nya,
                                                serta menambahkan beebrapa
                                                fungsi / fitur seperti modal dll</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">3</td>
                                            <td>Rafli Dwi Ferdiansyah</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 90%; text-align:center">90%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>30 Juni 2023</td>
                                            <td style="width: 500px">Membuat view admin beserta dengan fungsi back-end nya,
                                                serta menambahkan beebrapa
                                                fungsi / fitur seperti modal dll</td>
                                        </tr>
                                        <tr>
                                            <td scope="row">4</td>
                                            <td>Rafli Dwi Ferdiansyah</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-striped progress-bar-animated"
                                                        role="progressbar" aria-valuenow="90" aria-valuemin="0"
                                                        aria-valuemax="100" style="width: 90%; text-align:center">90%
                                                    </div>
                                                </div>
                                            </td>
                                            <td>30 Juni 2023</td>
                                            <td style="width: 500px">Membuat view admin beserta dengan fungsi back-end nya,
                                                serta menambahkan beebrapa
                                                fungsi / fitur seperti modal dll</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    {{-- <section class="score_data">
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
</section> --}}

@endsection
