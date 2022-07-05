@extends('layouts.main')
@section('isi')
    <div class="card radius-10">
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            @foreach ($errors->all() as $error)
                                <h6 class="mb-0 text-danger">Wahh</h6>
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Data Siswa {{ $identitas->kelas }} {{ $identitas->mapel }}</h6>
                </div>
                <div class="dropdown ms-auto mb-2">
                    <button type="button" class="btn btn-success" data-bs-toggle="modal"
                        data-bs-target="#modalTambah">Tambah</button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>NIS</th>
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($siswa as $all)
                            <tr>
                                <td>{{ $all->nis }}</td>
                                <td>{{ $all->name }}</td>
                                <td>
                                    {{ $all->email }}
                                </td>
                                <td>
                                    {{-- <a data-bs-toggle="modal" data-bs-target="#modalDetail{{ $all->id_trx_kelas }}"><span
                                            class="badge bg-gradient-deepblue rounded-pill">Detail</span></a> --}}
                                    <a data-bs-toggle="modal" data-bs-target="#modalEdit{{ $all->id_siswa }}"><span
                                            class="badge bg-gradient-quepal rounded-pill">Edit</span></a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalHapus{{ $all->id_siswa }}"><span
                                            class="badge bg-gradient-ibiza rounded-pill">Hapus</span></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
