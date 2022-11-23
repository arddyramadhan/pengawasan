<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi_awal extends Model
{
    protected $table = 'informasi_awal';
    protected $guarded = ['id'];

    public function informasi()
    {
        return $this->belongsTo(Informasi::class, 'id_informasi');
    }

    public function informasi_awal_bukti()
    {
        return $this->hasMany(Informasi_awal_bukti::class, 'id_informasi_awal');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tim()
    {
        return $this->hasOne(Tim::class, 'id_informasi_awal');
    }
}
