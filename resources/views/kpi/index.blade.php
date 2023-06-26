@extends('layout.body')
@section('title', 'Data Employee')
@section('content')


    <div class="container">
        <div class="d-flex flex-row">
            <h4 class="fw-bold mb-3">Data Employee</h4>
        </div>
        @if ($new->isNotEmpty())
            <div class="alert alert-warning">
                Ada Employee Baru ! <br>Silahkan isi Jabatannya Untuk Memberinya Tugas !
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="table-responsive">

                                <table class="table mt-4 " style="outline: 2px">
                                    <thead class="table-secondary">
                                        <tr>
                                            <th>NO.</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Divisi</th>
                                            <th>Jabatan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($member->isEmpty())
                                            <tr>
                                                <td colspan="6">
                                                    <p class="text-center h1">Belum Ada Employee</p>
                                                </td>
                                            </tr>
                                        @else
                                            @foreach ($member as $m)
                                                <tr>
                                                    <td scope="row">{{ $loop->iteration }}</td>
                                                    <td>{{ $m->nama }}</td>
                                                    <td>{{ $m->nik }}</td>
                                                    <td class="text-capitalize">{{ $m->divisi->nama_divisi }}</td>
                                                    <td class="text-capitalize">{{ $m->jabatan }}</td>
                                                    <td>
                                                        <a href="" class="btn" data-bs-toggle="dropdown">
                                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.edit', $m->id) }}"><i
                                                                        class="fa-solid fa-clipboard-check fa-lg"></i>Edit
                                                                    Data</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.show', $m->id) }}"><i
                                                                        class="fa-solid fa-eye"></i>Show Data</a></li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.hapus', $m->id) }}"><i
                                                                        class="fa-solid fa-trash fa-lg"></i>Delete Data</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('employee.show', $m->id) }}"><i
                                                                        class="fa-solid fa-star fa-lg"></i>Lihat Nilai</a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>


            <!-- Divisi -->
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-primary mt-4" data-bs-toggle="modal" data-bs-target="#addDivisi">Tambah
                            Divisi</button>
                        <table class="table mt-4" style="outline: 2px;">
                            <thead class="table-secondary">
                                <th>NO.</th>
                                <th>Nama Divisi</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @foreach ($divisi as $d)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $d->nama_divisi }}</td>
                                        <td>
                                            <a href="{{ route('divisi.hapus', $d->id) }}" class="btn btn-danger"><i
                                                    class="fas fa-trash"></i></a>
                                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editDivisi_{{$d->id}}"><i
                                                    class="fas fa-pencil"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>

      <!-- Modal -->
      @foreach($divisi as $dm)
      <div class="modal fade" id="editDivisi_{{$dm->id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
            <div class="modal-header" style="background-color: #4154f1">
              <h5 class="modal-title text-white fw-bold" id="staticBackdropLabel">Edit Divisi</h5>
            </div>
            <form action="{{route('divisi.update', $dm->id)}}" class="edit-form" method="post">
                @csrf
                @method('PUT')
                <div class="modal-body">
                  <label for="edit_nama">Nama Divisi</label>
                  <input type="text" name="edit_nama" id="edit_nama" class="form-control" value="{{$dm->nama_divisi}}">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
      @endforeach

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function show(event) {
            event.preventDefault();
            var url = $(event.target).attr('href');
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
                success: function(data){
                    var div = data.divisiF;
                    // console.log(div);
                    //divisi
                    // $('.edit-form').attr('action', `https://127.0.0.1:8000/employee/`+div.id);
                    $('#edit-nama_'+div.id).val(div.nama_divisi);
                    $('#editDivisi_'+div.id).modal('show');
                },
                error: function(xhr){
                    console.log(xhr.responseText);
                }
            });
        }
    </script> -->
@endsection
