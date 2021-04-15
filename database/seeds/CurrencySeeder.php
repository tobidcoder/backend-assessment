<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * "USD":1.198471,
    "AUD":1.546861,
    "CAD":1.497435,
    "PLN":4.553411,
    "MXN":24.008055
     *
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('currencies')->truncate();

        \Illuminate\Support\Facades\DB::table('currencies')->insert([
            [
                'name' => 'USD',
                'rates' => 1.198471,
            ],
            [
                'name' => 'AUD',
                'rates' => 1.546861,
            ],
            [
                'name' => 'CAD',
                'rates' => 1.497435,
            ],
            [
                'name' => 'PLN',
                'rates' => 4.553411,
            ],
            [
                'name' => 'MXN',
                'rates' => 24.008055,
            ]

        ]);
    }
}
