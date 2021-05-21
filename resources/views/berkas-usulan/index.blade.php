@extends('layouts.master')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-outline card-pink">
            <div class="card-header">
                <h3 class="card-title">Berkas Usul</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{route('usulan.search')}}" method="GET">
                    {{-- <div class="form-group row">
                        <label for="filter" class="col-sm-2 col-form-label">Instansi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="instansi">
                                <option value="0" selected disabled>--silahkan pilih--</option>
                                <option value="1">Provinsi Gorontalo</option>
                                <option value="2">Kabupaten Gorontalo</option>
                                <option value="3">Kabupaten Boalemo</option>
                                <option value="4">Kabupaten pohuwato</option>
                                <option value="5">Kabupaten Bone Bolango</option>
                                <option value="6">Kabupaten Gorontalo Utara</option>
                                <option value="7">Kota Gorontalo</option>
                            </select>
                        </div>
                    </div> --}}
                    <div class="form-group row">
                        <label for="filter" class="col-sm-2 col-form-label">Instansi</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="instansi">
                                <option value="0" selected>Badan Pusat Statistik</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                        <div class="col-sm-3 input-group-prepend">
                            <select class="form-control custom-select" name="category" required>
                                <option value="0" selected disabled>--Silahkan Pilih--</option>
                                <option value="1" {{($category ?? '') == 1 ? 'selected' : ''}}>NIP</option>
                                <option value="2" {{($category ?? '') == 2 ? 'selected' : ''}}>Nomor Usul</option>
                                <option value="3" {{($category ?? '') == 3 ? 'selected' : ''}}>Pelayanan</option>
                            </select>
                        </div>
                        <div class="col-sm-7">
                            <input name="search" type="text" class="form-control" id="filter" placeholder="Masukkan Data Pencarian" value="{{$search ?? ''}}" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jenis file" class="col-sm-2 col-form-label">Status</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="semua" value="semua" {{($status ?? '') == 'semua' ? 'checked' : 'checked'}}>
                            <label for="semua" class="form-check-label">Semua</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="acc" value="acc" {{($status ?? '') == 'acc' ? 'checked' : ''}}>
                            <label for="acc" class="form-check-label">Acc</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="on-process" value="on-process" {{($status ?? '') == 'on-process' ? 'checked' : ''}}>
                            <label for="on process" class="form-check-label">On Process</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="status" id="ditolak" value="ditolak" {{($status ?? '') == 'ditolak' ? 'checked' : ''}}>
                            <label for="ditolak" class="form-check-label">Ditolak</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button>
                </form>
            </div>

            @isset($usulan)
                @if (count($usulan) == 0)
                    <h3 class="text-center my-5">Maaf, Hasil Tidak Ditemukan...</h3>
                @else

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th></th>
                            <th>No Usul</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Pelayanan</th>
                            <th>Status</th>
                            <th>Pengusul</th>
                            <th>Verifikator</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usulan as $us)
                        <tr>
                            <td><a href="{{route('verifikasi.show',['usulan'=>$us->id])}}" title="Daftar Dokumen {{$us->pegawai->nama}}" class="btn-show" ><i class="fas fa-folder-open text-warning"></i></a></td>
                            <td>{{$us->no_usul}}</td>
                            <td>{{$us->pegawai->nip}}</td>
                            <td>{{$us->pegawai->nama}}</td>
                            <td>{{$us->layanan->layanan}}</td>
                            <td><span class="badge {{($us->status ?? '') == 'acc' ? 'badge-success' : (($us->status ?? '') == 'ditolak' ? 'badge-danger' : 'badge-warning' )}}">{{$us->status ?? 'n/a'}}</span></td>
                            <td>{{$us->pengusul ?? 'n/a'}}</td>
                            <td>{{$us->verifikator ?? 'n/a'}}</td>
                            <td>{{$us->keterangan ?? 'n/a'}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            @endif
    @include('layouts._ajaxModal')
    @endisset
        </div>
    </div>
    </div>

@endsection

@push('custom-js')
<script src="{{asset('js/modalAjax.js')}}"></script>
@endpush
