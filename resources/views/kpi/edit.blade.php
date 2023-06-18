@extends('layout.body')
@section('title', 'Edit Item Data')
@section('content')
<section class="input">
    <div class="d-flex flex-row">
        <h4 class="fw-bold mb-4">Edit Item Data</h4>
    </div>
    <div class="row">
        <div class="col">
            <a href="{{route('kpi.index')}}" class="btn btn-primary text-white fw-bold"><i class="fa-solid fa-arrow-left"></i> Back</a>
        </div>
    </div>
    @if($errors->any())
    <div class="alert alert-danger">
        {{$errors}}
    </div>
    @endif
    <div class="container mt-4">
        <div class="row">
            <form action="{{route('kpi.update', $kpi->id)}}" method="post">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="col-lg-12">
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for="group_name" class="fw-bold mt-4">KPI GROUP USED</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control" placeholder="Nama KPI" aria-label="group_name" name="group_name" id="group_name" aria-describedby="basic-addon1" value="{{$kpi->group_name}}" required>
                                      </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for="sort_no" class="fw-bold mt-4">SORT NO</label>
                                    <div class="input-group">
                                        <input type="number" class="form-control" placeholder="1" min="1" aria-label="sort_no" name="sort_no" id="sort_no" aria-describedby="basic-addon1" value="{{$kpi->sort_no}}">
                                      </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for="deskripsi" class="fw-bold mt-4">DESKRIPSI KPI</label>
                                    <div class="input-group">
                                        <textarea type="text-area" class="form-control" height="200px" aria-label="deskripsi" name="deskripsi" id="deskripsi" aria-describedby="basic-addon1" required>{{$kpi->deskripsi}}</textarea>
                                      </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for="parameter" class="fw-bold mt-4">KPI PARAMETER</label>
                                    <div class="input-group">
                                        <textarea type="text-area" class="form-control" height="200px" aria-label="parameter" name="parameter" id="parameter" aria-describedby="basic-addon1" required>{{$kpi->parameter}}</textarea>
                                      </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-6">
                                    <label for="divisi_id" class="fw-bold mt-4">FOR DIVISI</label>
                                    <div class="input-group">
                                        <select class="form-select form-control text-capitalize" name="divisi_id" id="divisi_id">
                                            @php
                                                $totalDivisionCount = $divisi->count();
                                                $allDivisionsSelected = $kpi->mapping->pluck('divisi_id')->unique()->count() === $totalDivisionCount;
                                            @endphp
                                            @if($allDivisionsSelected)
                                                <option value="" selected>Semua</option>
                                                @foreach($divisi as $d)
                                                <option value="{{$d->id}}">{{$d->nama_divisi}}</option>
                                                @endforeach
                                            @else
                                                <option value="">Semua</option>
                                                @foreach($divisi as $d)
                                                    <option value="{{$d->id}}"
                                                        @foreach($kpi->mapping as $m)
                                                        @if($m->divisi_id === $d->id) selected @endif
                                                        @endforeach
                                                    >{{$d->nama_divisi}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label for="jabatan" class="fw-bold mt-4">FOR JABATAN</label>
                                    <div class="input-group">
                                        <select class="form-select form-control text-capitalize" name="jabatan" id="jabatan">
                                            @php
                                                $totalPositionCount = $jabatan->count();
                                                $allPositionsSelected = $kpi->mapping->pluck('jabatan')->unique()->count() === $totalPositionCount;
                                            @endphp
                                            @if($allPositionsSelected)
                                                <option value="" selected>Semua</option>
                                                @foreach($jabatan as $j)
                                                <option value="{{$j}}">{{$j}}</option>
                                                @endforeach
                                            @else
                                                <option value="">Semua</option>
                                                @foreach($jabatan as $j)
                                                    <option value="{{$j}}"
                                                        @foreach($kpi->mapping as $m)
                                                        @if($m->jabatan === $j) selected @endif
                                                        @endforeach
                                                    >{{$j}}</option>
                                                @endforeach
                                            @endif
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-4">
                                    <label for="weight" class="fw-bold mt-4">WEIGHT</label>
                                    <div class="input-group">
                                        <input type="number" name="weight" id="weight" class="form-control" placeholder="0" min="1" step="0.01" aria-label="weight" aria-describedby="basic-addon1" value="{{$kpi->weight}}" required>
                                      </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="min_treshold" class="fw-bold mt-4">MINIMUM THRESHOLD</label>
                                    <div class="input-group">
                                        <input type="number" name="min_treshold" id="min_treshold" class="form-control" placeholder="0" min="1" step="0.01" aria-label="min" aria-describedby="basic-addon1" value="{{$kpi->min_treshold}}" required>
                                      </div>
                                </div>
                                <div class="col-lg-4">
                                    <label for="max_treshold" class="fw-bold mt-4">MAXIMUM THRESHOLD</label>
                                    <div class="input-group">
                                        <input type="number" name="max_treshold" id="max_treshold" class="form-control" placeholder="0" min="1" step="0.01" aria-label="max" aria-describedby="basic-addon1" value="{{$kpi->max_treshold}}" required>
                                      </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-lg-12">
                                    <label for="is-active" class="fw-bold mt-4">IS ACTIVE</label>
                                    <div class="input-group">
                                        <select class="form-select form-control" name="isActive" id="isActive">
                                            <option value="">Pilih Status</option>
                                            <option value="1" @if($kpi->isActive == true) selected @endif>Active</option>
                                            <option value="0" @if($kpi->isActive == false) selected @endif>Non Active</option>
                                        </select>
                                      </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="d-grid gap-2 col-3">
                                    <button type="submit" class="btn btn-sm btn-primary mt-3">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection