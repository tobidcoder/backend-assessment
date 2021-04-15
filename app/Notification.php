<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{

//
    public $table = 'notifications';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = [
        'user_id',
        'threshold',
        'currency',
    ];

}

