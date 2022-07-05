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
                            <th>Kelas</th>
                            <th>Mata Pelajaran</th>
                            <th>Jumlah Siswa</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($kelas as $all)
                            <tr>
                                <td>{{ $all->kelas }}</td>
                                <td>{{ $all->mapel }}</td>
                                <td>
                                    @foreach ($jmlsiswa as $js)
                                        @if ($js->k_enrol === $all->k_enrol)
                                            <a href="detail/siswa/{{ $js->k_enrol }}">{{ $js->jumlah }}</a>
                                        @else
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    {{-- <a data-bs-toggle="modal" data-bs-target="#modalDetail{{ $all->id_trx_kelas }}"><span
                                            class="badge bg-gradient-deepblue rounded-pill">Detail</span></a> --}}
                                    <a data-bs-toggle="modal" data-bs-target="#modalEdit{{ $all->id_trx_kelas }}"><span
                                            class="badge bg-gradient-quepal rounded-pill">Edit</span></a>
                                    <a data-bs-toggle="modal" data-bs-target="#modalHapus{{ $all->id_trx_kelas }}"><span
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
                                <h5 class="mb-0 text-primary">Tambah Kelas</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="/upload/kelas" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">ID Anda</label>
                                    <input type="text" class="form-control" name="id_guru" id="inputAddress"
                                        value="{{ auth()->user()->id_guru }}" disabled>
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Kode Enrol Kelas</label>
                                    <input type="text" class="form-control" name="k_enrol" id="inputAddress">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputFirstName" class="form-label">Kelas</label>
                                    {{-- <select id="jeniskelamin" name="id_kls" class="form-select">
                                        <option selected>Pilih...</option>
                                        @foreach ($kls as $k)
                                            <option value="{{ $k->id_kelas }}">{{ $k->nama_kelas }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" name="kelas" class="form-control" id="inputFirstName">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Mata Pelajaran</label>
                                    {{-- <select id="jeniskelamin" name="id_kls" class="form-select">
                                        <option selected>Pilih...</option>
                                        @foreach ($mpl as $m)
                                            <option value="{{ $m->id_mapel }}">{{ $m->nama_mapel }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                    <input type="text" name="mapel" class="form-control" id="inputFirstName">
                                </div>
                                <div class="col-md-6">
                                    <label for="inputLastName" class="form-label">Format Data Siswa</label><br>
                                    <a href="{{ url('') }}/contoh_siswa.xlsx">Template</a>
                                </div>
                                <div class="col-12">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Upload Data Siswa</label>
                                        <input class="form-control" type="file" id="formFile" name="excel_siswa">
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
    @foreach ($kelas as $all)
        <div class="modal fade" id="modalEdit{{ $all->id_trx_kelas }}" tabindex="-1" aria-hidden="true">
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
                                    <h5 class="mb-0 text-primary">Edit Kelas</h5>
                                </div>
                                <hr>
                                <form class="row g-3" action="/edit/kelas/{{ $all->id_trx_kelas }}" method="POST"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="col-md-6">
                                        <label for="inputFirstName" class="form-label">Kelas</label>
                                        <input type="text" name="kelas" class="form-control" id="inputFirstName"
                                            value="{{ $all->kelas }}">
                                        <input type="hidden" name="id_trx_kelas" class="form-control"
                                            id="inputFirstName" value="{{ $all->kelas }}">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">Mata Pelajaran</label>
                                        <input type="text" name="mapel" class="form-control" id="inputFirstName"
                                            value="{{ $all->mapel }}">
                                    </div>
                                    {{-- <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">File Data </label><br>
                                        <a href="{{ url('') }}/contoh_siswa.xlsx">Template</a>
                                    </div> --}}
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="formFile" class="form-label">Upload Data Siswa</label>
                                            <input class="form-control" type="file" id="formFile"
                                                name="excel_siswa">
                                            <a href="{{ url('') }}/datasiswa/export/{{ $all->k_enrol }}">Eksport
                                                Data Siswa</a>
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
    @foreach ($kelas as $all)
        <div class="modal fade" id="modalDetail{{ $all->id_trx_kelas }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-12 col-lg-8">aaaa</div>
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
    @foreach ($kelas as $all)
        <div class="modal fade" id="modalHapus{{ $all->id_trx_kelas }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">Apakah Anda yakin menghapus data?</div>
                    <div class="modal-footer">
                        <form class="row g-3" action="/hapus/kelas/{{ $all->id_trx_kelas }}" method="POST"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-6">

                                <input type="hidden" name="kelas" class="form-control" id="inputFirstName"
                                    value="{{ $all->kelas }}">
                                <input type="hidden" name="id_trx_kelas" class="form-control" id="inputFirstName"
                                    value="{{ $all->kelas }}">
                            </div>
                            <div class="col-md-6">

                                <input type="hidden" name="mapel" class="form-control" id="inputFirstName"
                                    value="{{ $all->mapel }}">
                            </div>
                            {{-- <div class="col-md-6">
                                        <label for="inputLastName" class="form-label">File Data </label><br>
                                        <a href="{{ url('') }}/contoh_siswa.xlsx">Template</a>
                                    </div> --}}
                            <div class="col-12">
                                <button type="submit" class="btn btn-primary ">Ok!</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
    @endforeach
    {{-- End Modal Hapus --}}
@stop
