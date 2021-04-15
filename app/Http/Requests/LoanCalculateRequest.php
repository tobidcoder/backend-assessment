<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoanCalculateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *A . loan amount

    B. tenure(between 1 to 12)

    C. repayment day (the day the payment will be made monthly)

    D. Interest of 5%(which should be spread across the tenure)
     * @return array
     */
    public function rules()
    {
        return [
            //
            'amount' => 'required|integer',
            'tenure' => 'required|integer|between:1,12',
            'repayment_date' => 'required|regex:/\d{4}\-\d{1,2}\-\d{1,2}/',
            'interest_rate' => 'required|integer',
        ];
    }
}
