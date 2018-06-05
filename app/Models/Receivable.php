<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receivable extends Model
{
    protected $fillable = [
        'client',
        'value',
        'expiration_date',
        'payed',        
    ];
}
