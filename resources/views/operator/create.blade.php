@extends('layouts.master')

@push('custom-css')
<style>
    .select2-selection__rendered {
    line-height: 28px !important;
    }
    .select2-container .select2-selection--single {
        height: 38px !important;
    }
    .select2-selection__arrow {
        height: 38px !important;
    }

    .select2-container--default .select2-selection--single .select2-selection__clear{
        margin-top: -3px;
}
</style>
@endpush
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Tambah Operator</h3>
                </div>
                <div class="card-body">
                    <form class="form-horizontal" action="{{route('operator.store')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-sm-3 form-check-label">Nama</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" id="nama" placeholder="Nama" name="name" value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-sm-3 form-check-label">Username</label>
                            <div class="col-sm-9">
                                <input  type="text" class="form-control" id="nama" placeholder="Username" name="username" value="{{old('username')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-sm-3 form-check-label">email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" id="email" placeholder="email" name="email" value="{{old('email')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-3 form-check-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" value="{{old('password')}}">
                            </div>
                            @error('password')
                                <div class="text-danger">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-group row">
                            <label for="level" class="col-sm-3 form-check-label">Level</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="level">
                                    <option value="0" selected disabled>--Level Akses--</option>
                                    <option value="admin" {{old('level') == 'admin' ? 'selected' : ''}}>Admin</option>
                                    <option value="user" {{old('level') == 'user' ? 'selected' : ''}}>User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pegawai" class="col-sm-3 form-check-label">Nama Pegawai</label>
                            <div class="col-sm-9">
                                <select class="form-control custom-select" name="pegawai_id" id="pegawai_id" style="width: 100%">
                                    {{-- <option value="0" selected disabled>--Nama Pegawai--</option> --}}
                                    <option></option>
                                    @foreach ($pegawai as $peg)
                                        <option value="{{$peg->id}}" {{old('pegawai_id') == "$peg->id" ? 'selected' : ''}}>{{$peg->nama}}</option>
                                    @endforeach
                                </select>
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

@push('custom-js')
    <script type="text/javascript">
    $(document).ready(function(){
        $('#pegawai_id').select2({
            placeholder: 'Pilih Pegawai',
            allowClear:true,
        });
    });
    </script>
@endpush
