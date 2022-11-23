<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    protected $table = 'informasi';
    protected $guarded = ['id'];

    public function informasi_awal()
    {
        return $this->hasOne(Informasi_awal::class, 'id_informasi');
    }

    public function alihkan()
    {
        return $this->hasOne(Alihkan::class, 'id_informasi');
    }

	public function take_file()
	{
		return "/storage/". $this->img_bukti;
	}
    
}
