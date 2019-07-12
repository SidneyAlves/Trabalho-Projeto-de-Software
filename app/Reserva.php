<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    protected $fillable = [
        'CD_PSGR',
        'NR_VOO',
        'DT_SAIDA_VOO',
        'PC_DESC_PASG'      
    ];

    protected $table = 'itr_resv';
    public $timestamps = false;
}
