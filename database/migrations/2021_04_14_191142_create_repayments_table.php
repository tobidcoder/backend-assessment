<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     *  'repayment_date',
    'amount',
    'repayment_amount',
    'repayment_interest',
    'total_amount_and_interest'
     * repayment_code
     *
     * @return void
     */
    public function up()
    {
        Schema::create('repayments', function (Blueprint $table) {
            $table->id();
            $table->dateTime('repayment_date');
            $table->decimal('amount',20,2);
            $table->decimal('repayment_amount',20,2);
            $table->decimal('repayment_interest',20,2);
            $table->decimal('total_amount_and_interest',20,2);
            $table->bigInteger('repayment_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repayments');
    }
}
