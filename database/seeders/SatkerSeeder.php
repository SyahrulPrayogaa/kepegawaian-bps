<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Satker;

class SatkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $satker = [
            [
                'id' => '1',
                'nama' => 'Provinsi Gorontalo',
            ],
            [
                'id' => '2',
                'nama' => 'Kota Gorontalo',
            ],
            [
                'id' => '3',
                'nama' => 'Kabupaten Gorontalo',
            ],
            [
                'id' => '4',
                'nama' => 'Kabupaten Boalemo',
            ],
            [
                'id' => '5',
                'nama' => 'Kabupaten Pohuwato',
            ],
            [
                'id' => '6',
                'nama' => 'Kabupaten Bone Bolango',
            ],
            [
                'id' => '7',
                'nama' => 'Kabupaten Gorontalo Utara',
            ],
        ];
        foreach ($satker as $key => $value) {
            Satker::create($value);
        }
    }
}
