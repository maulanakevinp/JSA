<?php

use App\Jsa;
use Illuminate\Database\Seeder;

class JsaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jsa::create([
            'pengaju_id'    => 4
        ]);
    }
}
