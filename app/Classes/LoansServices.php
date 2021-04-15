<?php
/**
 * Created by PhpStorm.
 * User: USER
 * Date: 14/04/2021
 * Time: 8:32 PM
 */

namespace App\Classes;


use App\Repayment;
use Carbon\Carbon;

class LoansServices
{

    /**
     *
     *
     * A . loan amount

    B. tenure(between 1 to 12)

    C. repayment day (the day the payment will be made monthly)

    D. Interest of 5%(which should be spread across the tenure)


     **  'repayment_date',
    'amount',
    'repayment_amount',
    'repayment_interest',
    'total_amount_and_interest'
     * repayment_code
     */
    public static function calculateLoanRepayment($amount, $repayment_date, $interest_rate, $tenure){

        $principal = $amount;
        $rate = $interest_rate;
        $start_date = Carbon::parse($repayment_date);
        $end_date = Carbon::parse($repayment_date)->addMonths($tenure);
        $repayment_code = mt_rand(10000,99999);

        $diff = $start_date->diffInMonths($end_date);
        $times = $diff;

        $interest = ($principal * $rate * $times) / 100;
        $total_amount_and_interest = $interest + $amount;
        $interest_repayment_per_months = $interest/$times;
        $principal_repayment_per_months = $principal/$times;
        $total_repayment_per_months = $interest_repayment_per_months + $principal_repayment_per_months;

        for ($i = 1; $i < $times+1; $i++){

            $repayment = new Repayment();
            $repayment->tenure = $times;
            $repayment->repayment_date = $start_date->addMonths($i);
            $repayment->amount = $total_repayment_per_months;
            $repayment->repayment_amount = $principal_repayment_per_months;
            $repayment->repayment_interest = $interest_repayment_per_months;
            $repayment->repayment_code = $repayment_code;
            $repayment->total_amount_and_interest = $total_amount_and_interest;

            $repayment->save();
        }

    }

}