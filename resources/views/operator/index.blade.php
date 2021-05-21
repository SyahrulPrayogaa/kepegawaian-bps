@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header d-flex justify-content-end align-items-center">
                    <h3 class="card-title mr-auto">Daftar Operator</h3>
                    <a href="{{route('operator.create')}}" class="btn btn-sm btn-primary"><i class="fas fa-plus-circle"></i> Tambah Operator</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    {{-- <th scope="col">Nama</th> --}}
                                    <th scope="col">Nama Pegawai</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">level</th>
                                    <th scope="col" style="width: 30px"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $us)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    {{-- <td>{{$us->name}}</td> --}}
                                    <td>{{$us->pegawai->nama}}</td>
                                    <td>{{$us->username}}</td>
                                    <td>{{$us->email}}</td>
                                    <td>{{$us->level}}</td>
                                    <td>
                                        <form action="{{route('operator.reset',['user'=>$us->id])}}" method="POST">
                                            @method('PATCH')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-info mb-2" title="Reset Password" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-key"></i></button>
                                        </form>
                                        <form action="{{route('operator.destroy',['user'=>$us->id])}}" method="POST">
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
