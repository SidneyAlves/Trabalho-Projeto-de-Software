<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rota extends Model
{
    protected $fillable = [
        'NR_ROTA_VOO',
        'CD_ARPT_ORIG',
        'CD_ARPT_DESC',
        'VR_PASG'       
    ];

    protected $table = 'itr_rota_voo';
    public $timestamps = false;
    protected $primaryKey = 'NR_ROTA_VOO';
}
