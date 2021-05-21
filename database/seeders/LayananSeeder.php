<?php

namespace Database\Seeders;

use App\Models\Layanan;
use Illuminate\Database\Seeder;

class LayananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $layanan = [
            [
                'id' => '1',
                'layanan' => 'KARPEG',
            ],
            [
                'id' => '2',
                'layanan' => 'KARIS',
            ],
            [
                'id' => '3',
                'layanan' => 'KARSU',
            ],
            [
                'id' => '4',
                'layanan' => 'KENAIKAN PANGKAT REGULER',
            ],
            [
                'id' => '5',
                'layanan' => 'KENAIKAN PANGKAT FUNGSIONAL/STRUKTURAL',
            ],
        ];
        foreach ($layanan as $key => $value) {
            Layanan::create($value);
        }
    }
}
