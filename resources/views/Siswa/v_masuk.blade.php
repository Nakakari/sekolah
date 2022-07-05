@extends('layouts.main')
@section('isi')
    <div class="card">
        <div class="card-body">
            <h4 class="mb-0">{{ $materiku->kelas }} - {{ $materiku->mapel }} - {{ $materiku->judul }}</h4>
            <hr />
            <div class="row gy-3">
                <div class="col-md-12">
                    <div class="col">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h6 class="card-title">Kata Pengantar</h6>
                                        <div class="cursor-pointer my-2">
                                            <p>{{ $materiku->kata_pengantar }}</p>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-12">
                    <div class="col">
                        <div class="card">
                            <div class="row g-0">
                                <div class="col-md-12">
                                    <div class="card-body">
                                        <h6 class="card-title">Materi</h6>
                                        <div class="cursor-pointer my-2">
                                            <iframe width="1150" height="315" src="{{ $materiku->link_materi }}"
                                                frameborder="0" allowfullscreen></iframe><br>
                                            <a id="image-uploadify" href="{{ $materiku->link_materi }}"
                                                target=“_blank”>Link Materi</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <button type="button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#modalTambah">Lanjutkan</button>
            </div>
        </div>
    @stop
    @section('js')

    @endsection
