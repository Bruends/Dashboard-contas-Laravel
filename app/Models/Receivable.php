<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Receivable extends Model
{
    protected $fillable = [
        'client',
        'value',
        'expiration_date',
        'payed',        
    ];

    public function getExpirationDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    } 

    public function getValueAttribute($value){
        return round($value, 2);
    }
}
