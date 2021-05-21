<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(UserSeeder::class);
        $this->call(FormatDokumen::class);
        $this->call(SatkerSeeder::class);
        $this->call(PegawaiSeeder::class);
        $this->call(LayananSeeder::class);
    }
}
