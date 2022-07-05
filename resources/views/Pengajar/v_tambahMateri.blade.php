@extends('layouts.main')
@section('isi')
    <div class="card radius-10">
        <div class="card-body">
            @if (session('pesan'))
                <div class="alert border-0 border-start border-5 border-success alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-success"><i class='bx bxs-check-circle'></i>
                        </div>
                        <div class="ms-3">
                            <strong>{{ session('pesan') }}</strong>.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (session('gagal'))
                <div class="alert border-0 border-start border-5 border-danger alert-dismissible fade show py-2">
                    <div class="d-flex align-items-center">
                        <div class="font-35 text-danger"><i class='bx bxs-message-square-x'></i>
                        </div>
                        <div class="ms-3">
                            <strong>{{ session('hapus') }}</strong>.
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @elseif (count($errors) > 0)
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
            @if (count($cek) != 0)
                @foreach ($cek as $cek)
                    <div class="card border-top border-0 border-4 border-primary">
                        <div class="card-body p-5">
                            <div class="card-title d-flex align-items-center">
                                <div><i class="bx bxs-book-open me-1 font-22 text-primary"></i>
                                </div>
                                <h5 class="mb-0 text-primary">{{ $identitas->kelas }} - {{ $identitas->mapel }}</h5>
                            </div>
                            <hr>
                            <form class="row g-3" action="/update/materi/{{ $cek->id_materi }}" method="POST"
                                enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="col-md-4">
                                    <label for="inputFirstName" class="form-label">Judul/Materi</label>
                                    <input type="text" name="judul" class="form-control" id="inputFirstName"
                                        value="{{ $cek->judul }}">
                                    <input type="hidden" name="k_enrol" value="{{ $identitas->k_enrol }}">
                                </div>
                                <div class="col-md-4">
                                    <label for="inputLastName" class="form-label">Mode</label>
                                    <select id="jeniskelamin" name="mode" class="form-select" required>

                                        <option {{ old('mode', $cek->mode) == 'mudah' ? 'selected' : '' }} value="mudah">
                                            Mudah</option>
                                        <option {{ old('mode', $cek->mode) == 'medium' ? 'selected' : '' }}
                                            value="medium">Medium</option>
                                        <option {{ old('mode', $cek->mode) == 'sulit' ? 'selected' : '' }}
                                            value="sulit">Sulit</option>

                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputLastName" class="form-label">Pewaktu</label>
                                    <input type="datetime-local" name="pewaktu" class="form-control" id="inputFirstName"
                                        value="{{ $cek->pewaktu }}">
                                </div>
                                <div class="col-12">
                                    <label for="inputAddress" class="form-label">Kata Pengantar</label>
                                    <textarea class="form-control" name="kata_pengantar" id="almt_sklh" placeholder="Kata Pengantar..." rows="3">{{ $cek->kata_pengantar }}</textarea>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputFirstName" class="form-label">Kode Soal</label>
                                    <input type="text" name="kode_soal"
                                        class="form-control @error('kode_soal') is-invalid @enderror" name="kode_soal"
                                        value="{{ $cek->kode_soal }}" id="inputFirstName">
                                    @error('kode_soal')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="inputFirstName" class="form-label">Link Materi</label>
                                    {{-- <iframe width="560" src="{{ $cek->link_materi }}" frameborder="0"
                                        allowfullscreen></iframe> --}}
                                    <input type="text" name="link_materi" class="form-control" id="inputFirstName"
                                        value="{{ $cek->link_materi }}"><a href="{{ $cek->link_materi }}">Lihat
                                        Materi</a>
                                </div>
                                <div class="col-md-4">
                                    <label for="inputFirstName" class="form-label">Upload Soal</label><br>
                                    <a class="btn btn-outline-info px-5" href="/detail/soal/{{ $cek->kode_soal }}">Lihat
                                        Soal</a><br>
                                    <a href="{{ url('') }}/soal/export/{{ $cek->kode_soal }}"><i
                                            class='bx bx-download'></i><span> Download Soal</span></a>
                                </div>
                                <div class="col-12">
                                    <div class="mt-0">
                                        <button type="submit" class="btn btn-success">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title d-flex align-items-center">
                            <div><i class="bx bxs-book-open me-1 font-22 text-primary"></i>
                            </div>
                            <h5 class="mb-0 text-primary">{{ $identitas->kelas }} - {{ $identitas->mapel }}</h5>
                        </div>
                        <hr>
                        <form class="row g-3" action="/upload/materi" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Judul/Materi</label>
                                <input type="text" name="judul" class="form-control" id="inputFirstName">
                                <input type="hidden" name="k_enrol" value="{{ $identitas->k_enrol }}">
                            </div>
                            <div class="col-md-4">
                                <label for="inputLastName" class="form-label">Mode</label>
                                <select id="jeniskelamin" name="mode" class="form-select" required>
                                    <option selected>Pilih...</option>
                                    <option value="mudah">Mudah</option>
                                    <option value="medium">Medium</option>
                                    <option value="sulit">Sulit</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="inputLastName" class="form-label">Pewaktu</label>
                                <input type="datetime-local" name="pewaktu" class="form-control" id="inputFirstName">
                            </div>
                            <div class="col-12">
                                <label for="inputAddress" class="form-label">Kata Pengantar</label>
                                <textarea class="form-control" name="kata_pengantar" id="almt_sklh" placeholder="Kata Pengantar..." rows="3"></textarea>
                            </div>
                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Kode Soal</label>
                                <input type="text" name="kode_soal"
                                    class="form-control @error('kode_soal') is-invalid @enderror" name="kode_soal"
                                    value="{{ old('kode_soal') }}" id="inputFirstName">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Link Materi</label>
                                <input type="text" name="link_materi" class="form-control" id="inputFirstName">
                            </div>
                            <div class="col-md-4">
                                <label for="inputFirstName" class="form-label">Upload Soal</label>
                                <input type="file" name="file_soal" class="form-control" id="inputFirstName">
                                <a href="{{ url('') }}/contoh_soal.xlsx"><i class='bx bx-download'></i><span>Format
                                        Contoh Soal</span></a>
                            </div>
                            <div class="col-12">
                                <div class="mt-0">
                                    <button type="submit" class="btn btn-success">Tambah</button>
                                    <button type="reset" class="btn btn-danger">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>
@stop
