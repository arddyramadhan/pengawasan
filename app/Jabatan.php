<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
   protected $table = "jabatan";
   protected $guarded = ['id'];

   public function tingkatan()
   {
      return $this->belongsTo(Tingkatan::class , 'id_tingkatan');
   }

   public function user()
   {
      return $this->hasMany(User::class, 'id_jabatan');
   }
}
