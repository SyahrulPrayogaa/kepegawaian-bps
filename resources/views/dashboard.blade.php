@extends('layouts.master')
{{-- @section('title', 'Upload Dokumen') --}}
@push('custom-css')
<link rel="stylesheet" href="{{asset('/css/dropzone.min.css')}}">
@endpush

{{-- @section('content-header')
    Upload Dokumen
@endsection --}}
@section('content')

{{-- Dropzone.js --}}
<div class="row">
    <div class="col-lg-12 mb-2">
        <div class="card text-center">
            <div class="card-body">
                <form method="POST" action="{{route('upload-file')}}" enctype="multipart/form-data" class="dropzone dz-clickable border border-white " id="file-upload">
                    @csrf
                    <div class="dz-default dz-message font-weight-bold text-primary"><span> <i class="fas fa-cloud-upload-alt"></i> Upload File Disini</span></div>
                </form>
            </div>
        </div>
    </div>

<div class="col-lg-12">
    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Format Dokumen</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama Dokumen</th>
                        <th>Format Dokumen</th>
                        <th>Limit</th>
                        <th>File</th>
                        <th>Flag</th>
                        <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokumen as $dok)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$dok['namaDokumen']}}</td>
                            <td>{{$dok['format']}}</td>
                            <td>{{$dok['limit']}}</td>
                            <td>{{$dok['file']}}</td>
                            <td>{{$dok['flag']}}</td>
                            <td style="text-align: justify">{{$dok['keterangan']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Format Foto</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Nama File</th>
                        <th>Format File</th>
                        <th>Limit</th>
                        <th>File</th>
                        <th>Flag</th>
                        <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($foto as $foto)
                            <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$foto['namaDokumen']}}</td>
                            <td>{{$foto['format']}}</td>
                            <td>{{$foto['limit']}}</td>
                            <td>{{$foto['file']}}</td>
                            <td>{{$foto['flag']}}</td>
                            <td style="text-align: justify">{{$foto['keterangan']}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

@push('custom-js')
    <script src="{{asset('/js/dropzone.min.js')}}"></script>
    <script>
        Dropzone.options.fileUpload = {
        maxFilesize : 4,
        acceptedFiles : ".pdf,.png,.jpg,.jpeg"
        };
    </script>
@endpush
