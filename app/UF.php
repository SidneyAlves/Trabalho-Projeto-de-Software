<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UF extends Model
{
    protected $fillable = [
        'SG_UF',
        'NM_UF'       
    ];

    protected $table = 'itr_uf';
    public $timestamps = false;
    protected $primaryKey = 'SG_UF';
    public $incrementing = false;
}
