<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    
    protected $table = 'users';
    // protected $fillable = [
    //     'name', 'email', 'password',
    // ];

    protected $guarded = ['id'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function informasi_awal()
    {
        return $this->hasMany(Informasi_awal::class, 'id_user');
    }

    public function alihkan()
    {
        return $this->hasMany(Alihkan::class, 'id_user');
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }

    public function tingkatan()
    {
        return $this->belongsTo(Tingkatan::class, 'id_tingkatan');
    }
    // many to many tim_user
    public function tims()
    {
        return $this->belongsToMany(Tim::class,'tim_user','id_user','id_tim');
    }
    public function tim_user()
    {
        return $this->hasMany(Tim_user::class,'id_user');
    }

    public function tim()
    {
        return $this->hasMany(Tim::class, 'id_user');
    }

    public function berita_acara()
    {
        return $this->hasMany(Berita_acara::class, 'id_user');
    }

    public function lhp()
    {
        return $this->hasMany(Lhp::class,'id_user');
    }

    public function kabupaten()
    {
        return $this->belongsTo(Kabupaten_kota::class, 'id_kabupaten_kota');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'id_kecamatan');
    }

    public function keluarahan()
    {
        return $this->belongsTo(Kelurahan::class, 'id_keluarahan');
    }

    public function pendapat()
    {
        return $this->hasMany(Pendapat::class, 'id_user');
    }
}
