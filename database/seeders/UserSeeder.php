<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'username' => 'admin',
                'name' => 'admin',
                'email' => 'admin@example.com',
                'level' => 'admin',
                'password' => bcrypt('admin'),
                'pegawai_id' => '1',
            ],
            [
                'username' => 'user',
                'name' => 'user',
                'email' => 'user@example.com',
                'level' => 'user',
                'password' => bcrypt('user'),
                'pegawai_id' => '2',
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
