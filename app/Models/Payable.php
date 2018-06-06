<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Payable extends Model
{
    protected $fillable = [
        'title',
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
