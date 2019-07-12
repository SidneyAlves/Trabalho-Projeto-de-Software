<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = [
        'CD_PAIS',
        'NM_PAIS',
        'QT_PPLC_PAIS'       
    ];

    protected $hidden = [];
    protected $table = 'itr_pais';
    public $timestamps = false;
    protected $primaryKey = 'CD_PAIS';
    // protected $keyType = 'string';
    public $incrementing = false;
}
