<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita_acara extends Model
{
    protected $table = 'berita_acara';
    protected $guarded = ['id'];

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim' );
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function detail_berita_acara()
    {
        return $this->hasMany(Berita_acara_detail::class,'id_berita_acara');
    }
}
