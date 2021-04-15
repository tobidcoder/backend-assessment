<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Repayment extends Model
{
    //

//Total amount
//
//each month repayment date and the amount for that month.

    public $table = 'repayments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'repayment_date',
        'amount',
        'repayment_amount',
        'repayment_interest',
        'total_amount_and_interest',
        'repayment_code',
        'tenure',
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'repayment_date' => 'date',
        'amount' => 'decimal:2',
        'repayment_amount' => 'decimal:2',
        'repayment_interest' => 'decimal:2',
        'total_amount_and_interest' => 'decimal:2',
        'repayment_code' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'repayment_date' => 'required|regex:/\d{4}\-\d{1,2}\-\d{1,2}/',
        'amount' => 'required|integer',
        'repayment_amount' => 'required|integer',
        'repayment_interest' => 'required|integer',
        'total_amount_and_interest' => 'required|integer',
        'repayment_code' => 'required|integer'
    ];


}
