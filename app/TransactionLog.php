<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    //
    protected $fillable = [
        'sender',
        'receiver',
        'number'
    ];
}
