<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita_acara_detail extends Model
{
    protected $table = 'berita_acara_detail';
    protected $guarded = ['id'];

    public function berita_acara()
    {
        return $this->belongsTo(Berita_acara::class, 'id_berita_acara');
    }
}
