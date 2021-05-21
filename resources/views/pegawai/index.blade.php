@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Daftar Pegawai</h3>
                    <a href="{{route('pegawai.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Pegawai</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">NIP</th>
                                    <th scope="col">Tempat, Tanggal Lahir</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Instansi</th>
                                    <th scope="col">Satuan Kerja</th>
                                    <th scope="col">Jabatan</th>
                                    <th scope="col">Pangkat/gol</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pegawai as $peg)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$peg->nama}}</td>
                                    <td>{{$peg->nip}}</td>
                                    <td>{{$peg->tmp_lahir}}, {{$peg->tgl_lahir}}</td>
                                    <td>{{$peg->jk == 'L' ? 'Laki-Laki' : 'Perempuan'}}</td>
                                    <td>{{$peg->instansi}}</td>
                                    <td>{{$peg->satker->nama}}</td>
                                    <td>{{$peg->jabatan}}</td>
                                    <td>{{$peg->pangkat}}</td>
                                    <td>
                                        <a href="{{route('pegawai.edit',['pegawai'=>$peg->id])}}" class="btn btn-sm btn-info mb-2" title="Edit"><i class="fas fa-pen-square"></i></a>
                                        <form action="{{route('pegawai.destroy',['pegawai'=>$peg->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
