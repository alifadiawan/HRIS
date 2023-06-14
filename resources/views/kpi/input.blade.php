@extends('layout.body')
@section('title', 'Input Item Data')
@section('content')
<section class="input">
    <div class="d-flex flex-row">
        <h4 class="fw-bold mb-4">Input Item Data</h4>
    </div>
    <div class="row">
        <div class="col">
            <button type="button" class="btn btn-primary text-white fw-bold"><i class="fa-solid fa-arrow-left"></i> Back</button>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <div class="col-lg-12">
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="KPI GROUP USED" class="fw-bold mt-4">KPI GROUP USED</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="-" aria-label="kpi-grup-used" aria-describedby="basic-addon1">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="SORT NO" class="fw-bold mt-4">SORT NO</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="1" aria-label="sort-no" aria-describedby="basic-addon1">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="KPI PARAMETER" class="fw-bold mt-4">KPI PARAMETER</label>
                                <div class="input-group">
                                    <textarea type="text-area" class="form-control" height="200px" aria-label="kpi-parameter" aria-describedby="basic-addon1"></textarea>
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <label for="weight" class="fw-bold mt-4">WEIGHT</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="0" aria-label="weight" aria-describedby="basic-addon1">
                                  </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="min" class="fw-bold mt-4">MINIMUM THRESHOLD</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="0" aria-label="min" aria-describedby="basic-addon1">
                                  </div>
                            </div>
                            <div class="col-lg-4">
                                <label for="max" class="fw-bold mt-4">MAXIMUM THRESHOLD</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="0" aria-label="max" aria-describedby="basic-addon1">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <label for="is-active" class="fw-bold mt-4">IS ACTIVE</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Live" aria-label="active" aria-describedby="basic-addon1">
                                  </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="d-grid gap-2 col-3">
                                <button type="submit" class="btn btn-sm btn-primary mt-3">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection