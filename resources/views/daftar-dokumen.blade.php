@extends('layouts.master')

@section('content')
<div class="row">
<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Daftar Dokumen</h3>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('dokumen.search')}}" method="GET">
                {{-- <div class="form-group row">
                    <label for="filter" class="col-sm-2 col-form-label">Instansi</label>
                    <div class="col-sm-10">
                        <select class="form-control" name="instansi">
                            <option value="0" selected disabled>--silahkan pilih--</option>
                            <option value="1">Provinsi Gorontalo</option>
                            <option value="2">Kabupaten Gorontalo</option>
                            <option value="3">Kabupaten Boalemo</option>
                            <option value="4">Kabupaten pohuwato</option>
                            <option value="5">Kabupaten Bone Bolango</option>
                            <option value="6">Kabupaten Gorontalo Utara</option>
                            <option value="7">Kota Gorontalo</option>
                        </select>
                    </div>
                </div> --}}
                <div class="form-group row">
                    <label for="filter" class="col-sm-2 col-form-label">Filter</label>
                    <div class="col-sm-3 input-group-prepend">
                        <select class="form-control custom-select" name="category" required>
                            <option value="0" selected disabled>--Silahkan Pilih--</option>
                            <option value="1" {{($category ?? '') == 1 ? 'selected' : ''}}>Nama File</option>
                            <option value="2" {{($category ?? '') == 2 ? 'selected' : ''}}>NIP</option>
                        </select>
                    </div>
                    <div class="col-sm-7">
                        <input name="search" type="text" class="form-control" id="filter" placeholder="Masukkan Data Pencarian" value="{{$search ?? ''}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis file" class="col-sm-2 col-form-label">Jenis File</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_file" id="dokumen" value="dokumen" {{($jenis_file ?? '') == 'dokumen' ? 'checked' : 'checked'}}>
                        <label for="dokumen" class="form-check-label">Dokumen</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="jenis_file" id="photo" value="photo" {{($jenis_file ?? '') == 'photo' ? 'checked' : ''}}>
                        <label for="photo" class="form-check-label">Photo</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-sm btn-primary"><i class="fas fa-search"></i> Cari</button>
            </form>
        </div>

        @isset($upload)
            @if (count($upload) == 0)
                <h3 class="text-center my-5">Maaf, Hasil Tidak Ditemukan...</h3>
            @else

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>SK</th>
                        <th>NIP</th>
                        <th>Instansi</th>
                        <th>Nama</th>
                        <th>Upload</th>
                        <th>Operator</th>
                        <th style="width: 20px"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($upload as $up)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{$up->nama_file}}</td>
                        <td>{{$up->pegawai->nip}}</td>
                        <td>BPS {{$up->pegawai->satker->nama}}</td>
                        <td>{{$up->pegawai->nama}}</td>
                        <td>{{$up->created_at}}</td>
                        <td>{{$up->user->name}}</td>
                        <td><button type="submit" id="preview" class="badge badge-primary p-2" title="Lihat File" data-toggle="modal" data-target="#preview-{{$up->id}}"><i class="fas fa-search"></i></button></td>
                        <td><form action="{{route('dokumen.destroy',['uploads'=>$up->id])}}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="badge badge-danger p-2 btn-hapus" title="Hapus" onclick="return confirm('Apakah Kamu Yakin?')"><i class="fas fa-trash"></i></button>
                        </form></td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
        @endif

        <!-- Modal -->
        @foreach ($upload as $data)
        <div class=" modal fade" id="preview-{{$data->id}}" tabindex="-1" aria-labelledby="previewModal" aria-hidden="true" role="document">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="previewModal">{{$data->nama_file}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid">
                            <div class="row">
                                @if ($data->ext == 'pdf')
                                    <embed src="{{$data->path}}" type="application/pdf" width="100%" height="600px" >
                                @elseif ($data->ext == 'jpg' or 'jpeg' or 'png')
                                    <div class="col-lg-9 ml-auto mr-auto">
                                        <embed src="{{$data->path}}" type="application/pdf" width="100%">
                                        </div>
                                        <a href="{{$data->path}}" class="btn btn-primary mt-2" style="width: 100%" download><i class="fa fa-download"></i> Download</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

@endisset
    </div>
</div>
</div>



@include('sweetalert::alert')
@endsection

@push('custom-js')
{{-- sweet alert not fix --}}
<script>
    // let tombol = document.getElementsByClassName('btn-hapus')[0];
    // tombol.addEventListener('click', konfirmasi);

    // function konfirmasi(event){
    //     event.preventDefault();
    //     Swal.fire({
    //         title: 'Apakah anda yakin?',
    //         icon: 'warning',
    //         showCancelButton: true,
    //         cancelButtonColor: '#6c757d',
    //         confirmButtonColor: '#dc3545',
    //         confirmButtonText: 'Ya, hapus!',
    //         reverseButtons: true,
    //         }).then((result) => {
    //             if (result.value) {
    //                 event.target.submit();
    //         }
    //     })
    // }
</script>
@endpush
