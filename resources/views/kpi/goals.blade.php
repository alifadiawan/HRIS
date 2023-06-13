@extends('layout.body')
@section('title', 'Goals Team')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <h4 class="fw-bold mb-4">Goals Team</h4>
                <button class="btn btn-info mb-2 text-white" type="submit">Button</button>
            </div>
        </div>
        <div class="row">
            <div class="card">
                <div class="row ">
                    <div class="col-lg-4">
                        <div class="input-group ms-4 mt-3">
                            <select class="form-select" id="inputGroupSelect02">
                                <option selected>Choose...</option>
                                <option value="1"><span><img src="https://assets.entrepreneur.com/content/3x2/2000/20200429211042-GettyImages-1164615296.jpeg" alt="Profile"
                                    class="rounded-circle"></span>Haffiyyan</option>
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
                        @foreach($task as $t)
                        <tr>
                            <td scope="row"><a href="" class="href"><i
                                        class="fa-solid fa-chevron-right me-3"></i></a> {{$t->goal_id}}</td>
                            <td class="fw-bold">{{$t->goal_name}} <span style="font-weight: normal">
                                    <p>{{date('d F Y', strtotime($t->created_at))}} - {{date('d F Y', strtotime($t->tanggal_target))}}</p>
                                </span></td>
                            <td>{{$t->owner->username}}</td>
                            @if($t->tipe_progress->nama_tipe == 'idr')
                            <td>{{$t->goal_progress}} / Rp. {{number_format($t->goal_target)}} <div class="progress">
                                    @if($t->status == 'todo')
                                    <div class="progress-bar bg-secondary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'doing')
                                    <div class="progress-bar bg-primary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'checking')
                                    <div class="progress-bar bg-warning" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif

                                    @if($t->status == 'done')
                                    <div class="progress-bar bg-success" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                </div>
                            </td>
                            @endif
                            @if($t->tipe_progress->nama_tipe == 'persentase')
                            <td>{{$t->goal_progress}}% / {{$t->goal_target}}% <div class="progress">
                                    @if($t->status == 'todo')
                                    <div class="progress-bar bg-secondary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'doing')
                                    <div class="progress-bar bg-primary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'checking')
                                    <div class="progress-bar bg-warning" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif

                                    @if($t->status == 'done')
                                    <div class="progress-bar bg-success" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                </div>
                            </td>
                            @endif
                            @if($t->tipe_progress->nama_tipe == 'nominal')
                            <td>{{$t->goal_progress}} / {{number_format($t->goal_target)}} <div class="progress">
                                    @if($t->status == 'todo')
                                    <div class="progress-bar bg-secondary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'doing')
                                    <div class="progress-bar bg-primary" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                    @if($t->status == 'checking')
                                    <div class="progress-bar bg-warning" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif

                                    @if($t->status == 'done')
                                    <div class="progress-bar bg-success" style="width:{{$t->goal_progress / $t->goal_target * 100}}%"></div>
                                    @endif
                                </div>
                            </td>
                            @endif
                            @if($t->status == 'todo')
                            <td class="text-capitalize">{{$t->status}}</td>
                            @endif
                            @if($t->status == 'doing')
                            <td class="text-capitalize text-primary">{{$t->status}}</td>
                            @endif
                            @if($t->status == 'checking')
                            <td class="text-capitalize text-warning">{{$t->status}}</td>
                            @endif
                            @if($t->status == 'done')
                            <td class="text-capitalize text-success">{{$t->status}}</td>
                            @endif
                            <td><i class="fa-solid fa-ellipsis-vertical"></i></td>
                        </tr>
                        @endforeach
                        <!-- <tr>
                            <td scope="row"><a href="" class="href"><i
                                        class="fa-solid fa-chevron-right me-3"></i></a> #0861f</td>
                            <td class="fw-bold">HR Company bookings target for Q3 <span style="font-weight: normal">
                                    <p>1 Jul 2023 - 15 Agustus 2023</p>
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
                                    <p>1 Jul 2023 - 15 Agustus 2023</p>
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
                        </tr> -->
                    </tbody>
                </table>
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
