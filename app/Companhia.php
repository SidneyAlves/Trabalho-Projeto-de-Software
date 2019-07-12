<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Companhia extends Model
{
    protected $fillable = [
        'CD_CMPN_AEREA',
        'NM_CMPN_AEREA',
        'CD_PAIS'      
    ];

    protected $table = 'itr_cmpn_aerea';
    public $timestamps = false;
    protected $primaryKey = 'CD_CMPN_AEREA';
    public $incrementing = false;
}
