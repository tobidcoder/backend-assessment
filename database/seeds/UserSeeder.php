<?php

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
        //
        \Illuminate\Support\Facades\DB::table('users')->truncate();

        \Illuminate\Support\Facades\DB::table('users')->insert([
            'name' => \Illuminate\Support\Str::random(10),
            'email' => \Illuminate\Support\Str::random(10).'@gmail.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'base_currency' => 'EUR',
        ]);
    }
}
