@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Agenda</div>
                </div>
                <div class="card-body">
                    <form action="{{route('agenda.update', ['agenda'=>$agenda->id])}}" class="form-horizontal" method="POST" enctype="multipart/form-data">
                        @method('PATCH')
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-3">
                                    <label for="NoUsul">No Usul / No Surat</label>
                                    <input type="text" class="form-control form-control-sm" id="noUsul" name="no_usul" placeholder="No Usul / No Surat" value="{{$agenda->no_usul}}">
                                </div>
                                <div class="col-md-3">
                                    <label for="dokumenPengantar">Dokumen Pengantar</label>
                                    <input type="file" class="form-control form-control-sm" id="dokumen_pengantar"  name="dokumen_pengantar" accept=".pdf">
                                </div>
                                <div class="col-md-3">
                                    <label for="layanan">Pilih Layanan</label>
                                    <select name="layanan" class="form-control form-control-sm ">
                                        <option value="0" selected disabled>Pilih Layanan</option>
                                        <option value="1" {{$agenda->layanan_id == '1' ? 'selected' : ''}}>KARIS</option>
                                        <option value="2" {{$agenda->layanan_id == '2' ? 'selected' : ''}}>KARPEG</option>
                                        <option value="3" {{$agenda->layanan_id == '3' ? 'selected' : ''}}>KARSU</option>
                                        <option value="4" {{$agenda->layanan_id == '4' ? 'selected' : ''}}>KENAIKAN PANGKAT</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <label for="jumlahNominatif">Jumlah Nominatif</label>
                                    <input type="number" class="form-control form-control-sm" id="jumlahNominatif" name="jumlah_nominatif" placeholder="Jumlah Nominatif" value="{{$agenda->jumlah_nominatif}}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-primary" style="width: 100%"><i class="fas fa-save"></i> Edit Agenda</button>
                    </form>
                </div>

                    <div class="card-header">
                        <div class="card-title">Dokumen Pengantar</div>
                    </div>
                    <div class="card-body">
                        <embed src="{{$agenda->dokumen_pengantar}}" type="application/pdf" width="100%" height="500px">
                    </div>
            </div>
        </div>
    </div>
@endsection
