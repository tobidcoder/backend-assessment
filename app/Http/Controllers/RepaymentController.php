<?php

namespace App\Http\Controllers;

use App\Classes\LoansServices;
use App\Http\Requests\LoanCalculateRequest;
use App\Repayment;
use Illuminate\Http\Request;

class RepaymentController extends Controller
{

    /**
     * calculate a customer's loan repayment over a period of time (in months)
     *
     * 'amount'
    'tenure'
    'repayment_date'
    'interest_rate'
     */

    public function calculateLoanRepayment(LoanCalculateRequest $request){
         //cal calculate repayment
          $repayment = $this->loanRepaymentCal($request->amount, $request->repayment_date, $request->interest_rate,$request->tenure);

          return $this->sendResponse($repayment, 'Loan repayment calculated successfully');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function show(Repayment $repayment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function edit(Repayment $repayment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Repayment $repayment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Repayment  $repayment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Repayment $repayment)
    {
        //
    }
}
