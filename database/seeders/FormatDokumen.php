<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Format;

class FormatDokumen extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $format = [
            [
                'namaDokumen' => 'ANJAB',
                'format' => 'ANJAB_NIP',
                'limit' => '4MB',
                'file' => 'pdf',
                'keterangan' => 'Dokumen Analisis Jabatan dan Analisis Beban Kerja Untuk Keperluan Administrasi Pindah Instansi',
            ],
            [
                'namaDokumen' => 'PPK',
                'format' => 'PPK_TAHUN_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Penilaian Prestasi Kerja PNS di MERGER Menjadi Satu File dengan SKP (TAHUN adalah tahun penilaian sasaran kinerja pegawai)',
            ],
            [
                'namaDokumen' => 'SKP',
                'format' => 'SKP_TAHUN_NIP',
                'limit' => '4MB',
                'file' => 'pdf',
                'keterangan' => 'Formulir Sasaran Kerja Pegawai dan Penilaian Capaian Kerja Pegawai (TAHUN adalah tahun penilaian SKP)',
            ],
            [
                'namaDokumen' => 'SK_CPNS',
                'format' => 'SK_CPNS_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Pengangkatan Sebagai Calon PNS',
            ],
            [
                'namaDokumen' => 'SK_JABATAN',
                'format' => 'SK_JABATAN_TAHUN_NIP',
                'limit' => '2MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Keputusan Pengangkatan dalam Jabatan Fungsional/ Struktural, Surat Pelantikan dan SPMT dijadikan dalam satu file atau Surat Keputusan Pengangkatan Pertama Kali dalam Jabatan Fungsional (Kode TAHUN adalah kode TAHUN SK Mulai berlaku)',
            ],
            [
                'namaDokumen' => 'SK_KP',
                'format' => 'SK_KP_TAHUN_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'SK Kenaikan Pangkat (45:IV/e;44:IV/d; 43:IV/c;42:IV/b; 41:IV/a; 34:III/d; 33:III/c;32:III/b;31:III/a;24:II/d 23:II/c;22:II/b;21:II/a;14:I/d;13:I/c 12:I/b;11:I/a)',
            ],
            [
                'namaDokumen' => 'SK_MUTASI',
                'format' => 'SK_MUTASI_TAHUN_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'SK Mutasi pindah atau semua SK yang isinya adalah tentang perpindahan instansi/bidang/seksi atau lokasi',
            ],
            [
                'namaDokumen' => 'SK_PEMBEBASAN',
                'format' => 'SK_PEMBEBASAN_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'SK Pembebasan dalam jabatan apabila yang bersangkutan menduduki jabatan fungsional tertentu atau jabatan struktural',
            ],
            [
                'namaDokumen' => 'SK_PEMBERHENTIAN',
                'format' => 'SK_PEMBERHENTIAN_NIP',
                'limit' => '2MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Keputusan Pemberhentian dengan hormat tidak atas permintaan sendiri dengan Hak Pensiun',
            ],
            [
                'namaDokumen' => 'SK_PIM',
                'format' => 'SK_PIM/2/3/4_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Diklat PIM (2: PIM 2, 3: PIM 3 , 4 : PIM 4)',
            ],
            [
                'namaDokumen' => 'SK_PNS',
                'format' => 'SK_PNS_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Pengangakatan Sebagai PNS',
            ],
            [
                'namaDokumen' => 'STTPL',
                'format' => 'STTPL_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Tanda Lulus Pendidikan dan Pelatikan ',
            ],
            [
                'namaDokumen' => 'URAIAN_TUGAS',
                'format' => 'URAIAN_TUGAS_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Uraian Tugas ditandatangani serendah-rendahnya Eselon II',
            ],
            [
                'namaDokumen' => 'USUL_PI',
                'format' => 'USUL_PI_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Usul/Nota Usul Pindah Instansi dari PPK (Pejabat Pembina Kepegawaian Instansi Peneriman dengan Menyebutkan Jabatan Yang Akan di Duduki',
            ],
            [
                'namaDokumen' => 'KK',
                'format' => 'KK_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Kartu Keluarga',
            ],
            [
                'namaDokumen' => 'SK_PW',
                'format' => 'SK_PW_NIP',
                'limit' => '2MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Keputusan Pendelegasian Wewenang',
            ],
            [
                'namaDokumen' => 'STLKPPI',
                'format' => 'STLKPPI_NIP',
                'limit' => '1MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Tanda Lulus Kenaikan Pangkat Penyesuaian Ijazah',
            ],
            [
                'namaDokumen' => 'AKTA NIKAH',
                'format' => 'AKTA_NIKAH_NIP',
                'limit' => '2MB',
                'file' => 'pdf',
                'keterangan' => 'Surat Pencatatan Pernikahan atau Akta Nikah',
            ],
            [
                'namaDokumen' => 'LAPORAN PERKAWINAN',
                'format' => 'LAPORAN_PERKAWINAN_NIP',
                'limit' => '2MB',
                'file' => 'pdf',
                'keterangan' => 'Laporan Perkawinan Pertama',
            ],
            [
                'namaDokumen' => 'PAS FOTO SUAMI',
                'format' => 'PAS_FOTO_SUAMI_NIP',
                'limit' => '1MB',
                'file' => 'jpg',
                'keterangan' => 'Pas Foto SUAMI berwarna atau hitam putih Ukuran 3x4',
            ],
            [
                'namaDokumen' => 'PAS FOTO ISTRI',
                'format' => 'PAS_FOTO_ISTRI_NIP',
                'limit' => '1MB',
                'file' => 'jpg',
                'keterangan' => 'Pas Foto ISTRI berwarna atau hitam putih Ukuran 3x4',
            ],
            [
                'namaDokumen' => 'KARTU ISTRI',
                'format' => 'KARIS_NIP',
                'limit' => '1MB',
                'file' => 'jpg',
                'keterangan' => 'Pas Foto KARIS berwarna atau hitam putih Ukuran 3x4',
            ],
            [
                'namaDokumen' => 'KARTU SUAMI',
                'format' => 'KARSU_NIP',
                'limit' => '1MB',
                'file' => 'jpg',
                'keterangan' => 'Pas Foto KARSU berwarna atau hitam putih Ukuran 3x4',
            ],
            [
                'namaDokumen' => 'KARTU PEGAWAI',
                'format' => 'KARPEG_NIP',
                'limit' => '1MB',
                'file' => 'jpg',
                'keterangan' => 'Pas Foto KARPEG berwarna atau hitam putih Ukuran 3x4',
            ],
        ];
        foreach ($format as $key => $value) {
            Format::create($value);
        }
    }
}
