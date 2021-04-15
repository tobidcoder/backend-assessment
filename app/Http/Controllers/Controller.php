<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Repayment;
use Carbon\Carbon;
use Response;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($data, $message)
    {
        $response = [
            'success' => true,
            'data'    => $data,
            'message' => $message,
        ];


        return response()->json($response, 200);
    }


    public function sendError($error, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error,
        ];


        return response()->json($response, $code);
    }

    public function sendSuccess($message)
    {
        return Response::json([
            'success' => true,
            'Response_message' => $message
        ], 200);
    }


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
    public static function loanRepaymentCal($amount, $repayment_date, $interest_rate, $tenure){

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

        $repayment_generate = Repayment::where('repayment_code', '=', $repayment_code)->get();

        return $repayment_generate;

    }
}
