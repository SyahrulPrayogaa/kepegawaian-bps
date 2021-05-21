@extends('layouts.master')

@section('title', 'Profile')

@section('content-header')
    Profile
@endsection
@section('content')

<!-- Main content -->
<div class="row">
        <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
            <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                    src="{{asset('/img/pegawai.png')}}"
                    alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

            <p class="text-muted text-center">{{$pegawai->jabatan}}</p>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card card-primary card-outline">
        {{-- <div class="card-header">
            <h3 class="card-title">About Me</h3>
        </div> --}}
        <!-- /.card-header -->
        <div class="card-body">
            <strong>NIP</strong>
            <p class="text-muted">{{$pegawai->nip}}</p>

            <hr>

            <strong>Jabatan</strong>
            <p class="text-muted">{{$pegawai->jabatan}}</p>

            <hr>

            <strong>Pangkat/Golongan</strong>
            <p class="text-muted">{{$pegawai->pangkat}}</p>

            <hr>

        </div>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->

        <div class="col-md-9">
        <div class="card">
            {{-- <div class="card-header p-0"> --}}
            <ul class="nav nav-tabs">
                <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                <li class="nav-item"><a class="nav-link" href="#changePassword" data-toggle="tab">Change Password</a></li>
            </ul>
            {{-- </div><!-- /.card-header --> --}}

            <div class="card-body">
            <div class="tab-content">

                <!-- Settings tab-pane -->
                <div class=" active tab-pane" id="settings">
                    <form class="form-horizontal" action="{{route('profile.update')}}" method="POST">
                        @method('PATCH')
                        @csrf
                        <div class="form-group row">
                            <label for="userName" class="col-sm-3 form-check-label">User Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="userName" placeholder="username" value="{{Auth::user()->username}}" readonly>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 form-check-label">Nama Lengkap</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" id="nama" placeholder="Nama Lengkap" name="nama" value="{{old('nama') ?? $pegawai->nama}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nip" class="col-sm-3 form-check-label">NIP</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="nip" placeholder="NIP" name="nip" value="{{old('nip') ?? $pegawai->nip}}">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
                        <label for="email" class="col-sm-3 form-check-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="{{old('email') ?? $pegawai->user->email}}">
                        </div>
                        </div> --}}
                        <div class="form-group row">
                        <label for="tempatLahir" class="col-sm-3 form-check-label">Tempat Lahir</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="tempatLahir" placeholder="Tempat Lahir" name="tmp_lahir" value="{{old('tmp_lahir') ?? $pegawai->tmp_lahir}}">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label for="tanggalLahir" class="col-sm-3 form-check-label">Tanggal Lahir</label>
                        <div class="col-sm-9">
                            <input type="date" class="form-control" id="tanggalLahir" placeholder="Tanggal Lahir" name="tgl_lahir" value="{{old('tgl_lahir') ?? $pegawai->tgl_lahir}}">
                        </div>
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-3 form-check-label">Jenis Kelamin</label>
                        <div class="col-sm-9">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" value="L" id="laki_laki" {{old('jk') ?? $pegawai->jk == 'L' ? 'checked' : ''}}>
                                    <label for="laki_laki" class="form-check-label">Laki-laki</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="jk" value="P" id="perempuan" {{old('jk') ?? $pegawai->jk == 'P' ? 'checked' : ''}}>
                                    <label for="perempuan" class="form-check-label">Perempuan</label>
                                </div>
                        </div>
                        </div>
                        <div class="form-group row">
                            <label for="instansi" class="col-sm-3 form-check-label">Instansi</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="instansi">
                                    <option value="0" selected disabled>--Instansi--</option>
                                    <option value="Badan Pusat Statistik" {{old('instansi') ?? $pegawai->instansi == 'Badan Pusat Statistik' ? 'selected' : ''}}>Badan Pusat Statistik</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="satker" class="col-sm-3 form-check-label">Satuan Kerja</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="satker_id">
                                    <option value="0" selected disabled>--Satuan Kerja--</option>
                                    <option value="1" {{old('satker_id') ?? $pegawai->satker_id == '1' ? 'selected' : ''}}>Provinsi Gorontalo</option>
                                    <option value="2" {{old('satker_id') ?? $pegawai->satker_id == '2' ? 'selected' : ''}}>Kota Gorontalo</option>
                                    <option value="3" {{old('satker_id') ?? $pegawai->satker_id == '3' ? 'selected' : ''}}>Kab. Gorontalo</option>
                                    <option value="4" {{old('satker_id') ?? $pegawai->satker_id == '4' ? 'selected' : ''}}>Kab. Boalemo</option>
                                    <option value="5" {{old('satker_id') ?? $pegawai->satker_id == '5' ? 'selected' : ''}}>Kab. Pohuwato</option>
                                    <option value="6" {{old('satker_id') ?? $pegawai->satker_id == '6' ? 'selected' : ''}}>Kab. Bone Bolango</option>
                                    <option value="7" {{old('satker_id') ?? $pegawai->satker_id == '7' ? 'selected' : ''}}>Kab. Gorontalo Utara</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jabatan" class="col-sm-3 form-check-label">Jabatan</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="jabatan" placeholder="Jabatan" name="jabatan" value="{{old('jabatan') ?? $pegawai->jabatan}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pangkat" class="col-sm-3 form-check-label">Pangkat/Golongan</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" id="pangkat" placeholder="Pangkat/Golongan" name="pangkat" value="{{old('pangkat') ?? $pegawai->pangkat}}">
                            </div>
                        </div>
                        <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        </div>
                    </form>
                </div>
                <!-- /.tab-pane -->

                <!-- Change Password tab-pane -->
                <div class="tab-pane" id="changePassword">
                    <form class="form-horizontal" action="{{route('reset-password')}}" method="POST">
                        @method('patch')
                        @csrf
                    <div class="form-group row" >
                        <label for="password" class="col-sm-3 form-check-label">Current Password</label>
                        <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="current_password" name="current_password" placeholder="Current Password">
                            @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 form-check-label">New Password</label>
                        <div class="col-sm-9">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="new_password" name="new_password" placeholder="New Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 form-check-label">Confirm Password</label>
                        <div class="col-sm-9">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Confirm Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                        </div>
                    </div>
                    </form>
                    @include('sweetalert::alert')
                </div>
                <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@endsection
