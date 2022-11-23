<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim extends Model
{
    protected $table = 'tim';
    protected $guarded = ['id'];

    public function informasi_awal()
    {
        return $this->belongsTo(Informasi_awal::class, 'id_informasi_awal');
    }
    // many to many tim_user
    public function users()
    {
        return $this->belongsToMany(User::class, 'tim_user', 'id_tim', 'id_user');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function tim_user()
    {
        return $this->hasMany(Tim_user::class, 'id_tim');
    }

    public function berita_acara()
    {
        return $this->hasMany(Berita_acara::class, 'id_tim');
    }

    public function lhp()
    {
        return $this->hasMany(Lhp::class, 'id_tim');
    }
}
