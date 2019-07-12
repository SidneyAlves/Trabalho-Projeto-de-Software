<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aeronave extends Model
{
    protected $fillable = [
        'CD_ARNV',
        'CD_EQPT',
        'CD_CMPN_AEREA'       
    ];

    protected $hidden = [];
    protected $table = 'itr_arnv';
    public $timestamps = false;
    protected $primaryKey = 'CD_ARNV';
    public $incrementing = false;
}
