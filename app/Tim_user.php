<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tim_user extends Model
{
    protected $table='tim_user';
    protected $guarded=['id'];

    public function tim()
    {
        return $this->belongsTo(Tim::class, 'id_tim');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'id_user');
    }

}
