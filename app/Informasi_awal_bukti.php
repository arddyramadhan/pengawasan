<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi_awal_bukti extends Model
{
    protected $table = 'informasi_awal_bukti';
    protected $guarded = ['id'];

    function informasi_awal()
    {
        return $this->belongsTo(Informasi_awal::class, 'id_informasi_awal');
    }
}
