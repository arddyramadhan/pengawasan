<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    protected $table = 'saksi';
    protected $guarded = ['id'];

    public function lhp()
    {
        return $this->belongsTo(Lhp::class, 'id_lhp');
    }
}
