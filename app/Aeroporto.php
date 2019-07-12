<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeroporto extends Model
{
    protected $fillable = [
        'CD_ARPT',
        'CD_PAIS',
        'SG_UF',
        'NM_CIDD'      
    ];

    protected $table = 'itr_arpt';
    public $timestamps = false;
    protected $primaryKey = 'CD_ARPT';
    public $incrementing = false;
}
