<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lhp extends Model
{
    protected $table = 'lhp';
    protected $guarded = ['id'];


    public function pendapat()
    {
        return $this->hasMany(Pendapat::class, 'id_lhp');
    }
    
    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function saksi()
    {
        return $this->hasMany(Saksi::class, 'id_lhp');
    }

    public function pelaku()
    {
        return $this->hasMany(Pelaku::class, 'id_lhp');
    }

    public function bukti()
    {
        return $this->hasMany(Bukti::class, 'id_lhp');
    }

}
