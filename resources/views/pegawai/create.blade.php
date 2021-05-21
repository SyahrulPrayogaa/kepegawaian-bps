@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Tambah Pegawai</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('pegawai.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 form-check-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="{{old('nama')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 form-check-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" value="{{old('nip')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                        <label for="tempatLahir" class="col-sm-3 form-check-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir" name="tmp_lahir" value="{{old('tmp_lahir')}}">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="tanggalLahir" class="col-sm-3 form-check-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{old('tgl_lahir')}}">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 form-check-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" value="L" id="laki_laki" {{old('jk') == 'L' ? 'checked' : ''}}>
                                    <label for="laki_laki" class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" value="P" id="perempuan" {{old('jk') == 'P' ? 'checked' : ''}}>
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="instansi" class="col-sm-3 form-check-label">Instansi</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="instansi">
                                    <option value="0" selected disabled>--Instansi--</option>
                                    <option value="Badan Pusat Statistik" {{old('instansi') == 'Badan Pusat Statistik' ? 'selected' : ''}}>Badan Pusat Statistik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satker" class="col-sm-3 form-check-label">Satuan Kerja</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="satker_id">
                                    <option value="0" selected disabled>--Satuan Kerja--</option>
                                    <option value="1" {{old('satker_id') == '1' ? 'selected' : ''}}>Provinsi Gorontalo</option>
                                    <option value="2" {{old('satker_id') == '2' ? 'selected' : ''}}>Kota Gorontalo</option>
                                    <option value="3" {{old('satker_id') == '3' ? 'selected' : ''}}>Kab. Gorontalo</option>
                                    <option value="4" {{old('satker_id') == '4' ? 'selected' : ''}}>Kab. Boalemo</option>
                                    <option value="5" {{old('satker_id') == '5' ? 'selected' : ''}}>Kab. Pohuwato</option>
                                    <option value="6" {{old('satker_id') == '6' ? 'selected' : ''}}>Kab. Bone Bolango</option>
                                    <option value="7" {{old('satker_id') == '7' ? 'selected' : ''}}>Kab. Gorontalo Utara</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 form-check-label">Jabatan</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" value="{{old('jabatan')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-sm-3 form-check-label">Pangkat/Golongan</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="pangkat" placeholder="Pangkat/Golongan" name="pangkat" value="{{old('pangkat')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
