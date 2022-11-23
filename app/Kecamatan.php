<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    protected $table = 'kecamatan';
    protected $guarded = ['id'];

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten_kota::class, 'id_kabupaten_kota');
    }

    public function alihkan()
    {
        return $this->hasMany(Alihkan::class, 'id_kecamatan');
    }

    public function user()
    {
        return $this->hasMany(User::class,'id_kecamatan');
    }

    public function keluarahan()
    {
        return $this->hasMany(Kelurahan::class, 'id_kecamatan');
    }

}
