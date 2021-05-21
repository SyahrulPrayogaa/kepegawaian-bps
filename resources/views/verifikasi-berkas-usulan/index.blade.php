@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <ul class="nav nav-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#berkas-usulan" data-toggle="tab">Daftar Berkas Usulan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berkas-verifikasi" data-toggle="tab">Berkas Telah Diverifikasi</a></li>
                    <li class="nav-item"><a class="nav-link" href="#berkas-ditolak" data-toggle="tab">Berkas Ditolak</a></li>
                </ul>

                <div class="card-body">
                    <div class="tab-content">

                        <div class="tab-pane active" id="berkas-usulan">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>No Usul</td>
                                            <td>NIP</td>
                                            <td>Nama Pegawai</td>
                                            <td>Layanan</td>
                                            <td>Status</td>
                                            <td>Pengusul</td>
                                            <td style="widtd: 20px"></td>
                                            <td></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usulan as $us)
                                            <tr>
                                                <td>
                                                    <a href="{{route('verifikasi.show',['usulan'=>$us->id])}}" title="Daftar Dokumen {{$us->pegawai->nama}}" class="btn-show" ><i class="fas fa-folder-open text-warning"></i></a>
                                                </td>
                                                <td>{{$us->no_usul}}</td>
                                                <td>{{$us->pegawai->nip}}</td>
                                                <td>{{$us->pegawai->nama}}</td>
                                                <td>{{$us->layanan->layanan}}</td>
                                                <td>{{$us->status}}</td>
                                                <td>{{$us->pengusul}}</td>
                                                <td>
                                                    <form action="{{route('verifikasi.setuju', ['usulan'=>$us->id])}}" method="post">
                                                        @method('PATCH')
                                                        @csrf
                                                        <button type="submit" class="btn btn-sm btn-success" title="Verifikasi"><i class="fas fa-check-circle"></i></button>
                                                    </form>
                                                </td>
                                                <td>
                                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="modal" data-target="#preview-{{$us->id}}"><i class="fas fa-times-circle" title="Tolak"></i></button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="berkas-verifikasi">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>No Usul</td>
                                            <td>NIP</td>
                                            <td>Nama Pegawai</td>
                                            <td>Layanan</td>
                                            <td>Status</td>
                                            <td>Pengusul</td>
                                            <td>Verifikator</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($acc as $a)
                                            <tr>
                                                <td>
                                                    <a href="{{route('verifikasi.show',['usulan'=>$a->id])}}" title="Daftar Dokumen {{$a->pegawai->nama}}" class="btn-show" ><i class="fas fa-folder-open text-warning"></i></a>
                                                </td>
                                                <td>{{$a->no_usul}}</td>
                                                <td>{{$a->pegawai->nip}}</td>
                                                <td>{{$a->pegawai->nama}}</td>
                                                <td>{{$a->layanan->layanan}}</td>
                                                <td>{{$a->status}}</td>
                                                <td>{{$a->pengusul}}</td>
                                                <td>{{$a->verifikator}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="berkas-ditolak">
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <thead>
                                        <tr>
                                            <td></td>
                                            <td>No Usul</td>
                                            <td>NIP</td>
                                            <td>Nama Pegawai</td>
                                            <td>Layanan</td>
                                            <td>Status</td>
                                            <td>Pengusul</td>
                                            <td>Verifikator</td>
                                            <td>Keterangan</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($tolak as $tol)
                                            <tr>
                                                <td>
                                                    <a href="{{route('verifikasi.show',['usulan'=>$tol->id])}}" title="Daftar Dokumen {{$tol->pegawai->nama}}" class="btn-show" ><i class="fas fa-folder-open text-warning"></i></a>
                                                </td>
                                                <td>{{$tol->no_usul}}</td>
                                                <td>{{$tol->pegawai->nip}}</td>
                                                <td>{{$tol->pegawai->nama}}</td>
                                                <td>{{$tol->layanan->layanan}}</td>
                                                <td>{{$tol->status}}</td>
                                                <td>{{$tol->pengusul}}</td>
                                                <td>{{$tol->verifikator}}</td>
                                                <td>{{$tol->keterangan}}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal ditolak -->
    @foreach ($usulan as $data)
    <div class="modal fade" id="preview-{{$data->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{route('verifikasi.tolak', ['usulan'=>$data->id])}}" method="post">
                @method('PATCH')
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">{{$data->pegawai->nama}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="keterangan">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </div>
            </form>
        </div>
        </div>
    </div>
    @endforeach


    {{-- Experiment AJAX --}}

<!-- Modal -->
@include('layouts._ajaxModal')

@endsection

@push('custom-js')
<script src="{{asset('js/modalAjax.js')}}"></script>
@endpush

