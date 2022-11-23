<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelaku extends Model
{
    protected $table = 'pelaku';
    protected $guarded = ['id'];

    public function lhp()
    {
        return $this->belongsTo(Lhp::class, 'id_lhp');
    }
}
