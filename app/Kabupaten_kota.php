<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kabupaten_kota extends Model
{
    protected $table= 'kabupaten_kota';
    protected $guarded = ['id'];

    public function User()
    {
        return $this->hasMany(User::class, 'id_kabupaten_kota');
    }

    public function kecamatan()
    {
        return $this->hasMany(Kecamatan::class, 'id_kabupaten_kota');
    }
}
