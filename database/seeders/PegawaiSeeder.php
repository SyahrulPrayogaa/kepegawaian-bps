<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pegawai = [
            [
                'id' => '1',
                'nama' => 'admin',
                'nip' => '000000000000000000',
                'tmp_lahir' => 'Gorontalo',
                'tgl_lahir' => '2021-01-01',
                'jk' => 'L',
                'instansi' => 'Badan Pusat Statistik',
                'satker_id' => '1',
                'jabatan' => 'Kepala Bagian Umum',
                'pangkat' => 'IIa',
            ],
            [
                'id' => '2',
                'nama' => 'user',
                'nip' => '000000000000000000',
                'tmp_lahir' => 'Gorontalo',
                'tgl_lahir' => '2021-01-01',
                'jk' => 'P',
                'instansi' => 'Badan Pusat Statistik',
                'satker_id' => '7',
                'jabatan' => 'Kepala Bagian Umum',
                'pangkat' => 'IIa',
            ],
        ];
        foreach ($pegawai as $key => $value) {
            Pegawai::create($value);
        }
    }
}
