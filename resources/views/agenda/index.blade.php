@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">

            <a href="{{route('agenda.create')}}" class="btn btn-sm btn-primary mb-2" style="width: 100%"><i class="fas fa-plus-circle"></i> Tambah Agenda</a>

            <div class="card card-outline card-primary">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-sm">
                            <thead>
                            <tr>
                                <th style="width: 30px">No</th>
                                <th style="width: 120px">Tanggal</th>
                                <th>No Usul</th>
                                <th>Layanan</th>
                                <th style="width: 325px"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($agenda as $a)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$a->created_at->format('d F Y')}}</td>
                                <td>{{$a->no_usul}}</td>
                                <td>{{$a->layanan->layanan}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('agenda.edit',['agenda'=>$a->id])}}" class="btn btn-sm btn-info mr-2 display-4" title="Edit"><i class="fas fa-pen-square mr-2"></i>Edit</a>
                                        <form action="{{route('agenda.destroy', ['agenda'=>$a->id])}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-danger mr-2" title="Hapus" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash mr-2"></i>Hapus</button>
                                        </form>
                                        <a href="{{route('agenda.nominatif',['agenda'=>$a->id])}}" class="btn btn-sm btn-info" title="Edit"><i class="fas fa-pen-square mr-2"></i>Input Nominatif</a>
                                    </div>
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
