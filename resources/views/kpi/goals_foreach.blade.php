<div class="table-responsive-lg" id="div_tasks">
    <table class="table mt-3 " style="outline: 2px" id="tabel_tasks">
        <thead class="table-secondary table-responsive">
            <tr style="text-align: start">
                <th>Goal ID</th>
                <th>Goal Name</th>
                <th>Goal Owner</th>
                <th>To</th>
                <th>Goal Progress</th>
                <th>Status</th>
                <th>Grade</th>
                <th></th>
            </tr>
        </thead>
        {{-- sort employee --}}

        <tbody>
            @foreach ($task as $t)
                <tr class="main-row">
                    <td scope="row">
                        <button data-bs-toggle="collapse" data-bs-target="#flush-collapse{{ $t->id }}"
                            id="button_collapse"><i class="fa-solid fa-chevron-right me-3" aria-expanded="true"></i>
                        </button> {{ $t->goal_id }}
                    </td>
                    <td class="fw-bold" id="kpi_groupname">{{ $t->kpi->group_name }} <span style="font-weight: normal">
                            <p id="range_tanggal">{{ date('d F Y', strtotime($t->created_at)) }} -
                                {{ date('d F Y', strtotime($t->tanggal_target)) }}</p>
                        </span></td>
                    <td id="owner">{{ $t->owner->nama }}</td>
                    <td id="member">{{ $t->member->nama }}</td>
                    {{-- tipe progress --}}
                    @if ($t->tipe_progress->nama_tipe == 'idr')
                        <td>{{ $t->goal_progress }} / Rp. {{ number_format($t->goal_target) }}
                            <div class="progress">
                                @if ($t->status == 'todo')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                                @if ($t->status == 'doing')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                                @if ($t->status == 'checking')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif


                                @if ($t->status == 'done')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                            </div>
                        </td>
                    @elseif ($t->tipe_progress->nama_tipe == 'persentase')
                        <td>{{ $t->goal_progress }}% / {{ $t->goal_target }}% <div class="progress">
                                @if ($t->status == 'todo')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                                @if ($t->status == 'doing')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                                @if ($t->status == 'checking')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif

                                @if ($t->status == 'done')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                            </div>
                        </td>
                    @elseif ($t->tipe_progress->nama_tipe == 'nominal')
                        <td>{{ $t->goal_progress }} / {{ number_format($t->goal_target) }} <div class="progress">
                                @if ($t->status == 'todo')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-secondary"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                                @if ($t->status == 'doing')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-primary"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                                @if ($t->status == 'checking')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-warning"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif

                                @if ($t->status == 'done')
                                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success"
                                        style="width:{{ ($t->goal_progress / $t->goal_target) * 100 }}%">
                                    </div>
                                @endif
                            </div>
                        </td>
                    @endif
                    {{-- status --}}
                    @if ($t->status == 'todo')
                        <td class="text-capitalize">{{ $t->status }}</td>
                    @elseif ($t->status == 'doing')
                        <td class="text-capitalize text-primary">{{ $t->status }}</td>
                    @elseif ($t->status == 'checking')
                        <td class="text-capitalize text-warning">{{ $t->status }}</td>
                    @elseif ($t->status == 'done')
                        <td class="text-capitalize text-success">{{ $t->status }}</td>
                    @endif
                    @if ($t->grade == null)
                        <td>-</td>
                    @else
                        <td>{{ $t->grade }}</td>
                    @endif
                    <td>
                        <a href="" class="btn" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-ellipsis-vertical"></i>
                        </a>
                        <ul class="dropdown-menu">
                            @if ($t->status != 'done')
                                <form action="{{ route('goals.update_adm') }}" method="GET">
                                    @csrf
                                    <input type="hidden" value="{{ $t->id }}" name="task_id">
                                    <input type="hidden" name="mark" value="done">
                                    <li><button type="submit" class="dropdown-item"><i
                                                class="fa-solid fa-clipboard-check fa-lg"></i>Mark
                                            as
                                            done</button>
                                    </li>
                                </form>
                            @endif
                            @if ($t->status == 'done')
                                <form action="{{ route('goals.view_prog') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="task_id" value="{{ $t->id }}">
                                    <li><button class="dropdown-item" type="submit"><i
                                                class="fa-solid fa-star fa-lg"></i>Beri
                                            Nilai</button></li>
                                </form>
                            @endif
                            <li>
                                {{-- <button class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#hapustugas_{{ $t->id }}"><i
                                        class="fa-solid fa-trash fa-lg"></i>Hapus
                                    Tugas</button> --}}
                                <form action="{{ route('goals.update_adm') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="delete" value="delete">
                                    <input type="hidden" name="task_id" value="{{ $t->id }}">
                                    <button type="submit" class="dropdown-item"><i
                                            class="fa-solid fa-trash fa-lg"></i>Hapus
                                        Tugas</button>
                                </form>
                            </li>
                        </ul>
                    </td>
                </tr>
                <tr id="flush-collapse{{ $t->id }}" class="accordion-collapse collapse"
                    data-bs-parent="#accordionFlushExample">
                    <td colspan="8 bg-light">
                        <div class="row p-3 justify-content-center">
                            <!-- kanan -->
                            <div class="col-8">
                                <div class="row p-3">
                                    <div class="col-12 text-center text-capitalize fw-bold mb-3">
                                        List Progress
                                    </div>
                                    @if ($progress->isEmpty())
                                        <div class="col text-center text-capitalize">
                                            - Belum ada progress -
                                        </div>
                                    @else
                                        <div class="col text-start text-capitalize">
                                            <div class="d-flex flex-column">
                                                <div class="content list-progress">
                                                    @foreach ($progress->where('tasks_id', $t->id) as $p)
                                                        <div class="row my-2 align-items-center">
                                                            <div class="col-lg col-12">
                                                                <div class="fw-bold">
                                                                    {{ $p->progress }}</div>
                                                                <div class="status text-muted">
                                                                    {{ $p->keterangan }}</div>
                                                            </div>
                                                            <div class="col-lg-3 col-12">
                                                                <div class=" text-end">
                                                                    {{ $p->created_at->format('d M Y') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                {{-- <tr id="flush-collapseOne{{ $t->id }}" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionFlushExample">
                                    <td class="bg-light">
                                        <div class="card">
                                            <div>
                                                <div class="text-center">
                                                    tabel tasks
                                                </div>
                                                <div>
                                                    goal owner : {{ $t->owner->nama }}
                                                </div>
                                                <div>
                                                    @if ($t->grade == null)
                                                        grade : belum dinilai
                                                    @else
                                                        grade : {{ $t->grade }}
                                                    @endif
                                                </div>
                                                <div>
                                                    goal target : {{ $t->goal_target }}
                                                </div>
                                                <div>
                                                    tipe tugas : {{ $t->tipe_progress->nama_tipe }}
                                                </div>
                                                <div>
                                                    tanggal target : {{ $t->tanggal_target }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center">
                                                    tabel kpi
                                                </div>

                                                <div>
                                                    kpi yang dinilai : {{ $t->kpi->group_name }}
                                                </div>
                                                <div>
                                                    parameter : {{ $t->kpi->parameter }}
                                                </div>
                                                <div>
                                                    weight : {{ $t->kpi->weight }}
                                                </div>

                                            </div>
                                            <div>

                                                <div class="text-center">
                                                    tabel member
                                                </div>
                                                <div>
                                                    jabatan : {{ $t->member->jabatan }}
                                                </div>
                                                <div>
                                                    divisi : {{ $t->member->divisi->nama_divisi }}
                                                </div>
                                            </div>
                                            <div>
                                                <div class="text-center">
                                                    tabel progress
                                                </div>
                                                @foreach ($progress->where('tasks_id', $t->id) as $p)
                                                    <div>
                                                        {{ $p->progress }}
                                                    </div>
                                                    <div>
                                                        {{ $p->keterangan }}
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </td>
                                </tr> --}}

                {{-- modal hapus --}}
                <div class="modal fade" id="hapustugas_{{ $t->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="hapustugas">deleting this?</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                r u sure ?
                            </div>
                            <div class="modal-footer">
                                <form action="{{ route('goals.update_adm') }}" method="GET">
                                    @csrf
                                    <input type="hidden" name="delete" value="delete">
                                    <input type="hidden" name="task_id" value="{{ $t->id }}">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Yes i
                                        do</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </tbody>
    </table>
</div>

<script>
    $(document).ready(function() {
        $('#inputGroupSelect03').on('change', function() {
            findStatus();
        });
    })

    function findStatus() {
        var descriptionFilter = $('#inputGroupSelect03').val().toLowerCase();
        $('.main-row').hide().filter(function() {
            var description = $(this).find('td:eq(5)').text().toLowerCase();
            var matchesDescriptionFilter = description.includes(descriptionFilter);
            return matchesDescriptionFilter;
        }).show();
    }
</script>
