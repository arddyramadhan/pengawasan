<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pendapat extends Model
{
    protected $table='pendapat';
    protected $guarded=['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function lhp()
    {
        return $this->belongsTo(Lhp::class, 'id_lhp');
    }
}
