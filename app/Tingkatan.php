<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tingkatan extends Model
{
    protected $table="tingkatan";
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasMany(User::class, 'id_tingkatan');
    }
}
