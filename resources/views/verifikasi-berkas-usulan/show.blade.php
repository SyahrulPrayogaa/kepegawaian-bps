
<a href="{{$dokumen}}" title="Dokumen Pengantar" target="_blank" class="btn btn-sm btn-warning mb-3"><i class="fas fa-file-pdf text-danger mr-2"></i>Dokumen Pengantar</a>

<div class="table-responsive">
    <table class="table table-bordered table-sm">
        <thead>
            <tr>
                <td style="width: 40px">ADA</td>
                <td class="text-center">NAMA BERKAS</td>
                <td style="width: 30px"></td>
            </tr>
        </thead>
        <tbody>
            @foreach ($upload as $up)
                <tr>
                    <td class="text-center"><i class="fas fa-check text-success"></i></td>
                    <td>{{$up->nama_file}}</td>
                    <td class="text-center">
                        <a href="{{$up->path}}" target="_blank" title="lihat file"><i class="fas fa-search text-danger mr-2"></i></a>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>

