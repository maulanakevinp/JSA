<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama'      => 'Super Admin',
            'peran_id'  => 1
        ]);

        User::create([
            'nama'      => 'HSE',
            'peran_id'  => 2
        ]);

        User::create([
            'nama'      => 'Manager Admin',
            'peran_id'  => 3
        ]);

        User::create([
            'nama'      => 'Admin Kontraktor',
            'peran_id'  => 4
        ]);
    }
}
