<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Passageiro extends Model
{
    protected $fillable = [
        'NM_PSGR',
        'IC_SEXO_PSGR',
        'DT_NASC_PSGR',
        'CD_PAIS',
        'IC_ESTD_CIVIL',
        'CD_PSGR_RESP'       
    ];

    protected $table = 'itr_psgr';
    public $timestamps = false;
    protected $primaryKey = 'CD_PSGR';
}
