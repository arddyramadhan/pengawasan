<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bukti extends Model
{
    protected $table = 'bukti';
    protected $guarded = ['id'];

    public function lhp()
    {
        return $this->belongsTo(Lhp::class, 'id_lhp');
    }
}
