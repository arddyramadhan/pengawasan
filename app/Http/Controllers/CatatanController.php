<?php

namespace App\Http\Controllers;

use App\Kecamatan;
use App\Kelurahan;
use App\Tingkatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CatatanController extends Controller
{
   public function __construct()
   {

      // $tingkatan = Tingkatan::get();
      // View::share('side_tingkatan', $tingkatan);
      $this->middleware('auth');
      $kecamatan_side = Kecamatan::get();
      View::share('kecamatan_side', $kecamatan_side);
      $kelurahan_side = Kelurahan::get();
      View::share('kelurahan_side', $kelurahan_side);
   }
    
}
