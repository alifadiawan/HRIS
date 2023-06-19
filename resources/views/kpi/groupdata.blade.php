@extends('layout.body')
@section('title', 'KPI Group Data')
@section('page-title', 'KPI Group Data')
@section('content')


    <section class="group_data">
        <div class="content">
            @if (auth()->user()->role->role == 'admin')
                <a href="{{ route('kpi.create') }}" class="btn btn-info text-white mb-3">Add Data</a>
            @endif
            <div class="card text-left">
                <div class="card-body">
                    <div class="d-flex flex-row align-items-center my-3">
                        <p class="p-0 m-0 text-muted">Show</p>
                        <select class="form-select mx-2" name="" id="" style="width: 70px">
                            <option value="">10</option> Entries
                            <option value="">10</option> Entries
                            <option value="">10</option> Entries
                            <option value="">10</option> Entries
                        </select>
                        <p class="p-0 m-0 text-muted">Entries</p>
                    </div>
                    <div class="table-responsive">
                        <div class="content">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="bg-light">NO.</th>
                                        <th class="bg-light">KPI Group Name</th>
                                        <th class="bg-light">FOR DIVISION</th>
                                        <th class="bg-light">FOR POSITION</th>
                                        <th class="bg-light">DESCRIPTION</th>
                                        <th class="bg-light">IS ACTIVE</th>
                                        @if (auth()->user()->role->role == 'admin')
                                            <th class="bg-light">ACTION</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Search KPI No..."
                                                name="searchNo" id="searchNo">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Search KPI Group..."
                                                name="searchName" id="searchName">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Search for Division..."
                                                name="searchDivision" id="searchDivision">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Search for Position..."
                                                name="searchPosition" id="searchPosition">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" placeholder="Search Description..."
                                                name="searchDescription" id="searchDescription">
                                        </td>
                                        <td>
                                            <select class="form-control form-select" id="filterKPI">
                                                <option value="all">All</option>
                                                <option value="active">Active</option>
                                                <option value="non-active">Non-active</option>
                                            </select>
                                        </td>
                                    </tr>
                                    @foreach ($kpis as $kpi)
                                        <tr class="text-center kpi-row" style="vertical-align: middle; ">
                                            <td class="fw-bold">{{ $kpi->sort_no }}</td>
                                            <td class="fw-bold">{{ $kpi->group_name }}</td>
                                            @php
                                                $mappingCount = $kpi->mapping->count();
                                                $memberCount = $member->count();
                                            @endphp
                                            @if ($mappingCount === $memberCount)
                                                <td>- Semua Divisi -</td>
                                                <td>- Semua Jabatan -</td>
                                            @else
                                                @php
                                                    $divisiNames = $kpi->mapping->pluck('divisi.nama_divisi')->unique();
                                                    $jabatanNames = $kpi->mapping->pluck('jabatan')->unique();
                                                @endphp
                                                <td class="text-capitalize">
                                                    @if ($divisiNames->count() === 1)
                                                        {{ $divisiNames->first() }}
                                                    @else
                                                        - Semua Divisi -
                                                    @endif
                                                </td>

                                                <td class="text-capitalize">
                                                    @if ($jabatanNames->count() === 1)
                                                        {{ $jabatanNames->first() }}
                                                    @else
                                                        - Semua Jabatan -
                                                    @endif
                                                </td>
                                            @endif
                                            <td>{{ $kpi->deskripsi }}</td>
                                            <td>
                                                <div class="form-check form-switch"style="width: 0px">
                                                    <input class="form-check-input" type="checkbox" role="switch"
                                                        id="flexSwitchCheckDefault"
                                                        onclick="toggleIsActive({{ $kpi->id }})"
                                                        style="height: 30px; width: 60px"
                                                        {{ $kpi->isActive ? 'checked' : '' }}>
                                                </div>
                                            </td>
                                            @if (auth()->user()->role->role == 'admin')
                                                <td>
                                                    <div class="d-flex flex-column">
                                                        <a href="{{ route('kpi.edit', $kpi->id) }}"
                                                            class="btn btn-success btn-sm mb-4"><i
                                                                class="fa-solid fa-pen-to-square me-2"></i>Edit</a>
                                                        <a href="{{ route('kpi.hapus', $kpi->id) }}"
                                                            class="btn btn-danger btn-sm"><i
                                                                class="fa-solid fa-trash"></i>Delete</a>
                                                    </div>
                                                </td>
                                            @endif
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function toggleIsActive(kpiId) {
            $.ajax({
                url: '{{ route('api.goals.toggleIsActive') }}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    kpiId: kpiId
                },
                success: function(response) {
                    // Berhasil mengubah status isActive
                    alert(response.message);
                    console.log(response.success);
                },
                error: function(xhr) {
                    // Gagal mengubah status isActive
                    console.log(xhr.responseText);
                }
            });
        }

        $(document).ready(function() {
            $('#filterKPI').change(function() {
                applyFilters();
            });

            $('#searchDescription').on('input', function() {
                applyFilters();
            });

            $('#searchPosition').on('input', function() {
                applyFilters();
            });

            $('#searchDivision').on('input', function() {
                applyFilters();
            });

            $('#searchName').on('input', function() {
                applyFilters();
            });

            $('#searchNo').on('input', function() {
                applyFilters();
            });
        });

        function applyFilters() {
            var selectedValue = $('#filterKPI').val().toLowerCase();
            var descriptionFilter = $('#searchDescription').val().toLowerCase();
            var positionFilter = $('#searchPosition').val().toLowerCase();
            var divisionFilter = $('#searchDivision').val().toLowerCase();
            var nameFilter = $('#searchName').val().toLowerCase();
            var noFilter = $('#searchNo').val().toLowerCase();

            $('.kpi-row').hide().filter(function() {
                var isActive = $(this).find('.form-check-input').is(':checked');
                var description = $(this).find('td:eq(4)').text().toLowerCase();
                var position = $(this).find('td:eq(3)').text().toLowerCase();
                var division = $(this).find('td:eq(2)').text().toLowerCase();
                var name = $(this).find('td:eq(1)').text().toLowerCase();
                var no = $(this).find('td:eq(0)').text().toLowerCase();

                var matchesFilterKPI = selectedValue === 'all' || (selectedValue === 'active' && isActive) || (
                    selectedValue === 'non-active' && !isActive);
                var matchesDescriptionFilter = description.includes(descriptionFilter);
                var matchesPositionFilter = position.includes(positionFilter);
                var matchesDivisionFilter = division.includes(divisionFilter);
                var matchesNameFilter = name.includes(nameFilter);
                var matchesNoFilter = no.includes(noFilter);

                return matchesFilterKPI && matchesDescriptionFilter && matchesPositionFilter &&
                    matchesDivisionFilter && matchesNameFilter && matchesNoFilter;
            }).show();
        }
    </script>

@endsection
