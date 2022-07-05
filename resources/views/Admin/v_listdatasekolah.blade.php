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
            {{-- <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Recent Orders</h6>
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
                            <th>Nama Lengkap</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach ($admin as $all)
                            <tr>
                                <td>{{ $all->name }}</td>
                                <td>{{ $all->email }}</td>
                                <td><a data-bs-toggle="modal" data-bs-target="#modalDetail{{ $all->id }}"><span
                                            class="badge bg-gradient-deepblue rounded-pill">Detail</span></a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalEdit{{ $all->id }}"><span
                                            class="badge bg-gradient-quepal rounded-pill">Edit</span></a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalHapus{{ $all->id }}"><span
                                            class="badge bg-gradient-ibiza rounded-pill">Hapus</span></a>
                                </td>
                            </tr>
                        @endforeach --}}
            {{-- </tbody>
                </table>
            </div> --}}
            @if (count($sklh) != 0)
                @foreach ($sklh as $s)
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Data Sekolah</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="/update/datasekolah/{{ $s->id_data_sklh }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Nama Sekolah</label>
                                    <input id="nama_sklh" type="text" class="form-control" name="nama_sklh"
                                        value="{{ $s->nama_sklh }}" required autocomplete="nama_sklh">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="almt_sklh" id="almt_sklh" placeholder="Alamat Sekolah..." rows="3">{{ $s->almt_sklh }}</textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Nama Aplikasi</label>
                                    <input id="nama_app_sklh" name="nama_app_sklh" type="text" class="form-control"
                                        required autocomplete="nama_app_sklh" value="{{ $s->nama_app_sklh }}">
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="foto_sklh" class="form-label">Logo Sekolah</label>
                                        <input class="form-control" type="file" name="foto_sklh" id="foto_sklh"
                                            value={{ $s->foto_sklh }}><a
                                            href="/foto_sklh/{{ $s->foto_sklh }}">{{ $s->foto_sklh }}</a>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    {{-- <a data-bs-toggle="modal" data-bs-target="#modalHapus{{ $s->id_data_sklh }}"><span
                                            class="btn btn-danger">Hapus</span></a> --}}
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">Data Sekolah</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="/upload/sekolah" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Nama Sekolah</label>
                                <input id="nama_sklh" type="text" class="form-control" name="nama_sklh" value=""
                                    required autocomplete="nama_sklh">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Alamat</label>
                                <textarea class="form-control" name="almt_sklh" id="almt_sklh" placeholder="Alamat Sekolah..." rows="3"></textarea>
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Nama Aplikasi</label>
                                <input id="nama_app_sklh" type="text" class="form-control" required
                                    autocomplete="nama_app_sklh" name="nama_app_sklh">
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="foto_sklh" class="form-label">Logo Sekolah</label>
                                    <input class="form-control" type="file" name="foto_sklh" id="foto_sklh">
                                </div>
                                <button type="submit" class="btn btn-success">Tambah</button>
                                <button type="reset" class="btn btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
@section('modal')
    <!-- Modal Tambah-->
    <div class="modal fade" id="modalTambah" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-user me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">Data Sekolah</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="/upload/datasekolah" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Nama Sekolah</label>
                                    <input id="nama_sklh" type="text"
                                        class="form-control @error('nama_sklh') is-invalid @enderror" name="nama_sklh"
                                        value="{{ old('nama_sklh') }}" required autocomplete="nama_sklh">

                                    @error('nama_sklh')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Alamat</label>
                                    <textarea class="form-control" name="almt_sklh" id="almt_sklh" placeholder="Alamat Sekolah..." rows="3"></textarea>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Nama Aplikasi</label>
                                    <input id="nama_app_sklh" type="text"
                                        class="form-control @error('nama_app_sklh') is-invalid @enderror"
                                        name="nama_app_sklh" value="{{ old('nama_app_sklh') }}" required
                                        autocomplete="nama_app_sklh">

                                    @error('nama_app_sklh')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="foto_sklh" class="form-label">Logo Sekolah</label>
                                        <input class="form-control" type="file" name="foto_sklh" id="foto_sklh">
                                    </div>
                                    <button type="submit" class="btn btn-primary ">Simpan</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    {{-- End Modal Tambah --}}
@stop
