@extends('layouts.main')
@section('isi')
    <div class="card radius-10">
        <div class="card-body">
            @if (count($errors) > 0)
                <div class="col-sm-12">
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach
                        </strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                                aria-hidden="true">×</span></button>
                    </div>
                </div>
            @endif
            <div class="d-flex align-items-center">
                <div>
                    <h6 class="mb-0">Data Pengajar</h6>
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
                        @foreach ($pengajar as $all)
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
                        @endforeach
                    </tbody>
                </table>
            </div>
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
                                <h5 class="mb-0 text-primary">Tambah Guru</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="/upload/pengajar" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" id="inputFirstName">
                                    <input type="hidden" name="is_admin" value="2">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Jenis Kelamin</label>
                                    <select id="jeniskelamin" name="jk" class="form-select">
                                        <option selected>Pilih...</option>
                                        @foreach ($jk as $j)
                                            <option value="{{ $j->id_jk }}">{{ $j->nama_jk }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Email</label>
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Address</label>
                                    <textarea class="form-control" name="alamat" id="inputAddress" placeholder="Address..." rows="3"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress" class="form-label">ID Guru</label>
                                    <input id="id_guru" type="id_guru" class="form-control" name="id_guru">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputAddress" class="form-label">Password</label>
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Default file input example</label>
                                        <input class="form-control" type="file" name="foto" id="formFile">
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
    <!-- Modal Edit-->
    @foreach ($pengajar as $all)
        <div class="modal fade" id="modalEdit{{ $all->id }}" tabindex="-1" aria-hidden="true">
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
                                    <h5 class="mb-0 text-primary">Edit Guru</h5>
                                </div>
                                <hr>
                                <form class="row g-3" action="/update/pengajar/{{ $all->id }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Nama Lengkap</label>
                                        <input type="text" name="name" class="form-control" id="inputFirstName"
                                            value="{{ $all->name }}">
                                        <input type="hidden" name="is_admin" value="{{ $all->is_admin }}">
                                        <input type="hidden" name="id" value="{{ $all->id }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Jenis Kelamin</label>
                                        <select id="jeniskelamin" name="jk" class="form-select">
                                            <option selected>Pilih...</option>
                                            @foreach ($jk as $j)
                                                <option value="{{ $j->id_jk }}"
                                                    {{ $j->id_jk == $all->jk ? 'selected' : '' }}>{{ $j->nama_jk }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Email</label>
                                        <input type="email" class="form-control" name="email" id="inputAddress"
                                            placeholder="Email..." value="{{ $all->email }}">
                                    </div>
                                    <div class="col-12">
                                        <label for="inputAddress" class="form-label">Address</label>
                                        <textarea class="form-control" name="alamat" id="inputAddress" placeholder="Address..." rows="3">{{ $all->alamat }}</textarea>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="text" name="id_guru" class="form-control" id="inputPassword"
                                            value="{{ $all->id_guru }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control" id="inputPassword"
                                            value="{{ $all->password }}">
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label for="inputPassword" class="form-label">Foto</label>
                                        <div><img width="150px" src="{{ url('foto_user/' . $all->foto) }}"></div>
                                    </div> --}}

                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Default file input example</label>
                                            <input class="form-control" type="file" name="foto" id="formFile"
                                                value="{{ $all->foto }}"><a
                                                href="/foto_user/{{ $all->foto }}">{{ $all->foto }}</a>
                                        </div>
                                        <button type="submit" class="btn btn-primary ">Simpan</button>
                                        <button type="button" class="btn btn-danger"
                                            data-bs-dismiss="modal">Close</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    {{-- End Modal Edit --}}
    {{-- modalDetail --}}
    @foreach ($pengajar as $row)
        <div class="modal fade" id="modalDetail{{ $row->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Guru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 col-lg-8">

                            <img src="{{ url('foto_user/' . $all->foto) }}" alt="..." width="150px">

                            <div class="card-body">
                                <h6 class="card-title cursor-pointer">{{ $row->name }}</h6>
                                <div class="clearfix">
                                    <p class="mb-0 float-start">{{ $row->email }}</p>
                                    <p class="mb-0 float-end fw-bold"><span>{{ $row->nama_jk }}</span>
                                    </p>
                                </div>
                                <div class="d-flex align-items-center mt-3 fs-6">
                                    <p class="mb-0 float-start">{{ $row->id_guru }}</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- End modalDetail --}}
    {{-- Modal Hapus --}}
    <!-- Modal -->
    @foreach ($pengajar as $all)
        <div class="modal fade" id="modalHapus{{ $all->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">Apakah Anda yakin menghapus data?</div>
                    <div class="modal-footer">
                        <a href="/hapus/admin/{{ $all->id }}" class="btn btn-primary">OK!</a>
                    </div>

                </div>
            </div>
        </div>
    @endforeach
    {{-- End Modal Hapus --}}
@stop
