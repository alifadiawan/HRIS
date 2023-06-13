@extends('layout.body')
@section('title', 'Goals Team')
@section('content')

    <section class="goals">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-4">Goals Team</h4>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-info mb-2 text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Tambah Tugas</button>
            </div>
        </div>

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

                <div class="card-body">
                    <table class="table mt-3 " style="outline: 2px">
                        <thead class="table-secondary">
                            <tr style="text-align: start">
                                <th>Goal ID</th>
                                <th>Goal Name</th>
                                <th>Goal Owner</th>
                                <th>Goal Progress</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td scope="row"><a class="href"><i class="fa-solid fa-chevron-right me-3"></i></a>
                                    #0861f</td>
                                <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                        <p class="text-muted">1 Jul 2023 - 15 Agustus 2023</p>
                                    </span></td>
                                <td>Self</td>
                                <td>0 / Rp 5.000.000.000 <div class="progress">
                                        <div class="progress-bar bg-secondary" style="width:90%"></div>
                                    </div>
                                </td>
                                <td>Not Updated</td>
                                <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                            </tr>
                            <tr>
                                <td scope="row"><a href="" class="href"><i
                                            class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                                <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                        <p class="text-muted">1 Jul 2023 - 15 Agustus 2023</p>
                                    </span></td>
                                <td>Self</td>
                                <td>0 / Rp 5.000.000.000 <div class="progress">
                                        <div class="progress-bar bg-info" style="width:30%"></div>
                                    </div>
                                </td>
                                <td class="text-success">Updated</td>
                                <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                            </tr>
                            <tr>
                                <td scope="row"><a href="" class="href"><i
                                            class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                                <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                        <p class="text-muted">1 Jul 2023 - 15 Agustus 2023</p>
                                    </span></td>
                                <td>Self</td>
                                <td>0 / Rp 5.000.000.000 <div class="progress">
                                        <div class="progress-bar bg-success" style="width:10%"></div>
                                    </div>
                                </td>
                                <td>Not Updated</td>
                                <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                            </tr>
                            <tr>
                                <td scope="row"><a href="" class="href"><i
                                            class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                                <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                        <p>1 Jul 2023 - 15 Agustus 2023</p>
                                    </span></td>
                                <td>Self</td>
                                <td>0 / Rp 5.000.000.000 <div class="progress">
                                        <div class="progress-bar bg-warning" style="width:47%"></div>
                                    </div>
                                </td>
                                <td>Not Updated</td>
                                <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </section>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="head px-3 pt-3">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h5 class="fw-bold">Tambah Tugas</h5>
                        </div>
                        <div class="col-6 text-end">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                    </div>
                </div>
                <hr class="mb-0">
                <div class="modal-body">
                    <form action="">
                        <div class="form-gorup">
                            <label for="" class="fw-bold">Nama Tugas</label>
                            <input type="text" class="form-control" placeholder="nama tugas" name="" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="fw-bold">Tipe Progress</label>
                            <select name="" id="" class="form-select">
                                <option value="">Pilih tipe progress</option>
                                <option value="">Persentasi</option>
                                <option value="">Rupiah</option>
                                <option value="">3</option>
                            </select>
                        </div>
                        <div class="form-group mt-2">
                            <label for="" class="fw-bold">Tenggat</label>
                            <input type="date" class="form-control" name="" id="">
                        </div>
                        <div class="form-group mt-2">
                            <label for="Employee" class="fw-bold">Employee</label>
                            <select name="" id="" class="form-select">
                                <option value="">seekfni</option>
                                <option value="">1</option>
                                <option value="">2</option>
                                <option value="">3</option>
                                <option value="">4</option>
                                <option value="">5</option>
                                <option value="">6</option>
                                <option value="">7</option>
                                <option value="">8</option>
                                <option value="">9</option>
                                <option value="">10</option>
                                <option value="">11</option>
                                <option value="">12</option>
                                <option value="">13</option>
                                <option value="">14</option>
                                <option value="">15</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                                <option value="">9</option>
                            </select>
                        </div>
                        <div class="form-group mt-4">
                            <a href="" class="btn btn-primary">Submit</a>
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
@endsection
