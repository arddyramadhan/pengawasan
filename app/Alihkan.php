<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alihkan extends Model
{
    protected $table = 'alihkan';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function informasi()
    {
        return $this->belongsTo(Informasi::class,'id_informasi');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }
}
