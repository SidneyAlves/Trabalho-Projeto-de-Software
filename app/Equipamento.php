<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipamento extends Model
{
    protected $fillable = [
        'CD_EQPT',
        'NM_EQPT',
        'DC_TIPO_EQPT',
        'QT_MOTOR',
        'IC_TIPO_PRPS',
        'QT_PSGR'       
    ];

    protected $table = 'itr_eqpt';
    public $timestamps = false;
    protected $primaryKey = 'CD_EQPT';
    public $incrementing = false;
}
