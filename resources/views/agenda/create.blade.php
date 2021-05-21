@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Tambah Agenda</div>
                </div>
                <div class="card-body">
                    <form action="{{route('agenda.store')}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="NoUsul">No Usul / No Surat</label>
                                    <input type="text" class="form-control form-control-sm" id="noUsul" name="no_usul" placeholder="No Usul / No Surat" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="dokumenPengantar">Dokumen Pengantar</label>
                                    <input type="file" class="form-control form-control-sm @error('dokumen') is-invalid @enderror" id="dokumen_pengantar" name="dokumen_pengantar" accept=".pdf">
                                    @error('dokumen')
                                        <div class="text-danger">{{$message}}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3">
                                    <label for="layanan">Pilih Layanan</label>
                                    <select name="layanan" class="form-control form-control-sm" required>
                                        <option value="0" selected disabled>Pilih Layanan</option>
                                        @foreach ($layanan as $l)
                                        <option value="{{$l->id}}">{{$l->layanan}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="jumlahNominatif">Jumlah Nominatif</label>
                                    <input type="number" class="form-control form-control-sm" id="jumlahNominatif" name="jumlah_nominatif" placeholder="Jumlah Nominatif" required>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" style="width: 100%"><i class="fas fa-save"></i> Tambah Agenda</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')

@endsection
