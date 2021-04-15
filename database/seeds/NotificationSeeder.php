<?php

use Illuminate\Database\Seeder;

class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *$table->unsignedBigInteger('user_id');
    $table->decimal('threshold',20,6);
    $table->string('currency',5);
     * @return void
     */
    public function run()
    {
        //
        \Illuminate\Support\Facades\DB::table('notifications')->truncate();

        \Illuminate\Support\Facades\DB::table('notifications')->insert([
            [
                'user_id' => 1,
                'threshold' => 1.298471,
                'currency' => 'USD',
            ],
            [
                'user_id' => 1,
                'threshold' => 1.798471,
                'currency' => 'AUD',
            ],
            [
                'user_id' => 1,
                'threshold' => 1.898471,
                'currency' => 'CAD',
            ],
            [
                'user_id' => 1,
                'threshold' => 5.298471,
                'currency' => 'PLN',
            ],
            [
                'user_id' => 1,
                'threshold' => 27.198471,
                'currency' => 'MXN',
            ],

        ]);
    }
}
