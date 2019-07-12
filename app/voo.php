<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class voo extends Model
{
    protected $fillable = [
        'NR_VOO',
        'DT_SAIDA_VOO',
        'NR_ROTA_VOO',
        'CD_ARNV'      
    ];

    protected $table = 'itr_voo';
    public $timestamps = false;
}
