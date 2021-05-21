@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title display-4 text-bold">LIST NOMINATIF - {{$agenda->layanan->layanan}} - No Usul : {{$agenda->no_usul}} - Jumlah {{$agenda->jumlah_nominatif}}</div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <form action="{{route('agenda.nominatif.search', ['agenda'=> $agenda->id])}}" class="form-inline" method="GET">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-sm rounded-0" placeholder="Masukkan NIP Pegawai" name="search" value="{{$search ?? ''}}">
                                </div>
                                <button type="submit" class="btn btn-sm btn-primary rounded-0">Cari</button>
                            </form>
                        </div>

                        @isset($pegawai)
                            @if (count($pegawai) == 0)
                                <div class="col-lg-8">
                                    <h5 class="text-center">Maaf, Nip Pegawai Tidak Ditemukan...</h5>
                                </div>
                            @else

                            <div class="col-lg-8">
                                <form  class="form-horizontal" action="{{route('agenda.nominatif.store', ['agenda'=> $agenda->id])}}" method="POST">
                                    @csrf
                                    @foreach ($pegawai as $p)
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="hidden" name="pegawai_id" value="{{$p->id}}" readonly>
                                                <input type="text" class="form-control form-control-sm rounded-0" value="{{$p->nip}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm rounded-0" value="{{$p->nama}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm rounded-0" value="{{$p->pangkat}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm rounded-0" value="{{$p->jabatan}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col">
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-sm rounded-0" value="{{$p->instansi}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-info rounded-0 text-bold" style="width: 100%">Tambah Nominatif</button>
                                    @endforeach
                                </form>
                            </div>
                        @endif
                    @endisset
                    </div>
                </div>
            </div>
            {{-- tabel daftar nominatif --}}
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <div class="card-title display-4 text-bold">DAFTAR LIST NOMINATIF</div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th style="width: 30px">No</th>
                                <th>NIP</th>
                                <th>Nama</th>
                                <th>Pangkat</th>
                                <th>Jabatan</th>
                                <th>Instansi</th>
                                <th style="width: 50px"></th>
                                {{-- <th></th> --}}
                                {{-- <th></th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($nominatif as $n)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$n->pegawai->nip}}</td>
                                <td>{{$n->pegawai->nama}}</td>
                                <td>{{$n->pegawai->pangkat}}</td>
                                <td>{{$n->pegawai->jabatan}}</td>
                                <td>{{$n->pegawai->instansi}}</td>
                                <td>
                                    <div class="btn-group">
                                        <form action="{{route('agenda.nominatif.destroy', ['nominatif'=>$n->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach


                        </tbody>
                        </table>
                    </div>
                    <form action="{{route('agenda.nominatif.usulan.store', ['agenda'=>$agenda->id])}}" method="POST">
                        @csrf
                        @foreach ($nominatif as $nom)
                        <input type="hidden" name="no_usul[]" value="{{$nom->agenda->no_usul}}">
                        <input type="hidden" name="dokumen_usul[]" value="{{$nom->agenda->dokumen_pengantar}}">
                        <input type="hidden" name="pegawai_nip[]" value="{{$nom->pegawai->nip}}">
                        <input type="hidden" name="layanan_id[]" value="{{$nom->agenda->layanan->id}}">
                        @endforeach
                        <button type="submit" class="btn btn-sm btn-info" style="width: 100%" title="Kirim Usulan" {{count($nominatif) != $agenda->jumlah_nominatif ? 'disabled' : ''}} >KIRIM USULAN</button>
                    </form>
            </div>
        </div>
    </div>
@endsection
