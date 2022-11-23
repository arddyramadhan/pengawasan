<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengawas extends Model
{
    protected $table = 'pengawas';
    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function informasi_awal()
    {
        return $this->hasMany(Informasi_awal::class,'id_user');
    }

}
